<?php

class SearchController extends BaseController
{

    public function search()
    {
        $search = new Search;
        $search->keywords = Input::get('keywords');
        $search->save();

        $keywords = explode(' ', $search->keywords);

        $query = Job::live();

        foreach( $keywords as $word ) {
            $query->where('title', 'LIKE', '%'. $word .'%')
                  ->where('description', 'LIKE', '%'. $word .'%', 'OR')
                  ->where('company', 'LIKE', '%'. $word .'%', 'OR');
        }

        $query->orderBy( 'created_on', 'desc' );

        $results = $query->paginate(20);

        return View::make(
            'search.show',
            array(
                'results' => $results->appends( Input::except( 'page' ) ),
                'keywords' => implode(', ', $keywords)
            )
        );
    }
}
