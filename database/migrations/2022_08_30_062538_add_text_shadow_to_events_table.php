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
        Schema::table('events', function (Blueprint $table) {
            $table->string('location_text_shadow_color', 100)->nullable();
            $table->integer('location_text_shadow_blur')->nullable();
            $table->integer('location_text_shadow_bottom')->nullable();
            $table->integer('location_text_shadow_right')->nullable();

            $table->string('date_text_shadow_color', 100)->nullable();
            $table->integer('date_text_shadow_blur')->nullable();
            $table->integer('date_text_shadow_bottom')->nullable();
            $table->integer('date_text_shadow_right')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->text('vk_id')->nullable();
            $table->text('yandex_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
