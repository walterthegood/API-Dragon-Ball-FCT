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
        Schema::create('transformations', function (Blueprint $table) {
        $table->id();
        $table->string('name', 30); 
        $table->string('ki');
        $table->string('image')->nullable();
        $table->foreignId('character_id')->constrained()->onDelete('cascade');
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transformations');
    }
};
