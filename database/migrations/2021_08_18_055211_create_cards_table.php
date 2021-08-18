<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('card_code')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('weight')->nullable();
            $table->string('price')->nullable();
            $table->string('sample_price')->nullable();
            $table->string('orientation')->nullable();
            $table->string('card_color')->nullable();
            $table->longtext('description')->nullable();            
            $table->boolean('extra_info')->default(0);
            $table->string('pattern')->nullable();
            $table->string('order_qty')->nullable();
            $table->string('included')->nullable();
            $table->string('available_extra_insert')->nullable();
            $table->string('material')->nullable();
            $table->string('youtube_link')->nullable();
            $table->longtext('more_information')->nullable(); 
            $table->string('meta_name')->nullable();
            $table->longtext('meta_keyword')->nullable(); 
            $table->longtext('meta_description')->nullable(); 
            $table->string('designer_image')->nullable();
            $table->string('wedding_invite_image')->nullable();          
            $table->boolean('trending_now')->default(0);          
            $table->boolean('shipping_free')->default(0);
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
        Schema::dropIfExists('cards');
    }
}
