<?php

class JobController extends BaseController
{
    public function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    public function show($id)
    {
        $job = Job::find($id);

        if (!$job || !$job->is_active) {
            App::abort(404);
        }

        return View::make(
            'job.show',
            array(
                'job' => $job
            )
        );
    }

    public function apply($id)
    {
        // First try to upload any file
        $attachment = null;
        if (Input::hasFile('apply_cv')) {
            $file = Input::file('apply_cv');
            $filename = $file->getClientOriginalName() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path().'/storage/files/';
            if ($file->move($destinationPath, $filename)) {
                $attachment = $destinationPath . $filename;
            } else {
                return Redirect::back()->with('error', 'File Upload was not successful');
            }
        }

        $job = Job::find($id);

        $application = new Application;
        $application->ip = Request::getClientIp();
        $application->job_id = $job->id;

        $data = array(
            'apply_email' => Input::get('apply_email'),
            'apply_name' => Input::get('apply_name'),
            'apply_msg' => strip_tags(Input::get('apply_msg')),
            'company_email' => $job->poster_email,
            'company_name' => $job->company,
            'job_title' => $job->title,
            'job_id' => $job->id
        );

        $application->data = json_encode($data);

        if ($application->save()) {
            $job->apply_count = $job->apply_count + 1;
            $job->save();

            try {
                Mail::send(
                    array('text' => 'emails.apply'),
                    $data,
                    function ($m) use ($data, $attachment) {
                        $m->from($data['apply_email'], $data['apply_name']);
                        $m->to($data['company_email']);
                        if ($attachment) {
                            $m->attach($attachment);
                        }
                        $m->subject("[Design Jobs Wales] I wish to apply for '" . $data['job_title'] . "'");
                    }
                );

                return Redirect::back()->with('success', 'Application sent successfully');
            } catch (Exception $e) {
                return Redirect::back()->with('error', 'Application failed to send');
            }
        } else {
            return Redirect::back()->withInput()->withErrors($application->errors());
        }
    }

    public function create()
    {
        $types = Type::all();

        $categories = array();
        foreach (Category::all() as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        $cities = array(
            '' => 'Anywhere',
            '0' => '-- Just over the border --'
        );
        foreach (City::all() as $city) {
            $cities[$city->id] = $city->name;
        }

        return View::make(
            'job.post',
            array(
                'types' => $types,
                'categories' => $categories,
                'cities' => $cities
            )
        );
    }

    public function verify($id)
    {
        $job = Job::find($id);

        return View::make(
            'job.verify',
            array(
                'job' => $job
            )
        );
    }

    public function store()
    {
        $job = new Job;

        $job->category_id = Input::get('category_id');
        $job->title = Input::get('title');
        $job->description = Input::get('description');
        $job->company = Input::get('company');
        $job->url = Input::get('url');
        $job->poster_email = Input::get('poster_email');
        $job->type_id = (Input::has('type_id')) ? Input::get('type_id') : 1;
        $job->outside_location = Input::get('location_outside_ro_where');

        if (Input::get('city_id')) {
            $job->city_id = Input::get('city_id');
        }

        if (Input::has('apply_online')) {
            $job->apply_online = Input::get('apply_online');
        }

        $job->is_temp = 1;
        $job->is_active = 0;
        $job->views_count = 0;
        $job->apply_count = 0;

        $job->auth = md5($job->title . uniqid() . time());

        if ($job->save()) {
            return Redirect::action('JobController@verify', $job->id);
        }

        return Redirect::back()->withInput()->withErrors($job->errors());
    }

    public function confirm($id)
    {
        $job = Job::find($id);

        $job->is_temp = 0;

        if (!$job->isFirstTimePoster()) {
            $job->is_active = 1;
        }

        if ($job->save()) {
            $this->sendPublishEmailToAdmin($job);

            if ($job->is_active) {
                if (Config::get('app.parseNotify')) $this->parseNotify();
                $this->jobPostedEmail($job);
                return Redirect::action('JobController@show', $job->id)->with('success', 'Job posted successfully');
            } else {
                $this->setFirstTimePublisherEmail($job);
                return Redirect::action('JobController@confirmation', $job->id);
            }
        }

        return Redirect::back()->with('error', 'Sorry, we could not save the job for some reason');
    }

    public function edit($id, $auth)
    {
        $job = Job::find($id);

        if (!$job || $job->auth != $auth) {
            App::abort(404);
        }

        $types = Type::all();

        $categories = array();
        foreach (Category::all() as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        $cities = array(
            '' => 'Anywhere',
            '0' => '-- Just over the border --'
        );
        foreach (City::all() as $city) {
            $cities[$city->id] = $city->name;
        }

        return View::make(
            'job.edit',
            array(
                'types' => $types,
                'categories' => $categories,
                'cities' => $cities,
                'job' => $job
            )
        );
    }

    public function update($id)
    {
        $job = Job::find($id);

        $job->category_id = Input::get('category_id');
        $job->title = Input::get('title');
        $job->description = Input::get('description');
        $job->company = Input::get('company');
        $job->url = Input::get('url');
        $job->poster_email = Input::get('poster_email');
        $job->type_id = (Input::has('type_id')) ? Input::get('type_id') : 1;
        $job->outside_location = Input::get('location_outside_ro_where');

        if (Input::get('city_id')) {
            $job->city_id = Input::get('city_id');
        }

        if (Input::has('apply_online')) {
            $job->apply_online = Input::get('apply_online');
        }

        $job->is_temp = 1;

        if ($job->save()) {
            return Redirect::action('JobController@verify', $job->id);
        }

        return Redirect::back()->with('error', 'Sorry, we could not save the job for some reason');
    }

    public function confirmation($id)
    {
        return View::make('job.confirmation');
    }

    public function activate($id, $auth)
    {
        $job = Job::find($id);

        if (!$job || $job->auth != $auth) {
            App::abort(404);
        }

        $job->is_active = 1;

        if ($job->save()) {
            if (Config::get('app.parseNotify')) $this->parseNotify();
            return Redirect::to('/')->with('success', 'Job activated successfully');;
        }

        return Redirect::action('JobController@show', $job->id)->with('error', 'Sorry, job could not be activated');
    }

    public function deactivate($id, $auth)
    {
        $job = Job::find($id);

        if (!$job || $job->auth != $auth) {
            App::abort(404);
        }

        $job->is_active = 0;

        if ($job->save()) {
            return Redirect::to('/')->with('success', 'Job deactivated successfully');;
        }

        return Redirect::action('JobController@show', $job->id)->with('error', 'Sorry, job could not be deactivated');
    }

    private function parseNotify()
    {
        // Parse notification
        $ch = curl_init();

        $fields = array(
            'where' => array(
                'deviceType' => 'ios'
            ),
            'data' => array(
                'alert' => 'New Job Posted: '.$this->mTitle
            )
        );

        curl_setopt($ch, CURLOPT_URL,"https://api.parse.com/1/push");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-Parse-Application-Id: " . Config::get('secrets.parse-app-id'),
            "X-Parse-REST-API-Key: " . Config::get('secrets.parse-api-key'),
            "Content-Type: application/json"
        ));
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
    }

    private function setFirstTimePublisherEmail($job) {
        $data['job'] = $job;

        Mail::send(
            array('text' => 'emails.poster-firsttime'),
            $data,
            function ($m) use ($data) {
                $m->to($data['job']->poster_email);
                $m->subject("Your ad on Design Jobs Wales");
            }
        );
    }

    private function jobPostedEmail($job)
    {
        $data['job'] = $job;

        Mail::send(
            array('text' => 'emails.poster-publish'),
            $data,
            function ($m) use ($data, $attachment) {
                $m->to($data['job']->poster_email);
                $m->subject("Your ad on Design Jobs Wales was published");
            }
        );
    }

    private function sendPublishEmailToAdmin($job)
    {
        $data['job'] = $job;

        Mail::send(
            array('text' => 'emails.admin-publish'),
            $data,
            function ($m) use ($data) {
                $m->to(Config::get('mail.admin_email'));
                $m->subject("[Design Jobs Wales] New Job Posted '" . $data['job']['title'] . "'");
            }
        );
    }
}
