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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->float('price');
            $table->float('charge_amount');
            $table->float('charge_percentage');
            $table->float('collect_price');
            $table->float('discount')->default(0.00);
            $table->longText('transaction_id')->nullable();
            $table->enum('is_paid',['paid','unpaid'])->default('unpaid');
            $table->enum('status',['pending','approve','cancel'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
