<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Product; 

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('price');
            $table->unsignedBigInteger('category_id');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->enum('status', [Product::BORRADOR,Product::PUBLICADO])->default(Product::BORRADOR);

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
}
