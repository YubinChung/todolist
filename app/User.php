<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/* hasMany 로 1:n 관계 설림
	@return \Illuminate\Database\Eloquent\Relations\HasMany /
	public function projects(){
	return $this->hasMany(Project::class);
	}

	/**
	 * 사용자의 task에 바로 접근할 수 있도록 HasManyThrough관계설정
	 * @param 접속할 최종 모델
	 * @param 거쳐갈 중간 모델
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function tasks(){
		return $this->hasManyThrough(Task::class, Project::class);
	}
}
