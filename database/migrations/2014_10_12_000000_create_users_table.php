<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('gender', 1);
            $table->date('birth');
            $table->string('address');
            $table->string('city');
            $table->integer('pc');
            $table->integer('phone')->nullable();
            $table->string('pic')->nullable();
            $table->char('status', 3);
            $table->string('license')->nullable();
            $table->string('urssaf')->nullable();
            $table->boolean('cgu')->nullable();
            $table->boolean('news_letter')->nullable();
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
        Schema::dropIfExists('users');
    }
}
