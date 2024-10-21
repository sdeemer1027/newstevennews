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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('foodcategory_id')->constrained()->onDelete('cascade'); // foreign key for categories
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('foods');
    }
};
