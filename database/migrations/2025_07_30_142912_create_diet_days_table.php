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
        Schema::create('diet_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_id')->constrained()->onDelete('cascade');
            $table->string('day');
            $table->decimal('protein', 5, 2);
            $table->decimal('fat', 5, 2);
            $table->decimal('carbohydrates', 5, 2);
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_days');
    }
};
