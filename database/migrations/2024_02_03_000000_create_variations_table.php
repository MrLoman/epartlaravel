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
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            
            $table->integer('productid');
            $table->string('name');
            $table->integer('sku');

            $table->string('kleur');
            $table->string('maat');

            $table->decimal('price');
            $table->decimal('saleprice');

            $table->string('extraoption');
            $table->decimal('price_eo');

       
            // $table->binary('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
