<?php

class HomeController extends BaseController
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
    public function index()
    {
        $recents = $this->jobs->getMostRecentJobs(10);
        $popular = $this->jobs->getMostAppliedToJobs(7);

        return View::make(
            'home.index',
            array(
                'recents' => $recents,
                'popular' => $popular
            )
        );
    }
}
