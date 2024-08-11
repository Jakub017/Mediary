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
        Schema::table('users', function (Blueprint $table) {
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->longText('diseases')->nullable();
            $table->longText('location')->nullable();
            $table->string('age')->nullable();
            $table->string('wbc')->nullable();
            $table->string('rbc')->nullable();
            $table->string('hgb')->nullable();
            $table->string('hct')->nullable();
            $table->string('mcv')->nullable();
            $table->string('mch')->nullable();
            $table->string('mchc')->nullable();
            $table->string('plt')->nullable();
            $table->string('rdw_sd')->nullable();
            $table->string('rdw_cv')->nullable();
            $table->string('pdw')->nullable();
            $table->string('mpv')->nullable();
            $table->string('p_lcr')->nullable();
            $table->string('pct')->nullable();
            $table->string('neu')->nullable();
            $table->string('lym')->nullable();
            $table->string('mono')->nullable();
            $table->string('eos')->nullable();
            $table->string('baso')->nullable();
            $table->longText('blood_recommendations')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
