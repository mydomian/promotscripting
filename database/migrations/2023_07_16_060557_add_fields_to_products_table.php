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
            $table->longText('prompt_file')->nullable();
            $table->text('prompt_testing')->nullable();
            $table->integer('gpt_engine_id')->nullable();
            $table->text('preview_input')->nullable();
            $table->text('preview_output')->nullable();
            $table->text('instructions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('prompt_file');
            $table->dropColumn('prompt_testing');
            $table->dropColumn('gpt_engine_id');
            $table->dropColumn('preview_input');
            $table->dropColumn('preview_output');
            $table->dropColumn('instructions');
        });
    }
};
