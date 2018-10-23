<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('password')->nullable();
            $table->boolean('user')->default(1);
            $table->boolean('author')->default(0);
            $table->boolean('admin')->default(0);
            $table->string('role')->default('user');
            $table->boolean('status')->default(0);
            $table->string('user_image')->nullable();
            $table->string('user_uri')->nullable();
            $table->text('address')->nullable();
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
