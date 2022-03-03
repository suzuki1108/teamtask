<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('チームID');
            $table->string('team_name', 20)->comment('チーム名');
            $table->unsignedBigInteger('admin_user_id')->comment('管理者ID');
            $table->timestamps();
            // setting foreign key
            $table->foreign('admin_user_id')->references('id')->on('users')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
