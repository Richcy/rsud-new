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
        Schema::create('schedule_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('doctor_id');
            $table->string('senin')->nullable();
            $table->string('selasa')->nullable();
            $table->string('rabu')->nullable();
            $table->string('kamis')->nullable();
            $table->string('jumat')->nullable();
            $table->string('sabtu')->nullable();
            $table->string('minggu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_doctors');
    }
};
