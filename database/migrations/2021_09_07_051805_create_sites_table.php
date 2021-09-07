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
            $table->string('footer_text')->nullable();
            $table->string('meta_name')->nullable();
            $table->longtext('meta_keyword')->nullable();
            $table->longtext('meta_description')->nullable();
            $table->longtext('google_analyst')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
