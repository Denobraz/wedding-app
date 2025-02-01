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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->jsonb('form')->nullable();
            $table->string('sex')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
