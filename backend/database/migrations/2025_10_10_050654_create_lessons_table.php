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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->enum('is_free_preview',['yes','no'])->nullable()->default('no');
            $table->integer('duration')->nillable();
            $table->string('video')->nillable();
            $table->text('description')->nillable();
            $table->integer('sort_order');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
