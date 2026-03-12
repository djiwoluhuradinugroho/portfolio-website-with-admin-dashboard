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
        Schema::create('image_placement_artwork', function (Blueprint $table) {

    $table->id();

    $table->foreignId('image_placement_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('artwork_id')
        ->constrained()
        ->cascadeOnDelete();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_placement_artwork');
    }
};
