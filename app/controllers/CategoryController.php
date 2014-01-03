<?php

class CategoryController extends BaseController
{
    public function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    public function show($category, $type = null)
    {
        $cat = Category::where('var_name', '=', $category)->first();
        $types = Type::all();

        if ($type) {
            $jobtype = Type::where('var_name', '=', $type)->first();
        }

        if (isset($jobtype)) {
            var_dump('expression');
            $jobs = Job::live()->inCategory($cat->id)->ofType($jobtype->id)->orderBy('created_on', 'desc')->paginate(20);
        } else {
            $jobs = Job::live()->inCategory($cat->id)->orderBy('created_on', 'desc')->paginate(20);
        }

        return View::make(
            'category.show',
            array(
                'category' => $cat,
                'jobs' => $jobs,
                'types' => $types
            )
        );
    }
}
