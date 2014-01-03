<?php

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function jobs()
    {
        return $this->hasMany('Job', 'category_id')->where('is_active', '=', 1)->orderBy('created_on', 'desc');
    }
}
