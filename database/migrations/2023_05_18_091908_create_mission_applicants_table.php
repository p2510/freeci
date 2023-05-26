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
        Schema::create('mission_applicants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('budget');
            $table->boolean('accepted');
            $table->foreignId('mission_id');
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_applicants');
    }
};