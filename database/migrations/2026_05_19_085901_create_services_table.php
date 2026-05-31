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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
             // Identificativi
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();

            // Informazioni servizio
            $table->string('name');
            $table->string('slug')->unique();

            $table->text('description')->nullable();

            // Categoria (es. "personal training", "group class", "nutrition consultation")
            $table->string('category')->nullable()->index();

            // Prezzo servizio
            $table->decimal('price', 8, 2);

            // Durata in minuti
            $table->integer('duration_minutes');

            // Necessita trainer/operatore?
            $table->boolean('requires_trainer')->default(false);

            // Attivo/non attivo
            $table->boolean('is_active')->default(true);

            // Visibilità pubblica
            $table->boolean('is_visible')->default(true);

            // Ordine di visualizzazione
            $table->integer('sort_order')->default(0);

            // Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
