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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('Название товара');
            $table->text('description')->comment('Описание товара');
            $table->text('main_photo')->comment('Фото товара');
            $table->text('additional_photos')->nullable()->comment('Дополнительные фото товара');
            $table->integer('price')->comment('Цена товара');
            $table->boolean('visible')->default(true)->comment('Скрыть или показать товар');
            $table->unsignedBigInteger('user_id')->comment('Пользователь');
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
        Schema::dropIfExists('products');
    }
};
