<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
                    $table->id();
                    $table->string('code')->unique();
                    $table->enum('type', ['fixed', 'percent']); // discount type
                    $table->decimal('value', 8, 2);
                    $table->unsignedInteger('usage_limit')->nullable(); // total times allowed
                    $table->unsignedInteger('used_count')->default(0);
                    $table->decimal('min_order_amount', 8, 2)->nullable();
                    $table->timestamp('expires_at')->nullable();
                    $table->text('applies_to_products')->nullable();
                    $table->text('applies_to_categories')->nullable();
                    $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('coupons');
    }
}
