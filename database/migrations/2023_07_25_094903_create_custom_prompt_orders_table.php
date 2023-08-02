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
            $table->string('from_id');
            $table->string('to_id');
            $table->text('title');
            $table->longText('description');
            $table->float('price');
            $table->float('charge_percentage')->nullable();
            $table->float('charge_amount')->nullable();
            $table->float('collected_price')->nullable();
            $table->string('delivery');
            $table->string('revision')->nullable();
            $table->string('expire')->nullable();
            $table->longText('transaction_id')->nullable();
            $table->enum('is_paid',['paid','unpaid'])->nullable();
            $table->enum('status',['pending','approve'])->default('pending');
            $table->timestamps();


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
