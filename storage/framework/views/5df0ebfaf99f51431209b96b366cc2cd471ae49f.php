<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Config::get('app.name')); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css" href="static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="static/admin/css/admin.css"/>
</head>
<body>
<div class="main-layout" id='main-layout'>
    <!--侧边栏-->
    <div class="main-layout-side">
        <div class="m-logo">
        </div>
        <?php echo $__env->make("admin.menu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!--右侧内容-->
    <div class="main-layout-container">
        <!--头部-->
        <?php echo $__env->make("admin.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--主体内容-->
        <div class="main-layout-body">
            <!--tab 切换-->
            <div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
                <ul class="layui-tab-title">
                    <li class="layui-this welcome">后台主页</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
                        <!--1-->
                        <iframe src="<?php echo e(url('/index')); ?>" width="100%" height="100%" id="iframe" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe>
                        <!--1end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--遮罩-->
    <div class="main-mask">

    </div>
</div>
<script type="text/javascript">
    var scope={
        link:"<?php echo e(url('/welcome')); ?>"
    }
</script>
<script src="static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="static/admin/js/main.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
