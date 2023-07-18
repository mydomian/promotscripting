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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('model_version')->nullable();
            $table->integer('sampler')->nullable();
            $table->integer('image_width')->nullable();
            $table->integer('image_height')->nullable();
            $table->float('cfg_scale')->nullable();
            $table->integer('step')->nullable();
            $table->string('speed')->nullable();
            $table->tinyInteger('clip')->nullable();
            $table->text('negative_prompt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('model_version');
            $table->dropColumn('sampler');
            $table->dropColumn('image_width');
            $table->dropColumn('image_height');
            $table->dropColumn('cfg_scale');
            $table->dropColumn('step');
            $table->dropColumn('speed');
            $table->dropColumn('clip');
            $table->dropColumn('negative_prompt');
        });
    }
};
