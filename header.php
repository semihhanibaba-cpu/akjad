<?php
/**
 * Header template.
 *
 * @package HBTedarik
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content">İçeriğe geç</a>
<header class="site-header" data-header>
    <div class="topbar">
        <div class="container topbar__inner">
            <span>Kurumsal tedarik • Gıda • Temizlik • Ambalaj • Hırdavat</span>
            <a href="mailto:<?php echo esc_attr(hb_tedarik_contact_value('email')); ?>"><?php echo esc_html(hb_tedarik_contact_value('email')); ?></a>
        </div>
    </div>
    <div class="container nav-shell">
        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="HB Tedarik ana sayfa">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="brand__mark">HB</span>
                <span><strong>HB Tedarik</strong><small>Hanibaba Tedarik</small></span>
            <?php endif; ?>
        </a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu" data-menu-toggle>
            <span></span><span></span><span></span>
            <strong>Menü</strong>
        </button>
        <nav class="primary-nav" id="primary-menu" aria-label="Ana menü" data-primary-nav>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu',
                'fallback_cb'    => 'hb_tedarik_fallback_menu',
            ]);
            ?>
        </nav>
        <a class="btn btn--primary nav-cta" href="<?php echo esc_url(hb_tedarik_whatsapp_url('kurumsal tedarik ihtiyacı')); ?>" target="_blank" rel="noopener">Teklif Al</a>
    </div>
</header>
<main id="content" class="site-main">
