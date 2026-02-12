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
        Schema::table('artworks', function (Blueprint $table) {
            $table->foreignId('commission_price_id')
                ->nullable()
                ->after('image_path')
                ->constrained('commission_prices')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->dropForeign(['commission_price_id']);
            $table->dropColumn('commission_price_id');
        });
    }
};
