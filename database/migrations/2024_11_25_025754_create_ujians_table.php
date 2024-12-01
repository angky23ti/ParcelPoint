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
        Schema::create('ujians', function (Blueprint $table) {
            $table->id(); 
            $table->string('kode_ujian', 100)->unique(); 
            $table->string('mata_pelajaran', 100); 
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('kelas', 50); 
            $table->string('kode_token', 50)->unique(); 
            $table->string('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};
