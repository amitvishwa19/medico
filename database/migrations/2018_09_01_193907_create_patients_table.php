<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender')->nullable();                    
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('emergency_contact')->nullable();
            $table->string('tobaco_usage')->nullable();
            $table->string('alcohol_intake')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('surgery_history')->nullable();
            $table->text('obsteric_history')->nullable();
            $table->text('other_details')->nullable();
            $table->text('comments')->nullable();
            $table->timestamp('created_dt');          
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
        Schema::dropIfExists('patients');
    }
}
