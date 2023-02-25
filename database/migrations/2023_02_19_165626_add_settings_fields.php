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
            $table->integer('logotype_size')->nullable();
            $table->integer('logotype_shadow_right')->nullable();
            $table->integer('logotype_shadow_bottom')->nullable();
            $table->integer('logotype_shadow_round')->nullable();
            $table->string('logotype_shadow_color', 10)->nullable();

            $table->string('background_color', 10)->nullable();
            $table->string('name_color', 10)->nullable();
            $table->string('description_color', 10)->nullable();
            $table->string('verify_color', 10)->nullable();
            $table->string('navigation_color', 10)->nullable();

            $table->boolean('social_links_bar')->default(false)->nullable();
            $table->boolean('show_logo')->default(false)->nullable();
            $table->string('links_bar_position', 10)->nullable();

            $table->integer('round_links_width')->nullable();
            $table->integer('round_links_shadow_right')->nullable();
            $table->integer('round_links_shadow_bottom')->nullable();
            $table->integer('round_links_shadow_round')->nullable();
            $table->integer('round_links_shadow_color')->nullable();
        });

        Schema::table('user_settings', function (Blueprint $table) {
            $table->dropColumn('properties');
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
