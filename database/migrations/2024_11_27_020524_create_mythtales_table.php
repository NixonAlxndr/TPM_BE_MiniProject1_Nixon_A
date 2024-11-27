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
        Schema::create('mythtales', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Summary')->default('none')->nullable();
            $table->string('Type')->default("none")->nullable();
            $table->integer('CultureId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mythtales');
    }
};
