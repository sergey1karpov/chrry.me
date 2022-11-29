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
        Schema::table('users', function (Blueprint $table) {
            $table->text('logotype')->nullable();
            $table->integer('logotype_size')->nullable();
            $table->integer('logotype_shadow_right')->nullable();
            $table->integer('logotype_shadow_bottom')->nullable();
            $table->integer('logotype_shadow_round')->nullable();
            $table->string('logotype_shadow_color',191)->nullable();
            $table->string('avatar_vs_logotype', 20)->nullable();
            $table->integer('round_links_width')->nullable();
            $table->integer('round_links_shadow_right')->nullable();
            $table->integer('round_links_shadow_bottom')->nullable();
            $table->integer('round_links_shadow_round')->nullable();
            $table->string('round_links_shadow_color', 191)->nullable();
        });

        Schema::dropIfExists('user_settings');
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
