<?php

get_header();

$sem_imagem = get_theme_file_uri() . "/assets/img/sem-imagem.png";

function getTplPageURL($page_template)
{
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $page_template
    ));

    if (isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}

if (have_posts())
    the_post();

?>

<section class="pa-header py-3">
    <header class="container">
        <div class="row">
            <div class="col py-5">
                <?php if (!is_home() || !is_front_page()) { ?>
                    <span class="pa-tag rounded-1 px-3 py-1 d-table-cell"><?php $PA_Header_Title = new PaHeaderTitle('tag'); ?></span>
                <?php } ?>
                <h1 class="mt-2"><?= _e('District', 'iasd') ?> | <?= the_title() ?></h1>
            </div>
        </div>
    </header>
</section>


<section class="pa-content pa-lideres my-5">
    <div class="container">
        <div class="pa-lider-geral row row-cols-auto mb-5">
            <div class="col-12 col-xl-4 mb-5">
                <h2 class="mb-4"><?= _e('Shepherd', 'iasd') ?></h2>
                <?php
                $shepherds = get_field('shepherds');
                if ($shepherds) {
                    foreach ($shepherds as $index => $shepherd) {
                        $img = $shepherd['shepherd_foto'];
                ?>
                        <div class="d-flex flex-column align-items-center mt-5">
                            <img src="<?= esc_url($img['sizes']['lider-thumb'] ?: $sem_imagem); ?>" alt="<?php $shepherd['shepherd_nome'] ?>" class="pa-lider-thumb rounded-circle float-start me-3" width="120" height="120">
                            <p class="mt-4 mb-0 fw-bold"><?= $shepherd['shepherd_nome'] ?></p>
                            <?php
                            $netork = $shepherd['shepherd_netork'];
                            if ($netork) {
                            ?>
                                <p class="mb-0 font-italic">
                                    <a href="mailto:<?= $netork['shepherd_email'] ?>" rel="noreferrer noopener" target="_blank">
                                        <?= $netork['shepherd_email'] ?>
                                    </a>
                                </p>
                                <div class="mt-4">
                                    <ul class="pa-lider-contact list-inline">
                                        <?php
                                        if ($netork['shepherd_facebook']) : ?>
                                            <li class="list-inline-item mx-2"><a href="<?= $netork['shepherd_facebok'] ?>" rel="noreferrer noopener" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <?php endif;
                                        if ($netork['shepherd_twitter']) :
                                        ?>
                                            <li class="list-inline-item mx-2"><a href="<?= $netork['shepherd_twitter'] ?>" rel="noreferrer noopener" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <?php endif;
                                        if ($netork['shepherd_instagram']) :
                                        ?>
                                            <li class="list-inline-item mx-2"><a href="<?= $netork['shepherd_instagram'] ?>" rel="noreferrer noopener" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="<?= end($shepherds) != $shepherd ?: 'pb-5 border-bottom' ?> d-md-none">
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="col-12 col-xl-8 mb-5">

                <h2 class="mb-4"><?= _e('Churches', 'iasd') ?></h2>

                <?php
                $churches = get_field('churches');
                if ($churches) {
                    foreach ($churches as $index => $churche) {
                        $img = $churche['church_foto'];

                ?>
                        <div class="row mt-5 align-items-center">
                            <div class="<?= $index == 0 ? 'col-md-6' : 'col-md-4' ?> mb-5 mb-md-0">
                                <div class="ratio ratio-4x3">
                                    <img src="<?=  esc_url($img['sizes']['lider-thumb'] ?: $sem_imagem); ?>" alt="<?php $churche['church_nome']; ?>" class="rounded float-start me-3" width="120" height="120">
                                </div>
                            </div>
                            <div class="<?= $index == 0 ? 'col-md-6' : 'col-md-6' ?>">
                                <h2 class="p-0 border-0"><?= $churche['church_nome'] ?></h2>
                                <p><i class="fas fa-map-marker-alt me-2"></i><?= $churche['church_address'] ?></p>
                                <?php
                                $netork = $churche['church_netork'];
                                if ($netork) {
                                ?>

                                    <div class="row">
                                        <?php
                                        if ($netork['district_youtube']) :
                                        ?>
                                            <div class="col-2 col-md-3">
                                                <div class="ratio ratio-1x1">
                                                    <a class="border p-3 me-3 bg-light" href="<?= $netork['district_youtube'] ?>" rel="noreferrer noopener" target="_blank"><i class="fab fa-youtube position-absolute top-50 start-50 translate-middle"></i></a>
                                                </div>
                                            </div>
                                        <?php endif;
                                        if ($netork['district_maps']) :
                                        ?>
                                            <div class="col-2 col-md-3">
                                                <div class="ratio ratio-1x1">
                                                    <a class="border p-3 me-3 bg-light" href="<?= $netork['district_maps'] ?>" rel="noreferrer noopener" target="_blank"><i class="fas fa-map-marked-alt position-absolute top-50 start-50 translate-middle"></i></a>
                                                </div>
                                            </div>
                                        <?php endif;
                                        if ($netork['district_waze']) :
                                        ?>
                                            <div class="col-2 col-md-3">
                                                <div class="ratio ratio-1x1">
                                                    <a class="border p-3 me-3 bg-light" href="<?= $netork['district_waze'] ?>" rel="noreferrer noopener" target="_blank"><i class="fab fa-waze position-absolute top-50 start-50 translate-middle"></i></a>
                                                </div>
                                            </div>
                                        <?php endif;
                                        if ($netork['district_email']) :
                                        ?>
                                            <div class="col-2 col-md-3">
                                                <div class="ratio ratio-1x1">
                                                    <a class="border p-3 me-3 bg-light" href="mailto:<?= $netork['district_email'] ?>" rel="noreferrer noopener" target="_blank"><i class="fas fa-at position-absolute top-50 start-50 translate-middle"></i></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                <?php


                                }
                                ?>


                            </div>



                        </div>

                        <div class="<?= $index != 0 ?: 'pb-5 border-bottom'  ?> d-none d-md-block">
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>