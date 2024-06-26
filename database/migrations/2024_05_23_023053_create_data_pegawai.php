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
        Schema::create('data_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomorhp');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('gaji');
            $table->string('foto')->nullable();
            $table->foreignId('jabatanId')->constrained('jabatan_pegawai')->cascadeOnDelete();
            $table->foreignId('statusId')->constrained('status')->cascadeOnDelete();
            $table->foreignId('userId')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pegawai');
    }
};
