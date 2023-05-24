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
        Schema::create('preorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('kode');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('gambar')->nullable();
            $table->mediumText('alamat');
            $table->dateTime('deadline')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 = cancel, 1 = pending, 2 = approved');
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
        Schema::dropIfExists('preorder');
    }
};
