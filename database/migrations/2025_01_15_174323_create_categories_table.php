<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

          // Update recipes table to reference categories
    Schema::table('recipes', function (Blueprint $table) {
        $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    
        Schema::dropIfExists('categories');
    }
};
