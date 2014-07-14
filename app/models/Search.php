<?php

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'searches';

    public function setCreatedAt($value)
    {
        $this->created_on = $value;
    }

    public function setUpdatedAt($value)
    {
        return false;
    }
}
