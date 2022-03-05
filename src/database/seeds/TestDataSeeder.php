<?php

use App\Models\Team;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Create Test Data
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@test.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('teams')->insert([
            'team_name' => 'test_team',
            'admin_user_id' => User::where('name', '=', 'test')->first()->id,
        ]);

        DB::table('belong_to_teams')->insert([
            'user_id' => User::where('name', '=', 'test')->first()->id,
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
        ]);

        DB::table('belong_to_teams')->insert([
            'user_id' => User::where('name', '=', 'test2')->first()->id,
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
        ]);

        DB::table('statuses')->insert([
            'status_name' => '未着手',
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
            'sort' => 1,
        ]);

        DB::table('statuses')->insert([
            'status_name' => '進行中',
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
            'sort' => 2,
        ]);

        DB::table('statuses')->insert([
            'status_name' => '完了',
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
            'sort' => 3,
        ]);

        DB::table('tasks')->insert([
            'title' => 'テストのタスク1',
            'status_id' => Status::where('status_name', '=', '未着手')->first()->id,
            'pic_user_id' => User::where('name', '=', 'test')->first()->id,
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
            'create_user_id' => User::where('name', '=', 'test')->first()->id,
            'sort' => 1,
        ]);

        DB::table('tasks')->insert([
            'title' => 'テストのタスク2',
            'status_id' => Status::where('status_name', '=', '進行中')->first()->id,
            'pic_user_id' => User::where('name', '=', 'test')->first()->id,
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
            'create_user_id' => User::where('name', '=', 'test')->first()->id,
            'sort' => 1,
        ]);

        DB::table('tasks')->insert([
            'title' => 'テストのタスク3',
            'status_id' => Status::where('status_name', '=', '完了')->first()->id,
            'pic_user_id' => User::where('name', '=', 'test')->first()->id,
            'team_id' => Team::where('team_name', '=', 'test_team')->first()->id,
            'create_user_id' => User::where('name', '=', 'test')->first()->id,
            'sort' => 1,
        ]);
    }
}
