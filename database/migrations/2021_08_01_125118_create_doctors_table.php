<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('specialization_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->string('ar_job')->nullable();
            $table->string('en_job')->nullable();
            $table->longText('ar_details')->nullable();
            $table->longText('en_details')->nullable();
            $table->string('ar_lang')->nullable();
            $table->string('en_lang')->nullable();
            $table->string('ar_clinic')->nullable();
            $table->string('en_clinic')->nullable();
            $table->decimal('appointment_price')->default(0);
            $table->decimal('consult_price')->default(0);
            $table->decimal('price')->default(0);
            $table->integer('detection_time')->default(0);
            $table->time('work_from')->nullable();
            $table->time('work_to')->nullable();
            $table->json('vacations')->nullable();
            $table->boolean('is_distinct')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('doctors');
    }
}
