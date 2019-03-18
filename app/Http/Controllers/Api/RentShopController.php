<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Service\RentShopService;
class RentShopController extends BaseController
{
    const status_200 = 200;
    const status_201 = 201;

    public function __construct()
    {
        $this->rules = [
            'rent_shop_title' => 'required',
            'rent_shop_name' => 'required',
            'rent_shop_phone' => 'numeric',
            'province_id' => 'numeric',
            'province_name' => 'required',
            'city_id' => 'numeric',
            'city_name' => 'required',
            'district_id' => 'numeric',
            'district_name' => 'required',
            'county_id' => 'numeric',
            'county_name' => 'required',
        ];
        $this->messages = [
            'required'  => ':attribute不能为空',
            'numeric'   => ':attribute必须是数字',
            'max'       => ':attribute长度（数值）不应该大于 :max',
        ];
        $this->attributes = [
            'rent_shop_title' => '租车商名称',
            'rent_shop_name' => '租车商联系人',
            'rent_shop_phone' => '租车商电话',
            'province_id' => '省ID',
            'province_name' => '省名称',
            'city_id' => '市ID',
            'city_name' => '市名',
            'district_id' => '区ID',
            'district_name' => '区名',
            'county_id' => '县ID',
            'county_name' => '县城名',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
        'name' => 'RentShopController',
        'method' => 'index'
        ];

        return $this->resultJson(200,'获取成功',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
        'name' => 'RentShopController',
        'method' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $validator = \Validator::make($data, $this->rules, $this->messages, $this->attributes);
        if ($validator->fails()) {
            // return $validator->errors()->all();         //显示所有错误组成的数组
           return $validator->errors()->first();     //显示第一条错误
        }else{
            $bool = RentShopService::store($data);
            $res = [];
            if($bool){
                return response()->json(['msg'=>'入驻成功','status'=>self::status_200,'data'=>$res]);
            }else{
                return response()->json(['msg'=>'入驻失败','status'=>self::status_201,'data'=>$res]);
            }
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
        'name' => 'RentShopController',
        'method' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
        'name' => 'RentShopController',
        'method' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json([
        'name' => 'RentShopController',
        'method' => 'update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
        'name' => 'RentShopController',
        'method' => 'destroy'
        ]);
    }



    /**
     * other
     */
    public function findArea(Request $request){

        $findId = $request->get('id') ? $request->get('id') : -1;

        $data = RentShopService::findArea($findId);

        return response()->json(['msg'=>'获取成功','status'=>self::status_200,'data'=>$data]);
    }
}
