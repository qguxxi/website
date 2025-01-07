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
        Schema::create('students', function (Blueprint $table) {
            $table->string('mssv')->primary();
            $table->string('matkhau');
            $table->string('ten');
            $table->string('lop')->nullable();
            $table->string('nganh')->nullable();
            $table->string('khoa')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
