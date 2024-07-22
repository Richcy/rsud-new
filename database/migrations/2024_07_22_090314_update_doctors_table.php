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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('experience', 100)->nullable()->change(); // Panjang dioptimalkan menjadi 100 karakter
            $table->string('lang', 50)->nullable()->change();; // Panjang dioptimalkan menjadi 50 karakter
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('experience');
            $table->dropColumn('lang');
        });
    }
};
