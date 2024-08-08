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
        Schema::create('musaned_service_cards', function (Blueprint $table) {
            $table->id();
            $table->string('icon_url');
            $table->string('title');
            $table->text('description');
            $table->string('hover_background_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musaned_service_cards');
    }
};
