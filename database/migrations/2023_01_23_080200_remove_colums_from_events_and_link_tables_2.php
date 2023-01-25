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
        Schema::table('events', function($table) {
            $table->dropColumn('oc_bg_color');
            $table->dropColumn('oc_btn_color');
            $table->dropColumn('oc_btn_text_color');
            $table->dropColumn('oc_btn_text_font');
            $table->dropColumn('oc_btn_text_font_size');
            $table->dropColumn('oc_btn_text_font_shadow_color');
            $table->dropColumn('oc_btn_text_font_shadow_right');
            $table->dropColumn('oc_btn_text_font_shadow_bottom');
            $table->dropColumn('oc_btn_text_font_shadow_blur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_and_link_tables_2', function (Blueprint $table) {
            //
        });
    }
};
