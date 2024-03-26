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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->length(100)->nullable();
            $table->enum('job_type', ['full time', 'part time', 'contractual'])->default('full time');
            $table->text('job_location')->nullable();
            $table->text('salary_range')->nullable();
            $table->date('published_on')->nullable();
            $table->integer('vacancy')->nullable();
            $table->date('date_line')->nullable();
            $table->text('job_description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->string('tag')->nullable();
            $table->integer('status')->default(0);
            $table->foreign('category_id')->references('id')->on('categories')
            ->restrictOnDelete()
            ->cascadeOnUpdate(); //->restrictOnDelete() 
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->restrictOnDelete()
            ->cascadeOnUpdate(); //->restrictOnDelete()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
