<?php

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    public function city()
    {
        return $this->belongsTo('City', 'city_id');
    }

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }

    public function type()
    {
        return $this->belongsTo('Type', 'type_id');
    }

    public function applications()
    {
        return $this->hasMany('Application', 'job_id');
    }

    public function getApplicantCount()
    {
        return count($this->applications);
    }
}
