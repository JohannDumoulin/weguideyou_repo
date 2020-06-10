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
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->string('type');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('price_one_h')->nullable()->default(false);
            $table->integer('price_two_h')->nullable()->default(false);
            $table->integer('price_four_h')->nullable()->default(false);
            $table->integer('price_half_day')->nullable()->default(false);
            $table->integer('price_day')->nullable()->default(false);
            $table->boolean('phone_bool')->nullable()->default(false);
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
