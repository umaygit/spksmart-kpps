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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained('pendaftars');
            $table->foreignId('kriteria_id')->nullable()->constrained('kriterias');
            $table->foreignId('sub_kriteria_id')->nullable()->constrained('sub_kriterias');
            $table->integer('n_k1');
            $table->integer('n_k2');
            $table->integer('n_k3');
            $table->integer('n_k4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
