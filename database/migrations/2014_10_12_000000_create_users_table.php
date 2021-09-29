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
            $table->string('first-name');
            $table->string('last-name');
            $table->string('father-name');
            $table->string('mother-name');
            $table->unsignedInteger('age');
            $table->unsignedInteger('n-number')->unique();
            $table->string('nationality');
            $table->string('governorate');
            $table->string('email')->unique();
//            $table->enum('role' , ['writer', 'dashboard'])->default('writer');
//            $table->string('about')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image');
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
