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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fiscal_code', 16)->nullable()->after('phone');
            $table->date('birth_date')->nullable()->after('fiscal_code');
            $table->string('gender')->nullable()->after('birth_date');

            $table->string('country')->nullable()->after('gender');
            $table->string('province', 100)->nullable()->after('country');
            $table->string('city')->nullable()->after('province');
            $table->string('postal_code', 10)->nullable()->after('city');
            $table->string('address')->nullable()->after('postal_code');
            $table->string('street_number', 20)->nullable()->after('address');

            $table->text('notes')->nullable()->after('goal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'fiscal_code',
                'birth_date',
                'gender',
                'country',
                'province',
                'city',
                'postal_code',
                'address',
                'street_number',
                'notes',
            ]);
        });
    }
};
