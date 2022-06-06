<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('specialization_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamp('date')->nullable();
            $table->enum('type', ['appointment', 'chat', 'consult', 'service']);
            $table->enum('status', ['new', 'confirmed', 'refused', 'ignored', 'cancelled'])->default('new');
            $table->enum('cancelled_by', ['user', 'admin'])->default('admin');
            $table->string('phone')->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_status')->nullable();
            $table->decimal('price')->default(0);
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
