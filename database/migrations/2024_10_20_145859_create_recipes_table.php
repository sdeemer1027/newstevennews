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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->text('ingredients');
            $table->text('directions');
            $table->foreignId('food_id')->constrained()->onDelete('cascade'); // foreign key for foods
            $table->string('picture_url')->nullable(); // Image URL for the recipe
            $table->softDeletes(); // Enable soft deletes for recipes
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
