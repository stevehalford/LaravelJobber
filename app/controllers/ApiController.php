<?php

class ApiController extends BaseController
{

    public function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function jobs()
    {
        $jobs = $this->jobs->getMostRecentJobs(20);

        $jobsFormatted = array();
        foreach ($jobs as $job) {
            $createdOnString = date( 'c', strtotime( $job->created_on ) );
            $jobArray = array(
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->description,
                'company' => $job->company,
                'created_on' => $createdOnString,
                'url' => 'https://www.designjobswales.co.uk/job/'.$job->id.'/'
            );

            if ($job->city) {
                $jobArray['city'] = $job->city->name;
            } else {
                if ($job->outside_location) {
                    $jobArray['city'] = $job->outside_location;
                } else {
                    $jobArray['city'] = 'n/a';
                }
            }

            $jobsFormatted[] = $jobArray;
        }

        return Response::json($jobsFormatted, 200);
    }
}
