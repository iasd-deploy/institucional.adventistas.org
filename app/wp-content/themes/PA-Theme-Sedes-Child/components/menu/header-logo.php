<?php $sede = getSiteInfo(); ?>

<div class="col-auto d-flex align-items-center pa-header-logo">
  <a href="<?= get_home_url(); ?>" class="w-auto h-100">
    <img src="/pt/wp-content/uploads/sites/3/2023/10/logo.svg" alt="<?= !empty($sede['ct_headquarter']->name) ? $sede['ct_headquarter']->name : '' ?>" title="<?= !empty($sede['ct_headquarter']->name) ? $sede['ct_headquarter']->name : '' ?>" class="h-100 w-auto pa-logo-iasd">
  </a>
</div>

