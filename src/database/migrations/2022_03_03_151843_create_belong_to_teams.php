<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelongToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belong_to_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->unsignedBigInteger('team_id')->comment('チームID');

            // setting foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE');
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('CASCADE');

            // setting primary keys
            $table->primary(['user_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belong_to_teams');
    }
}
