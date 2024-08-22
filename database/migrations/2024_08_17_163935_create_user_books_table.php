<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); 
            $table->foreignId('book_id');
            $table->integer('quantity');
            $table->string('status')->default('not in cart'); // Set default status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_books');
    }
};
