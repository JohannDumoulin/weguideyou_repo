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
            $table->char('pc', 5);
            $table->string('phone');
            $table->string('pic')->nullable();
            $table->string('description', 280)->nullable();
            $table->char('status', 3);
            $table->char('language')->nullable();
            $table->char('job')->nullable();
            $table->string('title')->nullable();
            $table->string('sector')->nullable();
            $table->string('license')->nullable();
            $table->string('num_licence')->nullable();
            $table->date('license_date')->nullable();
            $table->string('IBAN')->nullable();
            $table->string('siret')->nullable();
            $table->boolean('notif_alerte')->nullable();
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
