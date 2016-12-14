<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //임시 초기값
		$array = [
			'Personal' => 'Personal Work',
			'Work' => 'Laravel Setup',
			'Shopping' => 'Must have'
		];
		//모든사용자 조회해오기
		$users = App\User::all();
		
		foreach($users as $user){
			foreach($array as $name => $desc){ //프로젝트 갯수만큼 반복 처리
				$project = factory(App\Project::class, 1)->create([
					'name' => $name,
					'description' => $desc,
					'user_id' => $user->id,
				]);
				
				foreach(factory(App\Task::class, 10)->make() as $task){
					$project->tasks()->save($task);
				}
			}
		}
    }
}
