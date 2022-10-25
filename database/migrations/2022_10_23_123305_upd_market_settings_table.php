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
            $table->boolean('title_shadow')->nullable();
            $table->boolean('price_shadow')->nullable();
            $table->double('title_font_size')->nullable();
            $table->double('price_font_size')->nullable();
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
