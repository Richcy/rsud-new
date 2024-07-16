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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100); // Panjang dioptimalkan menjadi 100 karakter
            $table->string('sub_desc', 150); // Panjang dioptimalkan menjadi 150 karakter
            $table->text('description'); // Menggunakan tipe text untuk deskripsi panjang
            $table->integer('event_category_id')->unsigned(); // Panjang dioptimalkan menjadi 100 karakter
            $table->string('url', 255); // Panjang dioptimalkan menjadi 255 karakter
            $table->string('img', 255); // Panjang dioptimalkan menjadi 255 karakter
            $table->date('start_date'); // Menggunakan tipe data DATE untuk tanggal mulai
            $table->date('end_date'); // Menggunakan tipe data DATE untuk tanggal selesai
            $table->time('start_time'); // Menggunakan tipe data TIME untuk waktu mulai
            $table->time('end_time'); // Menggunakan tipe data TIME untuk waktu selesai
            $table->string('location', 255); // Panjang dioptimalkan menjadi 255 karakter
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
