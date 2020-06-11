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
            $table->increments('id_user');
            $table->string('name_user');
            $table->string('surname_user');
            $table->string('email_user')->unique();
            $table->string('password');
            $table->char('gender_user', 1);
            $table->date('birth_user');
            $table->string('address_user');
            $table->string('city_user');
            $table->integer('pc_user');
            $table->integer('phone_user')->nullable();
            $table->string('pic_user')->nullable();
            $table->char('status_user', 3);
            $table->string('license_user')->nullable();
            $table->string('urssaf_user')->nullable();
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
