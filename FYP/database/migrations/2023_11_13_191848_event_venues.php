<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_venues', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->integer('venue_id');
            $table->json('floor_plan'); // JSON to store floor plan data

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('venue_id')->references('id')->on('venues');
        });
    }
};
