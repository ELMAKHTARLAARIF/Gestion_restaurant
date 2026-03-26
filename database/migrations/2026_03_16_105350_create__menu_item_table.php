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
        Schema::create('MenuItem', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('description');
            $table->float('prix');
            $table->time('temp_prepa');
            $table->string('image');
            $table->Enum('status',['Disponible','Temporairement indisponible']);
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MenuItem');
    }
};
