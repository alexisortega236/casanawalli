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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('slug')->unique();
            $table->string('name_es');
            $table->string('name_en');
            $table->string('subtitle_es')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->text('description_es');
            $table->text('description_en');
            $table->unsignedTinyInteger('capacity')->default(2);
            $table->string('bed_type')->nullable();
            $table->string('room_type')->nullable();
            $table->string('location_description')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('booking_url')->nullable();
            $table->text('whatsapp_message')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
