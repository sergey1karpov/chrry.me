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
        Schema::create('event_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('close_card_type')->default(1)->nullable();
            $table->integer('open_card_type')->default(1)->nullable();
            $table->timestamps();
        });

        $users = \App\Models\User::all();

        foreach ($users as $user) {
            \DB::table('event_settings')->where('user_id', $user->id)->insert([
                'user_id' => $user->id,
                'close_card_type' => 1,
                'open_card_type' => 1,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_settings');
    }
};
