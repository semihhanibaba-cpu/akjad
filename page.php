<?php
/**
 * Default page template.
 *
 * @package HBTedarik
 */
get_header();
while (have_posts()) : the_post(); ?>
<section class="page-hero"><div class="container"><span class="eyebrow">HB Tedarik</span><h1><?php the_title(); ?></h1></div></section>
<section class="section"><div class="container prose"><?php the_content(); ?></div></section>
<?php endwhile; get_footer(); ?>
