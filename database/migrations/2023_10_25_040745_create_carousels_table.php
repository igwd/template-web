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
        Schema::create('m_carousel', function (Blueprint $table) {
            $table->id();
            $table->string('heading_sm', 100)->nullable();
            $table->string('heading_lg', 100)->nullable();
            $table->string('heading_md', 100)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('bgimage', 255)->nullable();
            $table->integer('site_id')->default(0);
            $table->timestamps(); // created_at and updated_at
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_carousel');
    }
};
