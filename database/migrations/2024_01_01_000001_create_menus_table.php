<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('slug')->unique();
            $table->enum('kategori', ['Food', 'Beverage', 'Dessert']);
            $table->decimal('harga', 12, 2);
            $table->enum('status', ['Ready', 'Sold Out'])->default('Ready');
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->string('foto')->nullable();
            $table->text('komposisi')->nullable();
            $table->integer('kalori')->nullable();
            $table->decimal('protein', 5, 1)->nullable();
            $table->decimal('lemak', 5, 1)->nullable();
            $table->decimal('karbohidrat', 5, 1)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
