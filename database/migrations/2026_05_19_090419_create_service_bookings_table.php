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
        Schema::create('service_bookings', function (Blueprint $table) {
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

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('service_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('trainer_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Prenotazione
            |--------------------------------------------------------------------------
            */

            $table->date('booking_date');

            $table->time('start_time');

            $table->time('end_time');

            /*
            |--------------------------------------------------------------------------
            | Prezzo finale
            |--------------------------------------------------------------------------
            */

            $table->decimal('price', 8, 2);

            /*
            |--------------------------------------------------------------------------
            | Stato prenotazione
            |--------------------------------------------------------------------------
            */

            $table->string('status')
                ->default('pending');

            /*
            |--------------------------------------------------------------------------
            | Pagamento
            |--------------------------------------------------------------------------
            */

            $table->string('payment_method')
                ->nullable();

            $table->string('payment_status')
                ->default('unpaid');

            /*
            |--------------------------------------------------------------------------
            | Note
            |--------------------------------------------------------------------------
            */

            $table->text('notes')->nullable();
            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Vincolo di unicità per evitare doppie prenotazioni dello stesso servizio da parte dello stesso utente nello stesso orario
            |--------------------------------------------------------------------------
            */
            $table->unique([
                'user_id',
                'service_id',
                'booking_date',
                'start_time'
            ],
            'sb_usr_srv_date_time_uq'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_bookings');
    }
};
