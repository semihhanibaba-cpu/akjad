<?php
/**
 * Single post template.
 *
 * @package HBTedarik
 */
get_header();
while (have_posts()) : the_post(); ?>
<section class="page-hero"><div class="container"><span class="eyebrow"><?php echo esc_html(get_the_date()); ?></span><h1><?php the_title(); ?></h1></div></section>
<article class="section"><div class="container prose"><?php the_content(); ?></div></article>
<?php endwhile; get_footer(); ?>
