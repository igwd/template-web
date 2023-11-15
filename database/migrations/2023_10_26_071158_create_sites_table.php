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
        Schema::create('m_sites', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('description', 255)->nullable();
            $table->json('section')->nullable();
            $table->timestamps(); // created_at and updated_at
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sites');
    }
};
