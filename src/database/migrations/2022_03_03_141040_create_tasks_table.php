<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('タスクID');
            $table->string('title', 50)->comment('タイトル');
            $table->unsignedBigInteger('status_id')->comment('ステータスID');
            $table->unsignedBigInteger('pic_user_id')->nullable()->comment('担当者ID');
            $table->datetime('start_date')->nullable()->comment('タスク開始日');
            $table->datetime('end_date')->nullable()->comment('タスク終了日');
            $table->text('detail')->nullable()->comment('タスク詳細');
            $table->unsignedBigInteger('team_id')->nullable()->comment('チームID');
            $table->unsignedBigInteger('create_user_id')->comment('作成者ID');
            $table->timestamps();

            // setting foreign key
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('CASCADE');
            $table->foreign('pic_user_id')->references('id')->on('users')->onUpdate('SET NULL');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('CASCADE');
            $table->foreign('create_user_id')->references('id')->on('users')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
