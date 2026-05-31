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
            $table->string('slug')->unique();

            // Categoria (es. base, premium, ecc.)
            $table->string('category')->index();

            // Prezzo
            $table->decimal('price', 8, 2);

            // Durata
            $table->integer('duration_in_months');

            // Regole accesso
            $table->integer('weekly_access_limit')->nullable();
            $table->boolean('unlimited_access')->default(false);

            // Assicurazione sanitaria
            $table->boolean('requires_insurance')->default(true);

            // Accesso a servizi aggiuntivi
            $table->boolean('includes_gym_access')->default(true);
            $table->boolean('includes_group_lessons')->default(false);
            $table->boolean('includes_personal_training')->default(false);

            // Descrizione opzionale
            $table->text('description')->nullable();

            // Ordine di visualizzazione
            $table->integer('sort_order')->default(0);

            // Stato piano
            $table->boolean('is_active')->default(true);
            $table->boolean('is_visible')->default(true);
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
