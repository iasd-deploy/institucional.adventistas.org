<div id="setting-<?php echo e($name); ?>" <?php echo e((($conditions) ? 'data-conditions="true"' : '')); ?>>
<textarea cols='40' rows="4" id="<?php echo e($name); ?>" name='<?php echo e($name); ?>' placeholder='<?php echo e($placeholder); ?>'><?php echo e($value); ?></textarea>
<?php if($description): ?>
<p class='description'><?php echo $description; ?></p>
<?php endif; ?>
<?php if($conditions): ?>
<script id="<?php echo e($name); ?>-conditions" type="text/plain">
        <?php echo json_encode($conditions, JSON_PRETTY_PRINT); ?>

    </script>
<?php endif; ?>
</div>
<?php /**PATH /Users/clecyo.freitas/Documents/Dev_DSA/institucional.adventistas.org.git/app/wp-content/plugins/ilab-media-tools/views/base/fields/text-area.blade.php ENDPATH**/ ?>