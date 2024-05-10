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
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('main_id')->constrained('main_categories');
            $table->foreignId('sub_id')->constrained('sub_categories');
        });
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreignId('main_id')->constrained('main_categories');
        });

        // Schema::table('main_categories', function (Blueprint $table) {
        //     $table->foreignId('sub_id')->constrained('sub_categories')->nullable;
        // });

        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignId('main_id')->constrained('main_categories');
            $table->foreignId('sub_id')->constrained('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
