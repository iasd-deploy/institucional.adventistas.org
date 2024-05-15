<?php

/* Template name: Page - Front Page */

get_header();
require(get_stylesheet_directory() . '/template-parts/slider-front-page.php');
?>
<section class="pa-content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>
<?php get_footer(); ?>