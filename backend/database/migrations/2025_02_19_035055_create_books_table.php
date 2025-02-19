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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type');
            $table->string('author');
            $table->integer('pages');
            $table->decimal('price', 8, 2);
            $table->text('synopsis');
            $table->boolean('available')->default(true);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('books');
    }
};    