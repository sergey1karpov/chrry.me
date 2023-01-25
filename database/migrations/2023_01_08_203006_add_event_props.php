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
            $table->string('city_font', 150)->nullable();
            $table->double('city_font_size')->nullable();
            $table->string('city_font_color', 50)->nullable();
            $table->string('city_text_shadow_color', 50)->nullable();
            $table->integer('city_text_shadow_blur')->nullable();
            $table->integer('city_text_shadow_bottom')->nullable();
            $table->integer('city_text_shadow_right')->nullable();

            $table->string('time_font', 150)->nullable();
            $table->double('time_font_size')->nullable();
            $table->string('time_font_color', 50)->nullable();
            $table->string('time_text_shadow_color', 50)->nullable();
            $table->integer('time_text_shadow_blur')->nullable();
            $table->integer('time_text_shadow_bottom')->nullable();
            $table->integer('time_text_shadow_right')->nullable();
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
