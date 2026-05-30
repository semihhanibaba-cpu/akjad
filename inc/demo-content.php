<?php
/**
 * Optional demo content importer for a ready-to-publish installation.
 *
 * @package HBTedarik
 */

if (!defined('ABSPATH')) {
    exit;
}

function hb_tedarik_admin_menu(): void
{
    add_theme_page(
        __('HB Tedarik Demo Kurulum', 'hb-tedarik'),
        __('HB Demo Kurulum', 'hb-tedarik'),
        'manage_options',
        'hb-tedarik-demo',
        'hb_tedarik_demo_page'
    );
}
add_action('admin_menu', 'hb_tedarik_admin_menu');

function hb_tedarik_demo_page(): void
{
    if (isset($_POST['hb_tedarik_import']) && check_admin_referer('hb_tedarik_import_demo')) {
        hb_tedarik_import_demo_content();
        echo '<div class="notice notice-success"><p>Demo sayfalar, ürünler ve menü oluşturuldu.</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>HB Tedarik Demo Kurulum</h1>
        <p>Tek tıkla ana sayfa, hakkımızda, hizmetler, ürünler, kalite, blog, iletişim ve örnek ürünleri oluşturur.</p>
        <form method="post">
            <?php wp_nonce_field('hb_tedarik_import_demo'); ?>
            <p><button class="button button-primary" name="hb_tedarik_import" value="1">Demo içerikleri kur</button></p>
        </form>
    </div>
    <?php
}

function hb_tedarik_import_demo_content(): void
{
    $pages = [
        'Ana Sayfa'   => ['template' => 'page-templates/front-page.php', 'content' => 'HB Tedarik kurumsal ana sayfa demo içeriği.'],
        'Hakkımızda'  => ['template' => '', 'content' => 'Hanibaba Tedarik; gıda, temizlik, ambalaj ve hırdavat ürünlerini marketlere, fabrikalara, şirketlere ve OSB firmalarına düzenli olarak ulaştıran kurumsal tedarik firmasıdır.'],
        'Hizmetler'   => ['template' => '', 'content' => 'İhtiyaç analizi, tekliflendirme, planlı sevkiyat, stok takibi ve satış sonrası destek hizmetleri sunuyoruz.'],
        'Ürünler'     => ['template' => 'page-templates/products-page.php', 'content' => 'Kategorilere ayrılmış demo ürün kataloğu.'],
        'Kalite'      => ['template' => '', 'content' => 'Güvenilir marka seçimi, hızlı lojistik, sürdürülebilir tedarik ve şeffaf teklif süreçleri.'],
        'Blog'        => ['template' => '', 'content' => 'Tedarik, satın alma ve operasyon ipuçları.'],
        'İletişim'    => ['template' => 'page-templates/contact-page.php', 'content' => 'Teklif ve iş ortaklığı için bizimle iletişime geçin.'],
    ];

    $menu = wp_get_nav_menu_object('HB Ana Menü');
    $menu_id = $menu ? (int) $menu->term_id : wp_create_nav_menu('HB Ana Menü');
    if (is_wp_error($menu_id)) {
        $menu_id = 0;
    }

    foreach ($pages as $title => $data) {
        $existing = get_page_by_title($title);
        $page_id = $existing ? $existing->ID : wp_insert_post([
            'post_title'   => $title,
            'post_content' => $data['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ]);

        if ($page_id && !is_wp_error($page_id)) {
            if ($data['template']) {
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
            if ($title === 'Ana Sayfa') {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page_id);
            }
            if ($menu_id) {
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'     => $title,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_id,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ]);
            }
        }
    }

    foreach (['Gıda', 'Temizlik', 'Ambalaj', 'Hırdavat'] as $category) {
        if (!term_exists($category, 'hb_product_category')) {
            wp_insert_term($category, 'hb_product_category');
        }
    }

    foreach (hb_tedarik_demo_products() as $product) {
        if (get_page_by_title($product['name'], OBJECT, 'hb_product')) {
            continue;
        }
        $product_id = wp_insert_post([
            'post_title'   => $product['name'],
            'post_content' => $product['desc'] . "\n\nToplu alım, düzenli sevkiyat ve kurumsal teklif için WhatsApp bağlantısını kullanabilirsiniz.",
            'post_excerpt' => $product['desc'],
            'post_status'  => 'publish',
            'post_type'    => 'hb_product',
        ]);
        if ($product_id && !is_wp_error($product_id)) {
            wp_set_object_terms($product_id, $product['cat'], 'hb_product_category');
        }
    }

    if ($menu_id) {
        $locations = get_theme_mod('nav_menu_locations', []);
        $locations['primary'] = $menu_id;
        $locations['footer'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
    flush_rewrite_rules();
}
