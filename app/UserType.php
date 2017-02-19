<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{	
	protected $table = "user_types";

	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function category(){
		return $this->belongsTo('App\Category');
	}
}
