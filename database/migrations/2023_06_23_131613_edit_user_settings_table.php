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
        Schema::table('user_settings', function (Blueprint $table) {
            $table->renameColumn('follow_block_border_raduis', 'follow_block_border_radius');
        });

        Schema::table('user_settings', function (Blueprint $table) {
//            $table->renameColumn('follow_block_border_raduis', 'follow_block_border_radius');

            $table->string('follow_block_font_shadow_color', 10)->nullable();

//            $table->string('follow_block_text_size', 15)->nullable()->change();
//            $table->string('follow_block_border_radius', 15)->nullable()->change();
        });
//        DB::statement("ALTER TABLE user_settings ALTER COLUMN follow_block_font_shadow_color TYPE VARCHAR(10) USING follow_block_font_shadow_color::VARCHAR");
        DB::statement("ALTER TABLE user_settings ALTER COLUMN follow_block_text_size TYPE VARCHAR(15) USING follow_block_text_size::VARCHAR");
        DB::statement("ALTER TABLE user_settings ALTER COLUMN follow_block_border_radius TYPE VARCHAR(15) USING follow_block_border_radius::VARCHAR");
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
