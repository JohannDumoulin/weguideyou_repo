<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
            $table->string('user_status')->nullable()->default("PAR");
            
            $table->string('name');
            $table->text('desc');
            $table->string('type');
            $table->string('place');
            $table->string('place_lat');
            $table->string('place_lng');
            $table->string('duration')->nullable()->default(false);
            $table->string('activity')->nullable()->default(false);
            $table->string('nbPers')->nullable()->default(false);
            $table->string('job')->nullable()->default(false);
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('nbReport')->nullable()->default(0);
            $table->float('salaire')->nullable()->default(false);
            $table->integer('price_one_h')->nullable()->default(false);
            $table->integer('price_two_h')->nullable()->default(false);
            $table->integer('price_half_day')->nullable()->default(false);
            $table->integer('price_day')->nullable()->default(false);
            $table->boolean('phone_bool')->nullable()->default(false);
            $table->string('img')->nullable()->default(false);
            $table->integer('loge')->nullable()->default(false);
            $table->boolean('premium_in_front_week')->nullable()->default(false);
            $table->boolean('premium_in_front_month')->nullable()->default(false);
            $table->boolean('premium_banner_week')->nullable()->default(false);
            $table->boolean('premium_banner_month')->nullable()->default(false);
            $table->boolean('premium_urgent_week')->nullable()->default(false);
            $table->boolean('premium_urgent_month')->nullable()->default(false);
            $table->boolean('premium_booking')->nullable()->default(false);
            $table->boolean('premium_securing')->nullable()->default(false);
            $table->boolean('premium_insurance')->nullable()->default(false);
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
        Schema::dropIfExists('advertisement');
    }
}
