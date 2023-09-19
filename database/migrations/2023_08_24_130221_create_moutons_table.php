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
        // Créer la table moutons
        Schema::create('moutons', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('photo');
            $table->string('nomMere');
            $table->string('nomgrandMereMaternelle');
            $table->string('nomArrieregrandMereMaternelle');
            $table->unsignedBigInteger('proprietaire_id');
            $table->unsignedBigInteger('race_id');
            $table->foreign('proprietaire_id')->references('id')->on('proprietaires');
            $table->foreign('race_id')->references('id')->on('races');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la table moutons
        Schema::dropIfExists('moutons');
    }
};
