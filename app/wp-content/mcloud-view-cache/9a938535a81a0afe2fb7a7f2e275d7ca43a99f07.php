<?php
$toggleClass = (isset($toggleClass)) ? $toggleClass : 'ic-Super-toggle--on-off';
$dataAttrs = '';
if (!empty($extraData)) {
	foreach($extraData as $key => $dataValue) {
		$dataAttrs .= " data-$key='$dataValue'";
    }
}
?>
<div class="<?php echo e($toggleClass); ?>">
    <input type="checkbox" id="<?php echo e($name); ?>" name='<?php echo e($name); ?>' class="ic-Super-toggle__input" <?php echo e((($value) ? 'checked' : '')); ?> <?php echo e((!$enabled) ? 'disabled' : ''); ?>  <?php echo $dataAttrs; ?>>
    <label class="ic-Super-toggle__label" for="<?php echo e($name); ?>">
        <div class="ic-Super-toggle__screenreader"><?php echo e($description); ?></div>
        <div class="ic-Super-toggle__disabled-msg" data-checked="On" data-unchecked="Off" aria-hidden="true"></div>
        <div class="ic-Super-toggle-switch" aria-hidden="true">
            <div class="ic-Super-toggle-option-LEFT" aria-hidden="true">
                <svg class="ic-Super-toggle__svg" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="548.9" height="548.9" viewBox="0 0 548.9 548.9" xml:space="preserve"><polygon points="449.3 48 195.5 301.8 99.5 205.9 0 305.4 95.9 401.4 195.5 500.9 295 401.4 548.9 147.5 "/></svg>
            </div>
            <div class="ic-Super-toggle-option-RIGHT" aria-hidden="true">
                <svg class="ic-Super-toggle__svg" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 28 28" xml:space="preserve"><polygon points="28 22.4 19.6 14 28 5.6 22.4 0 14 8.4 5.6 0 0 5.6 8.4 14 0 22.4 5.6 28 14 19.6 22.4 28 " fill="#030104"/></svg>
            </div>
        </div>
    </label>
</div>
<?php /**PATH /Users/clecyo.freitas/Documents/Dev_DSA/institucional.adventistas.org.git/app/wp-content/plugins/ilab-media-tools/views/base/ui/checkbox.blade.php ENDPATH**/ ?>