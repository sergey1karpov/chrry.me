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
        Schema::create('market_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cards_style', 20)->nullable()->comment('Расположение карточек');
            $table->boolean('cards_shadow')->nullable()->comment('Тень карточек');
            $table->string('color_title', 20)->nullable()->comment('Цвет заголовка');
            $table->string('color_price', 20)->nullable()->comment('Цвет цены');
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
        Schema::dropIfExists('market_settings');
    }
};
