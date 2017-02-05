<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Adddetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $details) {
            $details->increments('id');
            $details->string('name');
            $details->string('age');
            $details->string('gender');
            $details->string('phonenumber')->unique();
            $details->string('email');
            $details->string('bloodgroup');
            $details->string('department');
            $details->rememberToken();
            $details->timestamps();
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
