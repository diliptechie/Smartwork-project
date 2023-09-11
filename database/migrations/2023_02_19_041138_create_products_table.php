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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('County');
            $table->string('Country');
            $table->string('Town');
            $table->string('Description');
            $table->string('Address');
            $table->text('Image')->nullable();
            $table->text('Thumbnail')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Number_of_Bedrooms');
            $table->string('Number_of_Bathrooms');
            $table->integer('Price');
            $table->string('Property_Type');
            $table->string('Sale_or_Rent');
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
