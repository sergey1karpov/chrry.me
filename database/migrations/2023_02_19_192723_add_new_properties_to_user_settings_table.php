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
        Schema::table('user_settings', function (Blueprint $table) {
            $table->string('name_font', 255)->nullable();
            $table->integer('name_font_size')->nullable();
            $table->integer('name_font_shadow_right')->nullable();
            $table->integer('name_font_shadow_bottom')->nullable();
            $table->integer('name_font_shadow_blur')->nullable();
            $table->string('name_font_shadow_color', 10)->nullable();

            $table->string('description_font', 255)->nullable();
            $table->integer('description_font_size')->nullable();
            $table->integer('description_font_shadow_right')->nullable();
            $table->integer('description_font_shadow_bottom')->nullable();
            $table->integer('description_font_shadow_blur')->nullable();
            $table->string('description_font_shadow_color', 10)->nullable();

            $table->text('verify_icon_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_settings', function (Blueprint $table) {
            //
        });
    }
};
