<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->longText('ar_details');
            $table->longText('en_details');
            $table->string('ar_author');
            $table->string('en_author');
            $table->string('ar_job');
            $table->string('en_job');
            $table->longText('ar_author_details');
            $table->longText('en_author_details');
            $table->text('ar_vision');
            $table->text('en_vision');
            $table->text('ar_message');
            $table->text('en_message');
            $table->text('ar_goals');
            $table->text('en_goals');
            $table->text('ar_brief');
            $table->text('en_brief');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
