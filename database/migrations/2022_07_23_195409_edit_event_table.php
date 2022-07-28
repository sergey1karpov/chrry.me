<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('location_font', 100)->nullable();
            $table->string('location_font_size', 100)->nullable();
            $table->string('location_font_color', 100)->nullable();
            $table->string('date_font', 100)->nullable();
            $table->string('date_font_size', 100)->nullable();
            $table->string('date_font_color', 100)->nullable();
            $table->string('background_color_rgba', 100)->nullable();
            $table->string('background_color_hex', 100)->nullable();
            $table->string('event_animation', 255)->nullable();
            $table->string('event_round', 255)->nullable();
            $table->string('transparency', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
