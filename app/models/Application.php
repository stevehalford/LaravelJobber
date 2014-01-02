<?php

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'job_applications';

    public function job()
    {
        return $this->belongsTo('Job', 'job_id');
    }
}
