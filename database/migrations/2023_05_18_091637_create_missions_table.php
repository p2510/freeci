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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('type_mission', 50);
            $table->string('type_budget', 50);
            $table->string('category', 100);
            $table->integer('budget_min')->unsigned();
            $table->integer('budget_max')->unsigned();
            $table->text('tags')->nullable();
            $table->text('description');
            $table->string('code');
            $table->string('phone');
            $table->boolean('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};