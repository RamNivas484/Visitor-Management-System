<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Checkedintable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('checkedintable', function (Blueprint $table)
      {
            $table->increments('id');
            $table->string('usertype');
            $table->string('name');
            $table->string('gender');
            $table->string('age');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('visitortype')->nullable();
            $table->string('comp_name')->nullable();
            $table->string('comp_dept')->nullable();
            $table->string('comp_designation')->nullable();
            $table->string('comp_location')->nullable();
            $table->string('comp_website')->nullable();
            $table->string('visit_emp_dept')->nullable();
            $table->string('visit_emp_name')->nullable();
            $table->string('emp_dept')->nullable();
            $table->string('emp_designation')->nullable();
            $table->string('belongings')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('checkintime');
            $table->string('checkouttime');
            $table->boolean('status');
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
