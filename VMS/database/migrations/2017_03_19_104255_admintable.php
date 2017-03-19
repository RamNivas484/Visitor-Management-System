<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admintable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('admintable', function (Blueprint $table)
      {
            $table->increments('id');
            $table->string('adminid');
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
    public function down()
    {
             Schema::dropIfExists('admintable');
    }
}
