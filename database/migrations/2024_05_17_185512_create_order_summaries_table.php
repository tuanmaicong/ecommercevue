<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name_customer')->nullable();
            $table->string('email_customer')->nullable();
            $table->string('phone_number_customer')->nullable();
            $table->string('address_customer')->nullable();
            $table->string('country_customer')->nullable();
            $table->string('city_customer')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('shipping')->default('Giao hàng nhanh');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->string('code_order_summary')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('product_attr_id')->nullable();
            $table->integer('qty')->default(0);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_attr_id')->references('id')->on('product_attrs')->onDelete('cascade');
            $table->string('total_order_summary')->nullable();
            $table->string('status_payment')->nullable();
            $table->unsignedBigInteger('status_oder_id')->nullable();
            $table->foreign('status_oder_id')->references('id')->on('status_oder_summaries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_summaries');
    }
};
