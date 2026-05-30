<?php
/**
 * Main blog/index template.
 *
 * @package HBTedarik
 */
get_header();
?>
<section class="page-hero"><div class="container"><span class="eyebrow">HB Tedarik</span><h1><?php bloginfo('name'); ?></h1><p><?php bloginfo('description'); ?></p></div></section>
<section class="section"><div class="container content-grid">
    <div class="post-list">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class('post-card'); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
            <a class="text-link" href="<?php the_permalink(); ?>">Devamını oku</a>
        </article>
    <?php endwhile; the_posts_pagination(); else : ?>
        <p>Henüz içerik eklenmemiş.</p>
    <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div></section>
<?php get_footer(); ?>
