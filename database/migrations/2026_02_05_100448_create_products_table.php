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
            $table->id();                    // Clé primaire auto-incrémentée
            $table->string('name');          // VARCHAR(255)
            $table->text('description');     // TEXT
            $table->decimal('price', 8, 2);  // DECIMAL(8,2) pour les prix
            $table->integer('stock');        // INTEGER
            $table->boolean('active')->default(true);
            $table->timestamps();            // created_at et updated_at
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
