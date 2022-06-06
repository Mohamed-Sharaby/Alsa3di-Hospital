<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialization_id')->constrained()->onDelete('cascade');
            $table->string('ar_name');
            $table->string('en_name');
            $table->text('ar_details')->nullable();
            $table->text('en_details')->nullable();
            $table->decimal('price')->default(0);
            $table->boolean('is_active')->default(1);
            $table->foreignId('branch_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
