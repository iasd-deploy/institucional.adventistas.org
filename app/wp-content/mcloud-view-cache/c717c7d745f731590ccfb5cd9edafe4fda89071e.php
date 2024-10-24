<?php
$hideBug = get_option('ilab_media_cloud_hide_upgrade_bug');
if (!empty($hideBug)) {
	if ($hideBug + (60 * 60 * 24 * 30) < time()) {
		delete_option('ilab_media_cloud_hide_upgrade_bug');
		$hideBug = false;
    }
}
?>

<div class="upgrade-promo <?php if(!empty($hideBug)): ?> hide-on-mobile <?php endif; ?>">
    <div class="upgrade-interior">
        <h2>Upgrade to Media Cloud Premium</h2>
        <ul>
            <li>Migrate your existing WordPress media library to <?php echo e(\MediaCloud\Plugin\Tools\Storage\StorageToolSettings::currentDriverName()); ?></li>
            <li>Easily manage your theme's image sizes</li>
            <li>Built-in dynamic image generation</li>
            <li>Image moderation with Google Vision</li>
            <li>Serve your CSS/JS assets from the cloud (Pro)</li>
            <li>Upload directly to <?php echo e(\MediaCloud\Plugin\Tools\Storage\StorageToolSettings::currentDriverName()); ?> (Pro)</li>
            <li>Built-in <?php echo e(\MediaCloud\Plugin\Tools\Storage\StorageToolSettings::currentDriverName()); ?> storage browser (Pro)</li>
            <li>Import media from <?php echo e(\MediaCloud\Plugin\Tools\Storage\StorageToolSettings::currentDriverName()); ?> (Pro)</li>
            <li>WPML, WooCommerce, Easy Digital Downloads, WP Job Manager integration (Pro)</li>
            <li>plus <a href="https://mediacloud.press/comparison?utm_source=mediacloud-free&utm_medium=in-app&utm_campaign=mediacloud-free" target="_blank">more awesome features!</a></li>
        </ul>
        <div class="button-container">
           <a href="<?php echo e(admin_url('admin.php?page=media-cloud-pricing')); ?>">Upgrade Now!</a>
        </div>
        <a href="#" class="upgrade-close">Close</a>
    </div>
</div>
<?php /**PATH /Users/clecyo.freitas/Documents/Dev_DSA/institucional.adventistas.org.git/app/wp-content/plugins/ilab-media-tools/views/base/upgrade.blade.php ENDPATH**/ ?>