<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->string('style')->nullable()->after('image_path');
            $table->string('category')->default('personal')->after('style');
            $table->boolean('is_featured')->default(false)->after('category');
            $table->integer('sort_order')->default(0)->after('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->dropColumn([
                'style',
                'category',
                'is_featured',
                'sort_order',
            ]);
        });
    }
};
