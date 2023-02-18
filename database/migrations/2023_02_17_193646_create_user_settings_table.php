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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('banner')->nullable();
            $table->text('avatar')->nullable();
            $table->text('favicon')->nullable();
            $table->text('logotype')->nullable();
            $table->text('properties')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('banner');
            $table->dropColumn('avatar');
            $table->dropColumn('name_color');
            $table->dropColumn('description_color');
            $table->dropColumn('verify_color');
            $table->dropColumn('background_color');
            $table->dropColumn('favicon');
            $table->dropColumn('social');
            $table->dropColumn('show_social');
            $table->dropColumn('vk_id');
            $table->dropColumn('yandex_id');
            $table->dropColumn('background_color_rgb');
            $table->dropColumn('logotype');
            $table->dropColumn('logotype_size');
            $table->dropColumn('logotype_shadow_right');
            $table->dropColumn('logotype_shadow_bottom');
            $table->dropColumn('logotype_shadow_round');
            $table->dropColumn('logotype_shadow_color');
            $table->dropColumn('round_links_width');
            $table->dropColumn('round_links_shadow_right');
            $table->dropColumn('round_links_shadow_bottom');
            $table->dropColumn('round_links_shadow_round');
            $table->dropColumn('round_links_shadow_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
};
