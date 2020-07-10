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
            $table->string('user_name')->nullable()->default("name");
            $table->string('user_language')->nullable()->default(null);
            
            $table->string('name');
            $table->text('desc');
            $table->string('type');
            $table->string('place');
            $table->string('place_lat')->nullable()->default(null);
            $table->string('place_lng')->nullable()->default(null);
            $table->string('duration')->nullable()->default(null);
            $table->string('activity')->nullable()->default(null);
            $table->string('nbPers')->nullable()->default(null);
            $table->string('job')->nullable()->default(null);
            $table->string('sexe')->nullable()->default(null);
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('nbReport')->nullable()->default(0);
            $table->float('salaire')->nullable()->default(null);
            $table->integer('price_one_h')->nullable()->default(null);
            $table->integer('price_two_h')->nullable()->default(null);
            $table->integer('price_half_day')->nullable()->default(null);
            $table->integer('price_day')->nullable()->default(null);
            $table->boolean('phone_bool')->nullable()->default(null);
            $table->string('img')->nullable()->default(null);
            $table->integer('loge')->nullable()->default(null);
            $table->boolean('premium_in_front_week')->nullable()->default(null);
            $table->boolean('premium_in_front_month')->nullable()->default(null);
            $table->boolean('premium_banner_week')->nullable()->default(null);
            $table->boolean('premium_banner_month')->nullable()->default(null);
            $table->boolean('premium_urgent_week')->nullable()->default(null);
            $table->boolean('premium_urgent_month')->nullable()->default(null);
            $table->boolean('premium_booking')->nullable()->default(null);
            $table->boolean('premium_securing')->nullable()->default(null);
            $table->boolean('premium_insurance')->nullable()->default(null);
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
