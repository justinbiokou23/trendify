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
        // database/migrations/xxxx_xx_xx_create_products_table.php

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->unsignedInteger('stock');
            $table->string('image');
            $table->unsignedBigInteger('categorie_id');
            $table->boolean('promo_semaine')->default(false); // C’EST ICI LE CHAMP QUI SERT POUR LA PROMO
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
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
