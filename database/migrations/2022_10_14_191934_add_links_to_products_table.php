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
        Schema::table('products', function (Blueprint $table) {
            $table->text('link_to_shop')->nullable()->comment('Ссылка на внешний магазин');
            $table->string('link_to_shop_text', 255)->nullable()->comment('Текст кнопки');
            $table->string('link_to_order_text', 255)->nullable()->comment('Текст для кнопки оформления заказа');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
