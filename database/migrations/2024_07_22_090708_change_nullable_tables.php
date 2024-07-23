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
        Schema::table('events', function (Blueprint $table) {
            $table->string('location', 255)->nullable()->change();
            $table->string('sub_desc', 255)->nullable()->change();
            $table->string('url', 255)->nullable()->change();
        });
        Schema::table('careers', function (Blueprint $table) {
            $table->string('url', 255)->nullable()->change();
            $table->string('sub_desc', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('events', function (Blueprint $table) {
        //     $table->dropColumn('url', 255);
        // });
        // Schema::table('careers', function (Blueprint $table) {
        //     $table->dropColumn('url', 255);
        // });
    }
};
