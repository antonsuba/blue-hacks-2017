<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function userTypes(){
        return $this->hasMany('App\UserType');
    }
}
