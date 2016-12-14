<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['project_id','name','description','due_date'];
	
    public function project(){
	return $this->belongsTo(Project::class);
	}
}
