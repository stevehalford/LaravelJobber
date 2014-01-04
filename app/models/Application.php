<?php

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'job_applications';

    public function job()
    {
        return $this->belongsTo('Job', 'job_id');
    }

    /**
     * Set the value of the "created at" attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setCreatedAt($value)
    {
        $this->created_on = $value;
    }
}
