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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('url');
            $table->mediumText('extracto')->nullable();
            $table->text('cuerpo')->nullable();
            $table->boolean('destacado')->nullable();
            $table->integer('categoria')->unsigned();
            $table->foreign('categoria')->references('id')->on('news_categories');
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
