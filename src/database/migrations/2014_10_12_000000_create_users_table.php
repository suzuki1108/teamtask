<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ユーザID');
            $table->string('name')->comment('ユーザ名');
            $table->string('email')->unique()->comment('Eメールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('Eメール認証完了日時');
            $table->string('password')->comment('パスワード');
            $table->rememberToken()->comment('リメンバートークン');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
