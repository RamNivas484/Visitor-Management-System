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
         Schema::create('employeetable', function (Blueprint $table)
         {
               $table->increments('id');
               $table->string('empid');
               $table->string('name');
               $table->string('gender');
               $table->string('age');
               $table->string('email')->unique();
               $table->string('phonenumber')->unique();
               $table->string('homephonenumber')->unique();
               $table->string('address');
               $table->string('city');
               $table->string('postalcode');
               $table->string('education');
               $table->string('dept');
               $table->string('designation');
               $table->string('salary');
               $table->string('password');
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
