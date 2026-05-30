<?php
/**
 * Reusable template helpers.
 *
 * @package HBTedarik
 */

if (!defined('ABSPATH')) {
    exit;
}

function hb_tedarik_whatsapp_phone(): string
{
    return preg_replace('/\D+/', '', (string) get_theme_mod('hb_tedarik_whatsapp', '905551112233'));
}

function hb_tedarik_contact_value(string $key): string
{
    $defaults = [
        'phone'   => '+90 555 111 22 33',
        'email'   => 'teklif@hanibabatedarik.com',
        'address' => 'İstanbul / Türkiye - OSB ve kurumsal tedarik operasyon merkezi',
    ];

    return (string) get_theme_mod('hb_tedarik_' . $key, $defaults[$key] ?? '');
}

function hb_tedarik_whatsapp_url(string $subject = 'Genel tedarik teklifi'): string
{
    $message = sprintf(
        'Merhaba HB Tedarik, %s hakkında teklif ve detaylı bilgi almak istiyorum.',
        $subject
    );

    return 'https://wa.me/' . hb_tedarik_whatsapp_phone() . '?text=' . rawurlencode($message);
}

function hb_tedarik_demo_products(): array
{
    return [
        ['name' => 'Un, Bakliyat ve Temel Gıda Kolisi', 'cat' => 'Gıda', 'desc' => 'Market, yemekhane ve üretim tesisleri için düzenli temel gıda tedariki.', 'icon' => '🌾'],
        ['name' => 'Endüstriyel Temizlik Kimyasalları', 'cat' => 'Temizlik', 'desc' => 'Fabrika, OSB ve kurumsal tesislere uygun profesyonel temizlik çözümleri.', 'icon' => '🧼'],
        ['name' => 'Koli, Streç Film ve Ambalaj Seti', 'cat' => 'Ambalaj', 'desc' => 'Sevkiyat süreçleri için dayanıklı koli, bant, streç ve paketleme ürünleri.', 'icon' => '📦'],
        ['name' => 'İş Güvenliği ve Hırdavat Ürünleri', 'cat' => 'Hırdavat', 'desc' => 'Sarf malzeme, el aleti, bağlantı elemanı ve iş güvenliği ekipmanları.', 'icon' => '🛠️'],
        ['name' => 'Market Raf ve Operasyon Sarfı', 'cat' => 'Gıda', 'desc' => 'Marketler için raf tüketim ürünleri, sarf malzemeleri ve operasyon desteği.', 'icon' => '🛒'],
        ['name' => 'Tek Kullanımlık Servis Ürünleri', 'cat' => 'Ambalaj', 'desc' => 'Karton bardak, kap, tabak, çatal-kaşık ve paket servis ambalajları.', 'icon' => '🥡'],
    ];
}

function hb_tedarik_product_card(array $product): void
{
    $name = $product['name'];
    $cat = $product['cat'];
    $desc = $product['desc'];
    $icon = $product['icon'] ?? '📦';
    ?>
    <article class="product-card" data-category="<?php echo esc_attr(sanitize_title($cat)); ?>">
        <div class="product-card__media" aria-hidden="true"><span><?php echo esc_html($icon); ?></span></div>
        <div class="product-card__body">
            <span class="eyebrow"><?php echo esc_html($cat); ?></span>
            <h3><?php echo esc_html($name); ?></h3>
            <p><?php echo esc_html($desc); ?></p>
            <a class="btn btn--whatsapp" href="<?php echo esc_url(hb_tedarik_whatsapp_url($name)); ?>" target="_blank" rel="noopener">
                WhatsApp ile teklif al
            </a>
        </div>
    </article>
    <?php
}

function hb_tedarik_fallback_menu(): void
{
    $items = [
        home_url('/') => 'Ana Sayfa',
        home_url('/hakkimizda') => 'Hakkımızda',
        home_url('/hizmetler') => 'Hizmetler',
        get_post_type_archive_link('hb_product') ?: home_url('/urunler') => 'Ürünler',
        home_url('/iletisim') => 'İletişim',
    ];
    echo '<ul class="menu">';
    foreach ($items as $url => $label) {
        printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
    }
    echo '</ul>';
}
