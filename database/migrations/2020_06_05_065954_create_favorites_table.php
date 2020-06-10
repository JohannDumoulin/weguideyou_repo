<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Favorites', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned(); 
            $table->bigInteger('advert_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('Users');
            $table->foreign('advert_id')->references('id')->on('Advertisement');

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
        Schema::dropIfExists('Favorites');
    }
}
