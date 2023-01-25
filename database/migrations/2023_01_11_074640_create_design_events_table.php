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
        foreach ($this->oc_fields as $field) {
            Schema::table('events', function (Blueprint $table) use ($field) {
                $table->string('oc_' . $field . '_position', 20)->nullable();
                $table->string('oc_' . $field . '_font', 50)->nullable();
                $table->double('oc_' . $field . '_font_size')->nullable();
                $table->string('oc_' . $field . '_font_color', 20)->nullable();
                $table->string('oc_' . $field . '_font_shadow_color', 20)->nullable();
                $table->integer('oc_' . $field . '_font_shadow_right')->nullable();
                $table->integer('oc_' . $field . '_font_shadow_bottom')->nullable();
                $table->integer('oc_' . $field . '_font_shadow_blur')->nullable();
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
//        Schema::dropIfExists('design_events');
    }
};
