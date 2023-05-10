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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('anime');
            $table->string('kode');
            $table->text('desc')->nullable();
            $table->decimal('regular_price',8,2);
            $table->decimal('harga_jual',8,2)->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->enum('stock_status',['visible','hidden']);
            $table->boolean('featured')->default(false);
            $table->string('file_gambar')->nullable();
            $table->text('gambar')->nullable();
            $table->bigInteger('kategori_id')->unsigned()->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
};
