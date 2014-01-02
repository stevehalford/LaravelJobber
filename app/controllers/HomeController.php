<?php

class HomeController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recents = Job::where('is_active', '=', 1)->orderBy('created_on', 'desc')->take(10)->get();

        return View::make('home.index', array('recents' => $recents));
    }
}
