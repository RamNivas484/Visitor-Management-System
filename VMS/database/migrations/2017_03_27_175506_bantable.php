<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bantable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bannedtable', function (Blueprint $table)
      {     $table->increments('id');
            $table->string('visitoremail');
            $table->string('visitorphonenumber');
            $table->string('bannedemployeeid');
            $table->string('bannedemployeename');
            $table->string('bannedemployeemail');
            $table->string('bannedemployeedepartment');
            $table->string('reason');
            $table->string('banneddateandtime');
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
        Schema::dropIfExists('bannedtable');
    }
}
