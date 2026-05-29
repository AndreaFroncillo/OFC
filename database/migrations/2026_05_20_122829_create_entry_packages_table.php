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
        Schema::create('entry_packages', function (Blueprint $table) {
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

    /*
    |--------------------------------------------------------------------------
    | Pacchetto
    |--------------------------------------------------------------------------
    */

    $table->string('name');

    // es: "10 Ingressi"

    $table->integer('total_entries');

    $table->integer('remaining_entries');

    /*
    |--------------------------------------------------------------------------
    | Prezzo
    |--------------------------------------------------------------------------
    */

    $table->decimal('price', 8, 2);

    /*
    |--------------------------------------------------------------------------
    | Validità
    |--------------------------------------------------------------------------
    */

    $table->date('start_date');

    $table->date('end_date')->nullable();

    /*
    |--------------------------------------------------------------------------
    | Stato
    |--------------------------------------------------------------------------
    */

    $table->boolean('is_active')
        ->default(true);

    /*
    |--------------------------------------------------------------------------
    | Pagamento
    |--------------------------------------------------------------------------
    */

    $table->string('payment_status')
        ->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_packages');
    }
};
