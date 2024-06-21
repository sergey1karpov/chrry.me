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
//            $table->string('description_font_size', 5)->nullable()->change();
//        });
        DB::statement("ALTER TABLE user_settings ALTER COLUMN description_font_size TYPE VARCHAR(5) USING description_font_size::VARCHAR");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_settings2', function (Blueprint $table) {
            //
        });
    }
};
