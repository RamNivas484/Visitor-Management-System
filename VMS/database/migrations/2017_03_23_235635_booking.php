<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Booking extends Migration
{
    public function up()
    {
      Schema::create('bookingtable', function (Blueprint $table)
      {     $table->increments('id');
            $table->string('visitoremail');
            $table->string('visitorname');
            $table->string('visitorphonenumber');
            $table->string('visitortype');
            $table->string('compname')->nullable();
            $table->string('designation')->nullable();
            $table->string('empname');
            $table->string('empdept');
            $table->string('empmail');
            $table->string('date');
            $table->string('from');
            $table->string('noofhours');
            $table->string('otherinfo')->nullable();
            $table->string('staus')->default("Pending");
            $table->string('employeeinfo')->nullable();
            $table->rememberToken();
            $table->timestamps();
     });
    }
    public function down()
    {
            Schema::dropIfExists('bookingtable');
    }
}
