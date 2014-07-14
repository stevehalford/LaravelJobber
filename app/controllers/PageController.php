<?php

class PageController extends BaseController
{
    public function show($name)
    {
        $page = Page::where('url', '=', $name)->first();

        if (!$page) {
            App::abort(404);
        }

        return View::make(
            'page.show',
            array(
                'page' => $page
            )
        );
    }
}
