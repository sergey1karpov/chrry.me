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
            $table->string('oc_btn_text_color', 20)->nullable();
            $table->string('oc_btn_text_font', 20)->nullable();
            $table->double('oc_btn_text_font_size', 20)->nullable();
            $table->string('oc_btn_text_font_shadow_color', 20)->nullable();
            $table->integer('oc_btn_text_font_shadow_right')->nullable();
            $table->integer('oc_btn_text_font_shadow_bottom')->nullable();
            $table->integer('oc_btn_text_font_shadow_blur')->nullable();
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
