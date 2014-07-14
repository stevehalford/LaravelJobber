<?php

class JobRepository
{
    public function getMostViewedJobs($limit)
    {
        return Job::where('is_active', '=', 1)->orderBy('views_count', 'desc')->take($limit)->get();
    }

    public function getMostAppliedToJobs($limit)
    {
        return Job::where('is_active', '=', 1)->orderBy('apply_count', 'desc')->take($limit)->get();
    }

    public function getMostRecentJobs($limit)
    {
        return Job::where('is_active', '=', 1)->orderBy('created_on', 'desc')->take($limit)->get();
    }

    public function getJobBySlug($slug)
    {
        $jobs = Job::where('is_active', '=', 1)->orderBy('created_on', 'desc')->get();

        foreach($jobs as $job) {
            if ($job->getSlug() == $slug) {
                return $job;
            }
        }
    }
}
