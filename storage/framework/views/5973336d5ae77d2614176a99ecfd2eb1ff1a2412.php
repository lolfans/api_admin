<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Config::get('app.name')); ?></title>
    <link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/admin.css" />
    <script src="/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/admin/js/common.js?fsfd=1" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="wrap-container clearfix">
    <div class="column-content-detail">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <?php echo $__env->yieldContent('header'); ?>
                </div>
                <?php echo e(csrf_field()); ?>

            </div>
        </form>
        <div class="layui-form" id="table-list">
            <?php echo $__env->yieldContent('table'); ?>
        </div>
    </div>
</div>
</body>
<?php echo $__env->yieldContent('js'); ?>
</html>