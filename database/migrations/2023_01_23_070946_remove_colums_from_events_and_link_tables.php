<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $oc_fields = [
        'city',
        'location',
        'date',
        'time',
        'title',
        'description',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function($table) {
            $table->dropColumn('location_font');
            $table->dropColumn('location_font_size');
            $table->dropColumn('location_font_color');
            $table->dropColumn('date_font');
            $table->dropColumn('date_font_size');
            $table->dropColumn('date_font_color');
            $table->dropColumn('background_color_rgba');
            $table->dropColumn('background_color_hex');
            $table->dropColumn('event_round');
            $table->dropColumn('transparency');
            $table->dropColumn('location_text_shadow_color');
            $table->dropColumn('location_text_shadow_blur');
            $table->dropColumn('location_text_shadow_bottom');
            $table->dropColumn('location_text_shadow_right');
            $table->dropColumn('date_text_shadow_color');
            $table->dropColumn('date_text_shadow_blur');
            $table->dropColumn('date_text_shadow_bottom');
            $table->dropColumn('date_text_shadow_right');
            $table->dropColumn('block_shadow');
            $table->dropColumn('bold_city');
            $table->dropColumn('bold_location');
            $table->dropColumn('bold_date');
            $table->dropColumn('bold_time');
            $table->dropColumn('city_font');
            $table->dropColumn('city_font_size');
            $table->dropColumn('city_font_color');
            $table->dropColumn('city_text_shadow_color');
            $table->dropColumn('city_text_shadow_blur');
            $table->dropColumn('city_text_shadow_bottom');
            $table->dropColumn('city_text_shadow_right');
            $table->dropColumn('time_font');
            $table->dropColumn('time_font_size');
            $table->dropColumn('time_font_color');
            $table->dropColumn('time_text_shadow_color');
            $table->dropColumn('time_text_shadow_blur');
            $table->dropColumn('time_text_shadow_bottom');
            $table->dropColumn('time_text_shadow_right');
            $table->dropColumn('btn_color');
            $table->dropColumn('btn_rounded');
            $table->dropColumn('btn_text_color');
            $table->dropColumn('btn_text');
            $table->dropColumn('text_position');
            $table->dropColumn('show_modal');
            $table->dropColumn('date_format');
            $table->dropColumn('show_card_time');
        });

        foreach ($this->oc_fields as $field) {
            Schema::table('events', function (Blueprint $table) use ($field) {
                $table->dropColumn('oc_' . $field . '_position');
                $table->dropColumn('oc_' . $field . '_font');
                $table->dropColumn('oc_' . $field . '_font_size');
                $table->dropColumn('oc_' . $field . '_font_color');
                $table->dropColumn('oc_' . $field . '_font_shadow_color');
                $table->dropColumn('oc_' . $field . '_font_shadow_right');
                $table->dropColumn('oc_' . $field . '_font_shadow_bottom');
                $table->dropColumn('oc_' . $field . '_font_shadow_blur');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events_and_link_tables', function (Blueprint $table) {
            //
        });
    }
};
