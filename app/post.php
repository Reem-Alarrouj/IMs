<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
	public function comments(){
  		 return $this-> hasMany(comment::class ,'post_id');
	}
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function tags()
    {
        return $this->belongsToMany(tag::class);
    }

}
