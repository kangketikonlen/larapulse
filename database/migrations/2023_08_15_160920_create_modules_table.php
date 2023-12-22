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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->char('icon', 50);
            $table->string('description');
            $table->string('url');
            $table->string('navbars')->nullable(true)->default(null);
            $table->string('subnavbars')->nullable(true)->default(null);
            $table->string('createdBy')->default('System');
            $table->timestamp('createdAt')->default(now());
            $table->string('updatedBy')->nullable(true)->default(null);
            $table->timestamp('updatedAt')->nullable(true)->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
