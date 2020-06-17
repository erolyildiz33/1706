<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKameralarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kameralars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sahaid');
            $table->integer('kamerano');
            $table->string('kameraip');
            $table->integer('kameraport');
            $table->string('kamerausername');
            $table->string('kamerapassword');
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
        Schema::dropIfExists('kameralars');
    }
}
