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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('description');
            $table->enum('type',['text','image']);
            $table->mediumText('content')->nullable();
            $table->string('url');
            $table->string('img_path')->nullable();
            $table->string('alt')->nullable();
            $table->enum('status',['show','disabled'])->default('disabled');
            $table->unique(['page_id','description']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        
        // Schema::dropIfExists('contents');
    }
};
