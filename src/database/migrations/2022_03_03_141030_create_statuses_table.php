<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ステータスID');
            $table->string('status_name', 10)->comment('ステータス名');
            $table->unsignedBigInteger('team_id')->nullable()->comment('チームID');
            $table->integer('sort')->length(3)->comment('ソート順');

            // setting foreign key
            $table->foreign('team_id')->references('id')->on('teams')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
