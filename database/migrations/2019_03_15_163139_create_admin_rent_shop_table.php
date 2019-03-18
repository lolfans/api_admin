<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRentShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_rent_shop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rent_shop_title', 100)->comment('租车商名称');
            $table->string('rent_shop_name', 50)->comment('租车商联系人');
            $table->string('rent_shop_phone', 50)->comment('租车商电话');
            $table->string('provider', 50)->comment('录入人姓名');
            $table->integer('is_disable')->default(0)->comment('0正常1禁用');
            $table->integer('is_real')->default(0)->comment('0未验证1已验证真实');
            $table->integer('province_id')->default(0)->comment('省ID');
            $table->string('province_name', 100)->comment('省名称');
            $table->integer('city_id')->default(0)->comment('市ID');
            $table->string('city_name', 100)->comment('市名');
            $table->integer('district_id')->default(0)->comment('区ID');
            $table->string('district_name', 100)->comment('区名');
            $table->integer('county_id')->default(0)->comment('县ID');
            $table->string('county_name', 100)->comment('县城名');
            $table->string('address', 200)->comment('具体地址');
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
        //Schema::dropIfExists('admin_rent_shop');
    }
}
