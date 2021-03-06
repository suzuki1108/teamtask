<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UsersTableTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->seed('TestDataSeeder');
    }

    /**
     * 中間テーブルを経由してUserが参加しているTeamを取得できることを確認
     *
     * @return void
     */
    public function testBelongToTeamsTableHasUser()
    {
        $expectedValue = 1;
        $assertValue = null;
        foreach (User::with('teams')->find(1)->teams as $team) {
            $assertValue = $team->id;
        }

        $this->assertEquals($expectedValue, $assertValue);
    }
}
