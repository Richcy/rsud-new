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
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // Panjang dioptimalkan menjadi 100 karakter
            $table->integer('field_id')->unsigned(); // Panjang dioptimalkan menjadi 100 karakter
            $table->string('office', 150); // Panjang dioptimalkan menjadi 150 karakter
            $table->string('experience', 100); // Panjang dioptimalkan menjadi 100 karakter
            $table->integer('year')->nullable(); // Menggunakan tipe data INT untuk tahun
            $table->integer('month'->nullable()); // Menggunakan tipe data INT untuk bulan
            $table->string('alumni', 100)->nullable(); // Panjang dioptimalkan menjadi 100 karakter
            $table->string('nip', 50)->nullable(); // Panjang dioptimalkan menjadi 50 karakter
            $table->string('str', 50)->nullable(); // Panjang dioptimalkan menjadi 50 karakter
            $table->string('sip', 50); // Panjang dioptimalkan menjadi 50 karakter
            $table->string('img', 255); // Panjang dioptimalkan menjadi 255 karakter
            $table->integer('status')->default(1); // Panjang dioptimalkan menjadi 50 karakter
            $table->string('lang', 50); // Panjang dioptimalkan menjadi 50 karakter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
