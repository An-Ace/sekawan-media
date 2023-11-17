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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->string('address')->nullable();
            $table->boolean('approved')->default(0);
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('approver_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->float('distance', 8, 2);
            $table->integer('cost')->nullable();
            $table->string('details')->nullable();
            $table->timestamps();

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->foreign('approver_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->foreign('driver_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
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
};
