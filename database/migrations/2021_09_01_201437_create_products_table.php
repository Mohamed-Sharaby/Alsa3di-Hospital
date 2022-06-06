<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_details')->nullable();
            $table->string('en_details')->nullable();
            $table->string('ar_description')->nullable();
            $table->string('en_description')->nullable();
            $table->string('ar_overview')->nullable();
            $table->string('en_overview')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price');
            $table->foreignIdFor(\App\Models\SubCategory::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('products');
    }
}
