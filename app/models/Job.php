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

    public function scopeLive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function scopeInCategory($query, $categoryId)
    {
        return $query->where('category_id', '=', $categoryId);
    }

    public function scopeOfType($query, $typeId)
    {
        return $query->where('type_id', '=', $typeId);
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

    public function isFirstTimePoster()
    {
        $jobs = Job::where('poster_email', '=', $this->poster_email)->where('is_active', '=', 1)->get();

        if (count($jobs)) {
            return false;
        }

        return true;
    }

    public function getSlug()
    {
        return Str::slug($this->title . ' at ' . $this->company);
    }
}
