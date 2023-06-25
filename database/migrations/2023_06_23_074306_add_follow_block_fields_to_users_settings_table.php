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
            $table->integer('follow_block_border_raduis')->nullable();
            $table->string('follow_block_bg_color', 10)->nullable();
            $table->string('follow_block_text', 30)->nullable();
            $table->integer('follow_block_text_size')->nullable();
            $table->string('follow_block_font', 50)->nullable();
            $table->string('follow_block_font_color', 10)->nullable();
            $table->integer('follow_block_font_shadow_right')->nullable();
            $table->integer('follow_block_font_shadow_bottom')->nullable();
            $table->integer('follow_block_font_shadow_blur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_settings', function (Blueprint $table) {
            //
        });
    }
};
