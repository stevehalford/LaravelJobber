<?php

use \LaravelBook\Ardent\Ardent;

class Application extends Ardent
{
    protected $table = 'job_applications';

    public static $rules = array(
        'job_id' => 'required',
        // 'recaptcha_response_field' => 'sometimes|required|recaptcha',
    );

    public function afterValidate() {
        return true;
    }

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
