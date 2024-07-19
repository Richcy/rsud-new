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
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('cascade');
        });

        Schema::table('featured_doctors', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });

        Schema::table('schedule_doctors', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });

        Schema::table('sub_services', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['article_category_id']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['event_category_id']);
        });

        Schema::table('featured_doctors', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
        });

        Schema::table('schedule_doctors', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
        });

        Schema::table('sub_services', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
    }
};
