<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('visitortable', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('gender');
          $table->string('age');
          $table->string('email')->nullable();
          $table->string('phonenumber')->unique();
          $table->string('comp_name')->nullable();
          $table->string('comp_dept')->nullable();
          $table->string('comp_designation')->nullable();
          $table->string('comp_location')->nullable();
          $table->string('comp_website')->nullable();
          $table->boolean('status')->default(false);
          $table->boolean('ban')->default(false);
          $table->string('count')->default('0');
          $table->string('password');
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
        //
    }
}
