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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name_es');
            $table->string('name_en');
            $table->text('description_es');
            $table->text('description_en');
            $table->text('includes_es')->nullable();
            $table->text('includes_en')->nullable();
            $table->string('price_note_es')->nullable();
            $table->string('price_note_en')->nullable();
            $table->string('image')->nullable();
            $table->string('external_url')->nullable();
            $table->string('cta_label_es')->nullable();
            $table->string('cta_label_en')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
