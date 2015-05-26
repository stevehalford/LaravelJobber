<?php

class RssController extends BaseController
{

    public function index()
    {
        $categories = Category::all();

        return View::make(
            'rss.index',
            array(
                'categories' => $categories
            )
        );
    }

    public function feed($name)
    {
        if ($name == 'all') {
            $jobs = Job::live()->orderBy('created_on', 'desc')->limit(10)->get();
        } else {
            $category = Category::where('var_name', '=', $name)->first();

            if (!$category) {
                App::abort(404);
            }

            $jobs = Job::live()->inCategory($category->id)->orderBy('created_on', 'desc')->limit(10)->get();
        }

        $feed = Rss::feed('2.0', 'UTF-8');
        $feed->channel(
            array(
                'title' => 'Design Jobs Wales',
                'description' => 'Latest jobs for Web-design',
                'link' => Config::get('app.url')
            )
        );

        foreach ($jobs as $job){

            if ($job->city) {
                $location = $job->city->name;
            } else {
                if ($job->outside_location) {
                    $location = $job->outside_location;
                } else {
                    $location = 'Anywhere';
                }
            }

            $feed->item(
                array(
                    'title' => '[' . $job->type->name . '] ' . $job->title . ' at ' . $job->company . ' (' . $location . ')',
                    'description' => Markdown::parse($job->description),
                    'link' => URL::action('JobController@show', array($job->id, $job->getSlug())),
                    'pubDate' => date( 'r', strtotime( $job->updated_at ) )
                )
            );
        }

        return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
    }
}
