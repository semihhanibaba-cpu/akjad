<?php
/**
 * Product catalog post type and taxonomies.
 *
 * @package HBTedarik
 */

if (!defined('ABSPATH')) {
    exit;
}

function hb_tedarik_register_products(): void
{
    register_post_type('hb_product', [
        'labels' => [
            'name'          => __('Ürünler', 'hb-tedarik'),
            'singular_name' => __('Ürün', 'hb-tedarik'),
            'add_new_item'  => __('Yeni Ürün Ekle', 'hb-tedarik'),
            'edit_item'     => __('Ürünü Düzenle', 'hb-tedarik'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-products',
        'rewrite'      => ['slug' => 'urunler'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);

    register_taxonomy('hb_product_category', ['hb_product'], [
        'labels' => [
            'name'          => __('Ürün Kategorileri', 'hb-tedarik'),
            'singular_name' => __('Ürün Kategorisi', 'hb-tedarik'),
        ],
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => ['slug' => 'urun-kategori'],
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ]);
}
add_action('init', 'hb_tedarik_register_products');

function hb_tedarik_product_archive_title(string $title): string
{
    if (is_post_type_archive('hb_product')) {
        return __('Ürünler ve Tedarik Kataloğu', 'hb-tedarik');
    }

    return $title;
}
add_filter('get_the_archive_title', 'hb_tedarik_product_archive_title');
