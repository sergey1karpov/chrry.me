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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('description', 2500)->nullable();
            $table->string('location', 255);
            $table->string('time', 50);
            $table->datetime('date');
            $table->string('banner')->nullable();
            $table->string('video')->nullable();
            $table->string('media')->nullable();
            $table->string('tickets')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('link_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
