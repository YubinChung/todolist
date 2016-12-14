<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['user_id','project_id','name','description'];
	
    public function project(){
	return $this->belongsTo(Project::class);
	}
}
