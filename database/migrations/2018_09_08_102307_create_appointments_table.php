<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('family_id')->nullable();
            $table->string('visit_type')->nullable();   
            $table->string('symptoms')->nullable();
            $table->text('visit_comment')->nullable();
            $table->text('prescription')->nullable();           
            $table->string('billing_status')->default('Pending');
            $table->string('billing_paid')->nullable();
            $table->string('reffered_to')->nullable();
            $table->date('appointment_date')->nullable();         
            $table->date('next_visit_date')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
