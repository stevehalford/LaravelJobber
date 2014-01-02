<?php

class JobRepository
{
    public function getMostAppliedToJobs($limit)
    {
        $result = DB::table('jobs')
            ->join('job_applications', 'jobs.id', '=', 'job_applications.job_id')
            ->where('jobs.is_active', '=', 1)
            ->select(DB::raw('jobs.id, COUNT(job_applications.job_id) as application_total'))
            ->groupBy('job_id')
            ->orderBy(DB::raw('application_total'), 'desc')
            ->take($limit)
            ->get();

        $ids = array();

        foreach ($result as $job) {
            $ids[] = $job->id;
        }

        return Job::whereIn('id', $ids)->get();
    }

    public function getMostViewedJobs($limit)
    {
        return Job::where('is_active', '=', 1)->orderBy('views_count', 'desc')->take($limit)->get();
    }

    public function getMostRecentJobs($limit)
    {
        return Job::where('is_active', '=', 1)->orderBy('created_on', 'desc')->take($limit)->get();
    }
}
