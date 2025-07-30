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
        Schema::table('diets', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('protein');
            $table->dropColumn('fat');
            $table->dropColumn('carbohydrates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diets', function (Blueprint $table) {
            //
        });
    }
};
