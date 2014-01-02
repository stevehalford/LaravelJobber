<?php

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function jobs()
    {
        return $this->hasMany('Job', 'type_id');
    }

}
