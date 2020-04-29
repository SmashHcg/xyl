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
            $table->string('avatar')->default('https://cdn.learnku.com/uploads/images/201710/30/1/TrJS40Ey5k.png')->nullable();
            $table->string('name')->default('')->nullable();
            $table->string('college')->default('')->nullable();
            $table->string('class')->default('')->nullable();
            $table->string('gra_year')->default('')->nullable();
            $table->string('ero_year')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->bigInteger('age')->default(0)->nullable();
            $table->string('gender')->default('')->nullable();
            $table->string('city')->default('')->nullable();
            $table->string('profession')->default('')->nullable();
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
