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
        Schema::table('user_settings', function (Blueprint $table) {
            $table->string('avatar_vs_logotype', 20)->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar_vs_logotype');
            $table->dropColumn('links_bar_position');
            $table->dropColumn('show_logo');
            $table->dropColumn('social_links_bar');
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
