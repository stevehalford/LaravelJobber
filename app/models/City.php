<?php

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function jobs()
    {
        return $this->hasMany('Job', 'city_id');
    }
}
