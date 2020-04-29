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
            $table->string('account')->unique();
            $table->string('password');
            $table->string('avatar')->default('https://cdn.learnku.com/uploads/images/201710/30/1/TrJS40Ey5k.png');
            $table->string('name')->default('');
            $table->string('college')->default('');
            $table->string('class')->default('');
            $table->string('gra_year')->default('');
            $table->string('ero_year')->default('');
            $table->string('phone')->default('');
            $table->string('email')->default('');
            $table->bigInteger('age')->default(0);
            $table->string('gender')->default('');
            $table->string('city')->default('');
            $table->string('profession')->default('');
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
