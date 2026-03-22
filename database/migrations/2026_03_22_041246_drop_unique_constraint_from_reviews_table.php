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
        Schema::table('reviews', function (Blueprint $table) {
            // Add standalone indexes so FK constraints no longer depend on the composite unique index
            $table->index('user_id', 'reviews_user_id_index');
            $table->index('product_id', 'reviews_product_id_index');
            $table->dropUnique('reviews_user_id_product_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unique(['user_id', 'product_id']);
            $table->dropIndex('reviews_user_id_index');
            $table->dropIndex('reviews_product_id_index');
        });
    }
};
