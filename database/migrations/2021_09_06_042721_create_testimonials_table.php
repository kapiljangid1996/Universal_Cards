<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('rating')->default(0);
            $table->string('sort_order')->nullable();
            $table->boolean('status')->default(0);
            $table->string('meta_name')->nullable();
            $table->longtext('meta_keyword')->nullable(); 
            $table->longtext('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
