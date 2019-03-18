<?php
/**
 * Created by PhpStorm.
 * User: 12264
 * Date: 2019/3/17
 * Time: 17:48
 */
namespace App\Service;
use App\Models\Rentshop;
use App\Models\Area;
class RentShopService{

    //存入租车商户数据
    public static function store($data){
       $rent = new Rentshop;
       $rent->rent_shop_title  = $data['rent_shop_title'];
       $rent->rent_shop_name   = $data['rent_shop_name'];
       $rent->rent_shop_phone  = $data['rent_shop_phone'];
       $rent->provider         = $data['provider'];
       $rent->province_id      = $data['province_id'];
       $rent->province_name    = $data['province_name'];
       $rent->city_id          = $data['city_id'];
       $rent->city_name        = $data['city_name'];
       $rent->district_id      = $data['district_id'];
       $rent->district_name    = $data['district_name'];
       $rent->county_id        = $data['county_id'];
       $rent->county_name      = $data['county_name'];

       $bool = $rent->save();
        return $bool;
    }


    //查询地区
    public static function findArea($findId){

        $data = Area::where('parentId',$findId)->get();

        return $data;
    }

}