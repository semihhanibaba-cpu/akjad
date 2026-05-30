<?php
/**
 * Theme setup, assets, customizer and navigation.
 *
 * @package HBTedarik
 */

if (!defined('ABSPATH')) {
    exit;
}

function hb_tedarik_setup(): void
{
    load_theme_textdomain('hb-tedarik', HB_TEDARIK_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 96,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor.css');

    register_nav_menus([
        'primary' => __('Ana Menü', 'hb-tedarik'),
        'footer'  => __('Alt Menü', 'hb-tedarik'),
    ]);
}
add_action('after_setup_theme', 'hb_tedarik_setup');

function hb_tedarik_content_width(): void
{
    $GLOBALS['content_width'] = apply_filters('hb_tedarik_content_width', 1180);
}
add_action('after_setup_theme', 'hb_tedarik_content_width', 0);

function hb_tedarik_scripts(): void
{
    wp_enqueue_style('hb-tedarik-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap', [], null);
    wp_enqueue_style('hb-tedarik-style', HB_TEDARIK_URI . '/assets/css/main.css', [], HB_TEDARIK_VERSION);
    wp_enqueue_script('hb-tedarik-main', HB_TEDARIK_URI . '/assets/js/main.js', [], HB_TEDARIK_VERSION, true);
    wp_localize_script('hb-tedarik-main', 'hbTedarik', [
        'whatsappPhone' => hb_tedarik_whatsapp_phone(),
        'siteName'      => get_bloginfo('name'),
    ]);
}
add_action('wp_enqueue_scripts', 'hb_tedarik_scripts');

function hb_tedarik_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('hb_tedarik_contact', [
        'title'       => __('HB Tedarik İletişim', 'hb-tedarik'),
        'description' => __('Telefon, WhatsApp, adres ve teklif ayarları.', 'hb-tedarik'),
        'priority'    => 30,
    ]);

    $settings = [
        'hb_tedarik_whatsapp' => ['label' => __('WhatsApp Numarası (ülke kodu ile)', 'hb-tedarik'), 'default' => '905551112233'],
        'hb_tedarik_phone'    => ['label' => __('Telefon', 'hb-tedarik'), 'default' => '+90 555 111 22 33'],
        'hb_tedarik_email'    => ['label' => __('E-posta', 'hb-tedarik'), 'default' => 'teklif@hanibabatedarik.com'],
        'hb_tedarik_address'  => ['label' => __('Adres', 'hb-tedarik'), 'default' => 'İstanbul / Türkiye - OSB ve kurumsal tedarik operasyon merkezi'],
    ];

    foreach ($settings as $setting_id => $args) {
        $wp_customize->add_setting($setting_id, [
            'default'           => $args['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control($setting_id, [
            'section' => 'hb_tedarik_contact',
            'label'   => $args['label'],
            'type'    => 'text',
        ]);
    }
}
add_action('customize_register', 'hb_tedarik_customize_register');

function hb_tedarik_body_classes(array $classes): array
{
    $classes[] = 'hb-theme';
    return $classes;
}
add_filter('body_class', 'hb_tedarik_body_classes');
