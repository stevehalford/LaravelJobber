<?php

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    public function city()
    {
        return $this->belongsTo('City', 'city_id');
    }

}
