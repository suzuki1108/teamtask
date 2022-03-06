<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Team;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use function PHPUnit\Framework\assertTrue;

class TeamsTableTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->seed('TestDataSeeder');
    }

    /**
     * 中間テーブルを経由してTeamに所属しているUserを取得できることを確認
     *
     * @return void
     */
    public function testBelongToUsersTableHasUser()
    {
        $user_names = [];
        foreach (Team::with('users')->find(1)->users as $user) {
            $user_names[] = $user->name;
        }

        assertTrue(in_array('test', $user_names));
        assertTrue(in_array('test2', $user_names));
    }
}
