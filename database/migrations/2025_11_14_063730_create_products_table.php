<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('gpu')->nullable();
            $table->string('screen')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 0)->nullable();
            $table->integer('stock')->default(0);
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
