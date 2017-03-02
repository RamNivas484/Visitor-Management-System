<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bookingtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bookings', function (Blueprint $table) {
          $table->increments('id');
          $table->string('visitor_email');
          $table->string('emp_name');
          $table->string('emp_dept');
          $table->string('emp_email');
          $table->string('time');
          $table->string('purpose');
          $table->string('status')->default("Waiting");
          $table->string('comment')->nullable();
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
