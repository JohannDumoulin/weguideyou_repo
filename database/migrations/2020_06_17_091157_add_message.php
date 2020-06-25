<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('ad_id')->unsigned()->nullable();
            $table->foreign('ad_id')->references('id')->on('advertisement')->onDelete('cascade');
            $table->integer('from_id')->unsigned();
            $table->integer('to_id')->unsigned();
            $table->foreign('from_id', 'from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_id', 'to')->references('id')->on('users')->onDelete('cascade');
            $table->text('content');
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('read_at')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('messages');
    }
}
