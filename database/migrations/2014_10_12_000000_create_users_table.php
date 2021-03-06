<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name',50);
            $table->string('email', 50)->unique();
            $table->char('id_card',12);
            $table->char('phone',11);
            $table->char('gender',3);
            $table->string('password',100);
            $table->date('birth_day');
            $table->string('address',100);
            $table->char('role', 10);
            $table->char('status', 10);
            $table->string('verify_code', 50);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
