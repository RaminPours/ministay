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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titel');
            $table->text('beschrijving');
            $table->string('stad');
            $table->decimal('prijs_per_nacht', 10, 2);
            $table->unsignedInteger('aantal_slaapkamers');
            $table->unsignedInteger('aantal_bedden');
            $table->unsignedInteger('aantal_badkamers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
