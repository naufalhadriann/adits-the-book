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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('penerbit');
            $table->string('author');
            $table->decimal('price', 10, 2); // Assuming a decimal type for price
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->date('publish_date');
            $table->decimal('discount', 5, 2)->default(0.00); // Discount as a percentage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
