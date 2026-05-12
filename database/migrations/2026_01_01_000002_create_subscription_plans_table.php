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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            // Identificativi
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();

            // Informazioni piano
            $table->string('name');
            $table->string('type');

            // Prezzo
            $table->decimal('price', 8, 2);

            // Durata
            $table->integer('duration_in_months');

            // Regole accesso
            $table->integer('weekly_access_limit')->nullable();

            $table->boolean('unlimited_access')->default(false);

            // Descrizione opzionale
            $table->text('description')->nullable();

            // Stato piano
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
