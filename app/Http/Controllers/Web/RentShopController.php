<?php
/**
 * 日志管理
 *
 * @author      ls
 * @Time: 2017/07/14 15:57
 * @version     1.0 版本号
 */
namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Models\Rentshop;
use App\Http\Controllers\Controller;
class RentShopController extends Controller
{
    
    public function index(Request $request)
    {
        $builder = Rentshop::where('is_disable',0);
        if($request->title){
            $builder->where('rent_shop_title','like','%'.$request->title.'%')
            ->orWhere('rent_shop_name','like','%'.$request->title.'%')
            ->orWhere('rent_shop_phone','like','%'.$request->title.'%');
        }
        $pager = $builder->paginate()->appends($request->all());
        return view('rentshop.list', ['pager'=>$pager,'input'=>$request->all()]);
    }
}
