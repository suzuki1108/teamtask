<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;
use App\Models\User;

class UsersTableTest extends TestCase
{
    use DatabaseTransactions;

    public function setup(): void {
        parent::setUp();
        $this->seed('UsersTableSeeder');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSeeding()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'test',
        ]);

        $str = 'test team!';
        Team::create([
            'team_name' => $str,
            'admin_user_id' => User::where('name', '=', 'test')->first()->id
        ]);


        $this->assertDatabaseHas('teams', [
            'team_name' => $str,
        ]);
    }
}
