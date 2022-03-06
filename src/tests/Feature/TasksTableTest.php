<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTableTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->seed('TestDataSeeder');
    }

    /**
     * タスクの管理者名が取得できること
     *
     * @return void
     */
    public function testGetPicUser()
    {
        $this->assertEquals(Task::find(1)->pic_user->name, 'test');
    }

    /**
     * タスクの作成者名が取得できること
     *
     * @return void
     */
    public function testGetCreateUser()
    {
        $this->assertEquals(Task::find(1)->create_user->name, 'test');
    }

    /**
     * ステータス名が取得できること
     * 
     * @return void
     */
    public function testGetStatus()
    {
        $this->assertEquals(Task::find(1)->status->status_name, '未着手');
    }

    /**
     * チームが取得できること
     * 
     * @return void
     */
    public function testGetTeam()
    {
        $this->assertEquals(Task::find(1)->team->team_name, 'test_team');
    }
}
