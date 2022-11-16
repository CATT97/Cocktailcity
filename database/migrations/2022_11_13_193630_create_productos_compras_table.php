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
        Schema::create('productos_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Compra_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('Producto_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('Cantidad');
            $table->string('Size');
            $table->integer('PrecioCompra');
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
        Schema::dropIfExists('productos_compras');
    }
};
