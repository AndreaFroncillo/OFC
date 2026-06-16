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
        Schema::create('lesson_templates', function (Blueprint $table) {
            $table->id();
            /*
            |--------------------------------------------------------------------------
            | Identificativi
            |--------------------------------------------------------------------------
            */

            $table->uuid('uuid')->unique();

            $table->string('code')->unique();

            /*
            |--------------------------------------------------------------------------
            | Relazioni
            |--------------------------------------------------------------------------
            */

            $table->foreignId('trainer_id')
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Template lezione
            |--------------------------------------------------------------------------
            */

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('category')->nullable();

            $table->decimal('price', 8, 2)->default(10.00);

            $table->integer('max_participants');

            /*
            |--------------------------------------------------------------------------
            | Ricorrenza
            |--------------------------------------------------------------------------
            */

            // 1 = lunedì, 2 = martedì, ..., 7 = domenica
            $table->unsignedTinyInteger('weekday');

            $table->time('start_time');

            $table->time('end_time');

            /*
            |--------------------------------------------------------------------------
            | Regole
            |--------------------------------------------------------------------------
            */

            $table->boolean('requires_insurance')
                ->default(true);

            $table->boolean('is_bookable')
                ->default(true);

            $table->boolean('is_active')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Ordinamento
            |--------------------------------------------------------------------------
            */

            $table->integer('sort_order')
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Indici
            |--------------------------------------------------------------------------
            */

            $table->index(['trainer_id', 'is_active']);

            $table->index(['weekday', 'start_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_templates');
    }
};
