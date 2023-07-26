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
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('new_sale_notification')->default(1);
            $table->tinyInteger('new_order_notification')->default(1);
            $table->tinyInteger('new_favourites_notification')->default(1);
            $table->tinyInteger('new_sale_email')->default(1);
            $table->tinyInteger('new_order_email')->default(1);
            $table->tinyInteger('new_favourites_email')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_settings');
    }
};
