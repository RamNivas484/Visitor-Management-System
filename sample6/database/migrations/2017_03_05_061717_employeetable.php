<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employeetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('employeetable', function (Blueprint $table) {
          $table->increments('id');
          $table->string('usertype')->default("Employee");
          $table->string('empid');
          $table->string('name');
          $table->string('gender')->nullable();
          $table->string('age')->nullable();
          $table->string('email')->nullable();
          $table->string('phonenumber')->nullable();
          $table->string('dept');
          $table->string('designation')->nullable();
          $table->string('password')->nullable();
          $table->boolean('status')->default(false);
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
          Schema::dropIfExists('employeetable');
    }
}
