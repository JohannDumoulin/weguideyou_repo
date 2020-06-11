<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlerteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerte', function (Blueprint $table) {
            $table->id();
 
            $table->string('type');
            $table->string('act');
            $table->string('place');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('Users');

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
        Schema::dropIfExists('alerte');
    }
}
