<?php $__env->startSection('title', '申请管理'); ?>
<?php $__env->startSection('header'); ?>
    <div class="layui-inline">
        <div class="layui-btn layui-btn-small layui-btn-warm hidden-xs fresh" fresh-url="<?php echo e(url('/list')); ?>"><i class="layui-icon">&#x1002;</i></div>
    </div>
    <div class="layui-inline">
        <input type="text" lay-verify="title" value="<?php echo e(isset($input['title']) ? $input['title'] : ''); ?>" name="title" placeholder="请输入关键字" autocomplete="off" class="layui-input">
    </div>
  <!--   <div class="layui-inline">
        <select name="status" lay-filter="status" lay-verify="status">
            <option value="">请选择一个内容</option>
            <option value="rent_shop_title" <?php echo e(isset($input['status'])&&$input['status']=='admin_id'?'selected':''); ?>>用户ID</option>
            <option value="手机号" <?php echo e(isset($input['status'])&&$input['status']=='log_url'?'selected':''); ?>>URL</option>
            <option value="地址" <?php echo e(isset($input['status'])&&$input['status']=='log_ip'?'selected':''); ?>>IP</option>
            <option value="录入人" <?php echo e(isset($input['status'])&&$input['status']=='log_ip'?'selected':''); ?>>IP</option>
        </select>
    </div> -->
    <div class="layui-inline">
        <input class="layui-input" name="begin" placeholder="起始日期" onclick="layui.laydate({elem: this, festival: true})" value="<?php echo e(isset($input['begin']) ? $input['begin'] : ''); ?>">
    </div>
    <div class="layui-inline">
        <input class="layui-input" name="end" placeholder="截止日期" onclick="layui.laydate({elem: this, festival: true})" value="<?php echo e(isset($input['end']) ? $input['end'] : ''); ?>">
    </div>
    <div class="layui-inline">
        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">搜索</button>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('table'); ?>
    <table class="layui-table" lay-even lay-skin="nob">
        <colgroup>
           <!--  <col class="hidden-xs" width="20">
            <col class="hidden-xs" width="20">
            <col class="hidden-xs" width="20">
            <col class="hidden-xs" width="20">
            <col class="hidden-xs" width="20">
            <col class="hidden-xs" width="20"> -->
        </colgroup>
        <thead>
        <tr>
            <th class="hidden-xs">ID</th>
            <th class="hidden-xs">租车商户</th>
            <th class="hidden-xs">联系人</th>
            <th class="hidden-xs">电话</th>
            <th class="hidden-xs">录入人</th>
            <th class="hidden-xs">创建时间</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $pager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="hidden-xs"><?php echo e($list['id']); ?></td>
                <td class="hidden-xs"><?php echo e($list['rent_shop_title']); ?></td>
                <td class="hidden-xs"><?php echo e($list['rent_shop_name']); ?></td>
                <td class="hidden-xs"><?php echo e($list['rent_shop_phone']); ?></td>
                <td class="hidden-xs"><?php echo e($list['provider']); ?></td>
                <td class="hidden-xs"><?php echo e($list['created_at']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(!$pager[0]): ?>
            <tr><td colspan="6" style="text-align: center;color: orangered;">暂无数据</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <div class="page-wrap">
        <?php echo e($pager->render()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        layui.use(['form', 'jquery','laydate', 'layer','dialog'], function() {
            var form = layui.form(),
                $ = layui.jquery,
                laydate = layui.laydate,
                dialog = layui.dialog,
                layer = layui.layer
            ;
            form.render();
            laydate({istoday: true});
            $('.fresh').mouseenter(function() {
                dialog.tips('刷新页面', '.fresh');
            })
            // form.verify({
                // title:function(value){
                //     var select_info = $("select[name='status']").val();
                //     if(value&&select_info){
                //         // switch (select_info){
                //         //     case 'log_url':
                //         //         if(!(/^\/(.*)/).test(value))return '请输入正确格式的URL';
                //         //         break;
                //         //     case 'log_ip':
                //         //         if((/^\/(.*)/).test(value))return '请输入正确格式的IP';
                //         //         break;
                //         //     case 'admin_id':
                //         //         if(!(/^[0-9]$/).test(value))return '请输入正确格式的用户ID';
                //         //         break;
                //         //     default:
                //         //         return '输入参数错误';
                //         //         break;

                //         // }
                //     }else if(!value&&select_info){
                //         return '请输入关键字';
                //     }
                // },
                // status: function(value) {
                //     var keyword = $("input[name='title']").val();
                //     if(keyword&&!value){
                //         return '请选择一个内容';
                //     }
                // },
            // });
            $('.fresh').click(function() {
                $("input[name='begin']").val('');
                $("input[name='end']").val('');
                $("input[name='title']").val('');
                // $("select[name='status']").val('');
                $('form').submit();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>