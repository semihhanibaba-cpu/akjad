<?php
/**
 * Product catalog grid with filters.
 *
 * @package HBTedarik
 */
$terms = get_terms(['taxonomy' => 'hb_product_category', 'hide_empty' => false]);
$catalog_query = new WP_Query([
    'post_type'      => 'hb_product',
    'posts_per_page' => 24,
    'post_status'    => 'publish',
]);
?>
<section class="section products-page">
    <div class="container filter-bar" data-filters>
        <button class="is-active" data-filter="all">Tümü</button>
        <?php if (!empty($terms) && !is_wp_error($terms)) : foreach ($terms as $term) : ?>
            <button data-filter="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></button>
        <?php endforeach; else : foreach (['gida' => 'Gıda', 'temizlik' => 'Temizlik', 'ambalaj' => 'Ambalaj', 'hirdavat' => 'Hırdavat'] as $slug => $label) : ?>
            <button data-filter="<?php echo esc_attr($slug); ?>"><?php echo esc_html($label); ?></button>
        <?php endforeach; endif; ?>
    </div>
    <div class="container product-grid" data-product-grid>
        <?php if ($catalog_query->have_posts()) : while ($catalog_query->have_posts()) : $catalog_query->the_post();
            $product_terms = get_the_terms(get_the_ID(), 'hb_product_category');
            $term_name = $product_terms && !is_wp_error($product_terms) ? $product_terms[0]->name : 'Ürün';
            $term_slug = $product_terms && !is_wp_error($product_terms) ? $product_terms[0]->slug : 'urun';
            ?>
            <article class="product-card" data-category="<?php echo esc_attr($term_slug); ?>">
                <a class="product-card__media product-card__media--image" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) { the_post_thumbnail('medium_large'); } else { echo '<span>📦</span>'; } ?>
                </a>
                <div class="product-card__body">
                    <span class="eyebrow"><?php echo esc_html($term_name); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                    <a class="btn btn--whatsapp" href="<?php echo esc_url(hb_tedarik_whatsapp_url(get_the_title())); ?>" target="_blank" rel="noopener">WhatsApp ile teklif al</a>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <?php foreach (hb_tedarik_demo_products() as $product) { hb_tedarik_product_card($product); } ?>
        <?php endif; ?>
    </div>
</section>
