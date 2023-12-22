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
        Schema::create('subnavbars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('navbar_id');
            $table->string('name');
            $table->string('url');
            $table->string('createdBy')->default('System');
            $table->timestamp('createdAt')->default(now());
            $table->string('updatedBy')->nullable(true)->default(null);
            $table->timestamp('updatedAt')->nullable(true)->default(null);
            $table->timestamps();
            $table->foreign('navbar_id')->references('id')->on('navbars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subnavbars');
    }
};
