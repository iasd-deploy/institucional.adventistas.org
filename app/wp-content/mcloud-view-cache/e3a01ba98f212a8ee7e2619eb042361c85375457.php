<div id="setting-<?php echo e($name); ?>" <?php echo e((($conditions) ? 'data-conditions="true"' : '')); ?>>
<div style="display:none">
    <input type="password" tabindex="-1">
</div>
<input size='40' type='password' id="<?php echo e($name); ?>" name='<?php echo e($name); ?>' value='<?php echo e($value); ?>' placeholder='<?php echo e($placeholder); ?>'>
<?php if($description): ?>
<p class='description'><?php echo $description; ?></p>
<?php endif; ?>
<?php if($conditions): ?>
<script id="<?php echo e($name); ?>-conditions" type="text/plain">
        <?php echo json_encode($conditions, JSON_PRETTY_PRINT); ?>

    </script>
<?php endif; ?>
</div>
<?php /**PATH /Users/clecyo.freitas/Documents/Dev_DSA/institucional.adventistas.org.git/app/wp-content/plugins/ilab-media-tools/views/base/fields/password.blade.php ENDPATH**/ ?>