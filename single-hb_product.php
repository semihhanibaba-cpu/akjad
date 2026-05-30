<?php
/**
 * Single product template.
 *
 * @package HBTedarik
 */
get_header();
while (have_posts()) : the_post();
$terms = get_the_terms(get_the_ID(), 'hb_product_category');
$term_name = $terms && !is_wp_error($terms) ? $terms[0]->name : 'Ürün';
?>
<section class="product-detail-hero">
    <div class="container product-detail-grid">
        <div class="product-detail-media">
            <?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } else { echo '<span>📦</span>'; } ?>
        </div>
        <div>
            <span class="eyebrow"><?php echo esc_html($term_name); ?></span>
            <h1><?php the_title(); ?></h1>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 28)); ?></p>
            <div class="hero__actions">
                <a class="btn btn--primary" href="<?php echo esc_url(hb_tedarik_whatsapp_url(get_the_title())); ?>" target="_blank" rel="noopener">Bu ürün için WhatsApp teklifi al</a>
                <a class="btn btn--ghost" href="<?php echo esc_url(get_post_type_archive_link('hb_product')); ?>">Tüm ürünler</a>
            </div>
        </div>
    </div>
</section>
<section class="section"><div class="container prose"><?php the_content(); ?></div></section>
<?php endwhile; get_footer(); ?>
