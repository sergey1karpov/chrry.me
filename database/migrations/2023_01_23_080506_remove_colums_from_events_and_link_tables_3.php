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
        Schema::table('links', function($table) {
            $table->dropColumn('font_size');
            $table->dropColumn('background_color_hex');
            $table->dropColumn('title_color_hex');
            $table->dropColumn('bold');
            $table->dropColumn('text_shadow_right');
            $table->dropColumn('text_shadow_bottom');
            $table->dropColumn('text_shadow_blur');
            $table->dropColumn('text_shadow_color');
            $table->dropColumn('place');
            $table->dropColumn('font');
            $table->dropColumn('transparency');
            $table->dropColumn('rounded');
            $table->dropColumn('shadow');
            $table->dropColumn('background_color');
            $table->dropColumn('title_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_and_link_tables_3', function (Blueprint $table) {
            //
        });
    }
};

