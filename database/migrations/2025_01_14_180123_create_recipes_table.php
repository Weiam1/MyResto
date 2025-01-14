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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان الوصفة
            $table->string('image')->nullable(); // صورة رئيسية
            $table->text('ingredients'); // قائمة المكونات
            $table->text('steps'); // خطوات التحضير
            $table->unsignedBigInteger('user_id'); // المستخدم الذي أضاف الوصفة
            $table->timestamp('published_at')->nullable(); // تاريخ النشر
            $table->timestamps();

            // مفتاح أجنبي يربط الوصفة بالمستخدم
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
