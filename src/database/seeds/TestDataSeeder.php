<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
