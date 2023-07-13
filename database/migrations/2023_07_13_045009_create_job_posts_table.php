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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('job_post_thumbnil');
            $table->string('title');
            $table->longText('description');
            $table->longText('tag');
            $table->float('budget');
            $table->dateTime('deadline');
            $table->enum('job_status',['New', 'Processing','Pending','Complated',"Ban"])->default('New');
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->enum('payment_status',['Paid', 'Unpaid'])->default('Unpaid');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('job_posts');
        Schema::enableForeignKeyConstraints();
    }
};
