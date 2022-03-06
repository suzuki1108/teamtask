<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusesTableTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->seed('TestDataSeeder');
    }

    /**
     * チームが取得できること
     *
     * @return void
     */
    public function testGetTeam()
    {
        $this->assertEquals(Status::find(1)->team->team_name, 'test_team');
    }
}
