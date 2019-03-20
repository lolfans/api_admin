<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="layui-nav-item">
            <a href="javascript:;"><i class="layui-icon"><?php echo e($menu['icon']); ?></i>&nbsp;&nbsp;&nbsp;<?php echo e($menu['title']); ?></a>
            <dl class="layui-nav-child <?php echo e($menu['id'] == $parent_id ? 'layui-nav-itemed' : ''); ?>">
                <?php if(isset($menu['children']) && !empty($menu['children'])): ?>
                    <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd><a href="javascript:;" data-url="<?php echo e(url($child['uri'])); ?>" data-id='<?php echo e($child['id']); ?>' data-text="<?php echo e($child['title']); ?>"><i class="layui-icon layui-btn-small"><?php echo e($child['icon']); ?></i>  <?php echo e($child['title']); ?></a></dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </dl>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>