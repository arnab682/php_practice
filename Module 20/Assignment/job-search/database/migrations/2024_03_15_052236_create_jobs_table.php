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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->date('published')->nullable();
            $table->integer('vacancy')->nullable();
            $table->string('job_type')->default('Full Time');
            $table->string('salary')->nullable();
            $table->string('location')->nullable();
            $table->date('date_line')->nullable();
            $table->longText('job_description')->nullable();
            $table->longText('job_responsibility')->nullable();
            $table->longText('job_qualification')->nullable();
            $table->tinyInteger('status')->default(1)->comment("0 = decline, 1 = approved");
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')
            ->cascadeOnDelete()
            ->cascadeOnUpdate(); //->restrictOnDelete()
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
