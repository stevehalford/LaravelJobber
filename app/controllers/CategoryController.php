<?php

class CategoryController extends BaseController
{
    public function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    public function show($category)
    {
        $cat = Category::where('var_name', '=', $category)->first();

        return View::make(
            'category.show',
            array(
                'category' => $cat
            )
        );
    }
}
