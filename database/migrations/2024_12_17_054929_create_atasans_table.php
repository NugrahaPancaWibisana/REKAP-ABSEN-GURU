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
        Schema::create('atasans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip');
            $table->enum('role', ['Wakasek Kurikulum', 'Kepala Bidang Keahlian TKI'])->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atasans');
    }
};
