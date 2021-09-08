<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->longtext('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->longtext('footer_about')->nullable();
            $table->longtext('footer_text')->nullable();
            $table->string('meta_name')->nullable();
            $table->longtext('meta_keyword')->nullable();
            $table->longtext('meta_description')->nullable();
            $table->longtext('google_analyst')->nullable();
            $table->timestamps();
        });

        DB::table('sites')->insert(
        array(
            'title' => 'Universal Wedding Cards',
            'email_address' => 'info@universalweddingcards.com',
            'phone_number' => '+91 123 456 7890',
            'address' => 'Jaipur',
            'instagram' => 'instagram.com',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.in',
            'twitter' => 'twitter.com',
            'footer_text' => '(c) Copyright 2021 Universal Wedding Cards',
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
