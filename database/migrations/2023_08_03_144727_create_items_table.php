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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('codeNo');
            $table->string('name');
            $table->string('image');
            $table->string('price');
            $table->longText('description');
            $table->string('discount');
            $table->boolean('inStock');
            $table->unsignedBigInteger('categoryID');
            $table->foreign('categoryID')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
