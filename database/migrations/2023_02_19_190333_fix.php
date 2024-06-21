<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
//        Schema::table('user_settings', function (Blueprint $table) {
//            $table->string('round_links_shadow_color', 10)->nullable()->change();
//        });
        DB::statement("ALTER TABLE user_settings ALTER COLUMN round_links_shadow_color TYPE VARCHAR(10) USING round_links_shadow_color::VARCHAR");
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
