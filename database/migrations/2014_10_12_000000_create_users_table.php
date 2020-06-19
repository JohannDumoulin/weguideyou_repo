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
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->char('gender', 1)->nullable();
            $table->date('birth')->nullable();
            $table->string('address');
            $table->string('city');
            $table->integer('pc');
            $table->string('phone')->nullable();
            $table->string('pic')->nullable();
            $table->char('status', 3);
            $table->char('language')->nullable();
            $table->char('job')->nullable();
            $table->string('status_detail')->nullable();
            $table->string('license')->nullable();
            $table->date('license_date')->nullable();
            $table->string('siret')->nullable();
            $table->boolean('cgu')->nullable();
            $table->boolean('news_letter')->nullable();
            $table->rememberToken();
            $table->boolean('admin')->nullable();
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
