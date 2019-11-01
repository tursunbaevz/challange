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
            $table->bigIncrements('id');
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->date('age')->nullable();
            $table->string('adress')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->integer('zipcode')->nullable();
            $table->text('about')->nullable();
            $table->text('instagram')->nullable();
            $table->text('facebook')->nullable();
            $table->string('user_type')->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
