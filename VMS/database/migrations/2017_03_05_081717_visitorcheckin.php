<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Visitorcheckin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('visitorspotcheckintable', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('gender');
          $table->string('age');
          $table->string('email')->unique()->nullable();
          $table->string('phonenumber')->unique();
          $table->string('visiting_purpose');
          $table->string('comp_name')->nullable();
          $table->string('comp_dept')->nullable();
          $table->string('comp_designation')->nullable();
          $table->string('comp_location')->nullable();
          $table->string('comp_website')->nullable();
          $table->string('emp_dept');
          $table->string('emp_name');
          $table->string('belongings')->nullable();
          $table->string('vehicle_number')->nullable();
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
        Schema::dropIfExists('visitorspotcheckintable');
    }
}
