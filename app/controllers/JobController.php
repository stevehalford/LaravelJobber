<?php

class JobController extends BaseController
{
    public function show($id)
    {
        $job = Job::find($id);

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
                return Redirect::action('JobController@show', $job->id)->with('error', 'File Upload was not successful');
            }
        }

        $job = Job::find($id);

        $application = new Application;
        $application->ip = Request::getClientIp();
        $application->job_id = $job->id;

        if ($application->save()) {
            $job->apply_count = $job->apply_count + 1;
            $job->save();

            $data = array(
                'apply_email' => Input::get('apply_email'),
                'apply_name' => Input::get('apply_name'),
                'apply_msg' => strip_tags(Input::get('apply_msg')),
                'company_email' => $job->poster_email,
                'company_name' => $job->company,
                'job_title' => $job->title,
                'job_id' => $job->id
            );

            try {
                Mail::send(
                    'emails.apply',
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

                return Redirect::action('JobController@show', $job->id)->with('success', 'Application sent successfully');
            } catch (Exception $e) {
                return Redirect::action('JobController@show', $job->id)->with('error', 'Application failed to send');
            }
        }
    }
}
