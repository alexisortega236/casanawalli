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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name_es');
            $table->string('name_en');
            $table->string('subtitle_es')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->text('description_es');
            $table->text('description_en');
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->string('external_url')->nullable();
            $table->string('cta_label_es')->nullable();
            $table->string('cta_label_en')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('seo_title_es')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->text('seo_description_es')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
