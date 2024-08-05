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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('j_nik', 10);
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 50);
            $table->string('t_lhr');
            $table->date('tgl_lhr');
            $table->enum('jk', ['L', 'P']);
            $table->string('usia', 5);
            $table->string('pd_terakhir', 25);
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('no_tps');
            // $table->string('br_ijazah');
            // $table->string('br_kshtn')->nullabel();
            $table->string('email')->nullabel();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
