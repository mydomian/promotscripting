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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->float('price');
            $table->longText('description');
            $table->string('words');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('favourites')->default(0);
            $table->enum('is_tips',['yes','no']);
            $table->enum('is_tested',['yes','no']);
            $table->enum('is_hq_images',['yes','no']);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
