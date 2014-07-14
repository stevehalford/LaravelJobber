<?php

class PageController extends BaseController
{
    public function show($name)
    {
        $page = Page::where('url', '=', $name)->first();

        return View::make(
            'page.show',
            array(
                'page' => $page
            )
        );
    }
}
