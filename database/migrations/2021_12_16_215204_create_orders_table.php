<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('status', [Order::PENDIENTE,Order::RECIBIDO,Order::ENVIADO,Order::ENTREGADO,Order::ANULADO])->default(Order::PENDIENTE);

            $table->string('contact');
            $table->string('phone');
            $table->string('address');
            $table->string('reference')->nullable();
            $table->integer('shipping_cost');

            $table->integer('total');

            $table->json('content');

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');


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
        Schema::dropIfExists('orders');
    }
}
