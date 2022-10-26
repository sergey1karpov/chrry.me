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
            $table->integer('round_links_width')->nullable();
            $table->integer('round_links_shadow_right')->nullable();
            $table->integer('round_links_shadow_bottom')->nullable();
            $table->integer('round_links_shadow_round')->nullable();
            $table->string('round_links_shadow_color')->nullable();
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
