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
        Schema::create('hire_developer_samples', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hire_developer_id');
            $table->string('sample');
            $table->timestamps();

            $table->foreign('hire_developer_id')->references('id')->on('hire_developers')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('hire_developer_samples');
        Schema::enableForeignKeyConstraints();
    }
};
