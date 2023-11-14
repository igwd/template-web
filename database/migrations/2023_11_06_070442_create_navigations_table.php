<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_navigation', function (Blueprint $table) {
            $table->id();
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('m_sites');
            $table->integer('parent');
            $table->string('name', 100)->nullable();
            $table->integer('sort')->default(0);
            $table->string('link', 255)->nullable();
            $table->string('external_link', 255)->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_navigation');
    }
};
