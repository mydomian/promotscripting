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
        Schema::create('cart_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id');
            $table->integer('product_quantity');
            $table->string('product_id');
            $table->float('cart_total');
            $table->float('charge_amount')->default(0.00);
            $table->float('charge_percentage')->default(0.00);
            $table->float('discount')->default(0.00);
            $table->float('total_amount');
            $table->text('transaction_id')->nullable();
            $table->string('is_paid')->default('unpaid');
            $table->enum('status',['pending','approve','cancel'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_orders');
    }
};
