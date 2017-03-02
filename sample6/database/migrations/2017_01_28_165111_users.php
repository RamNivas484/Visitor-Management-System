<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class users extends Migration
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
            $table->string('name');
            $table->string('gender');
            $table->string('age');
            $table->string('phonenumber')->unique();
            $table->string('email')->unique();
            $table->string('whoareu');
            $table->string('visitortype')->nullable();
            $table->string('companyname')->nullable();
            $table->string('companylocation')->nullable();
            $table->string('companywebsite')->nullable();
            $table->string('pv_empname')->nullable();
            $table->string('pv_empdept')->nullable();
            $table->string('empid')->nullable();
            $table->string('empdept')->nullable();
            $table->string('count')->default('0');
            $table->string('avatar')->default('default.jpg');
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->boolean('status')->default(false);
            $table->boolean('ban')->default(false);
            $table->string('token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
