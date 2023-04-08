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
        Schema::create('freelancer_information', function (Blueprint $table) {
            $table->id();
            $table->integer('tjm')->nullable();
            $table->string('job', 150)->nullable();
            $table->string('domain', 150)->nullable();
            $table->text('description')->nullable();
            $table->text('skills')->nullable();
            $table->string('cv')->nullable();
            $table->foreignId('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_information');
    }
};