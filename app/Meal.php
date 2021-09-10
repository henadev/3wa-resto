<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function orderLines()
    {
        return $this->hasMany('App\Orderline');
    }
}
