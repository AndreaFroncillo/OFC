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
            $table->uuid('uuid')->nullable()->unique()->after('id');
            $table->string('code')->nullable()->after('uuid');
            $table->string('surname')->nullable()->after('name');
            $table->string('phone')->nullable()->after('password');
            $table->string('goal')->nullable()->after('phone');
            $table->string('status')->default('registered')->after('goal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['uuid', 'code', 'surname', 'phone', 'goal', 'status']);
        });
    }
};
