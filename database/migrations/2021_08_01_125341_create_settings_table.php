<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('ar_value')->nullable();
            $table->longText('en_value')->nullable();
            $table->string('title');
            $table->string('page');
            $table->enum('type', ['text', 'textarea', 'image', 'url', 'number', 'email', 'map', 'file']);
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
        Schema::dropIfExists('settings');
    }
}
