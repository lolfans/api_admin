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
use App\Models\Log;
use App\Http\Controllers\Controller;
class AreaController extends Controller
{
    
    public function index(Request $request)
    {
        $sql = Log::with('user.roles');
        $sql->leftJoin(config('admin.user_table') . " as users", "users.id" , "=", "admin_logs.admin_id");
        if(true == $request->has('title')&&true == $request->has('status')) {
            $sql->where('admin_logs.'.$request->input('status'), 'LIKE', '%'.trim($request->input('title')).'%');
        }
        if(true == $request->has('begin')) {
            $sql->where('admin_logs.log_time', '>=', trim($request->input('begin')));
        }
        $sql->select('admin_logs.*');
        $pager = $sql->orderBy('admin_logs.id', 'desc')->paginate()->appends($request->all());
        return view('area.list', ['pager'=>$pager,'input'=>$request->all()]);
    }
}
