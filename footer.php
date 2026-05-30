<?php
/**
 * Footer template.
 *
 * @package HBTedarik
 */
?>
</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <a class="brand brand--footer" href="<?php echo esc_url(home_url('/')); ?>">
                <span class="brand__mark">HB</span>
                <span><strong>HB Tedarik</strong><small>Hanibaba Tedarik</small></span>
            </a>
            <p>Marketler, fabrikalar, şirketler ve OSB işletmeleri için güvenilir ürün tedariği, hızlı teklif ve planlı sevkiyat.</p>
        </div>
        <div>
            <h3>Kategoriler</h3>
            <ul class="footer-list">
                <li>Gıda tedariği</li>
                <li>Temizlik ürünleri</li>
                <li>Ambalaj çözümleri</li>
                <li>Hırdavat ve sarf malzemeleri</li>
            </ul>
        </div>
        <div>
            <h3>İletişim</h3>
            <ul class="footer-list">
                <li><?php echo esc_html(hb_tedarik_contact_value('phone')); ?></li>
                <li><?php echo esc_html(hb_tedarik_contact_value('email')); ?></li>
                <li><?php echo esc_html(hb_tedarik_contact_value('address')); ?></li>
            </ul>
        </div>
        <div>
            <h3>Hızlı Menü</h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'footer-menu',
                'fallback_cb'    => false,
            ]);
            ?>
        </div>
    </div>
    <div class="container footer-bottom">
        <span>© <?php echo esc_html(date_i18n('Y')); ?> HB Tedarik. Tüm hakları saklıdır.</span>
        <a href="<?php echo esc_url(hb_tedarik_whatsapp_url('web sitesi üzerinden hızlı teklif')); ?>" target="_blank" rel="noopener">WhatsApp Hızlı Teklif</a>
    </div>
</footer>
<a class="floating-whatsapp" href="<?php echo esc_url(hb_tedarik_whatsapp_url('hızlı teklif')); ?>" target="_blank" rel="noopener" aria-label="WhatsApp ile iletişim">WhatsApp</a>
<?php wp_footer(); ?>
</body>
</html>
