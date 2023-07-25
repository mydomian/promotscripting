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
        Schema::create('custom_prompt_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('seller_id');
            $table->float('price');
            $table->float('charge_percentage');
            $table->float('charge_amount');
            $table->float('collected_price');
            $table->longText('transaction_id');
            $table->enum('is_paid',['paid','unpaid']);
            $table->enum('status',['pending','approve','cancel'])->default('pending');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('custom_prompt_orders');
        Schema::enableForeignKeyConstraints();
    }
};
