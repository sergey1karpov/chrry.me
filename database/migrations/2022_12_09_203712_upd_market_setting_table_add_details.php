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
        Schema::table('market_settings', function (Blueprint $table) {
            $table->string('card_shadow_color', 50)->nullable();
            $table->integer('card_shadow_blur')->nullable();
            $table->integer('card_shadow_bottom')->nullable();
            $table->integer('card_shadow_right')->nullable();
            $table->string('title_font', 255)->nullable();
            $table->string('price_font', 255)->nullable();
            $table->integer('search_round')->nullable();
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
