<?php
/**
 * Template Name: İletişim Sayfası
 *
 * @package HBTedarik
 */
get_header();
?>
<section class="page-hero"><div class="container"><span class="eyebrow">İletişim</span><h1>Teklif, tedarik listesi ve iş ortaklığı için bize ulaşın.</h1></div></section>
<section class="section contact-section">
    <div class="container contact-grid">
        <div class="contact-card">
            <h2>HB Tedarik</h2>
            <p>Gıda, temizlik, ambalaj ve hırdavat ürünleri için kurumsal satın alma listenizi iletin.</p>
            <ul class="footer-list">
                <li><strong>Telefon:</strong> <?php echo esc_html(hb_tedarik_contact_value('phone')); ?></li>
                <li><strong>E-posta:</strong> <?php echo esc_html(hb_tedarik_contact_value('email')); ?></li>
                <li><strong>Adres:</strong> <?php echo esc_html(hb_tedarik_contact_value('address')); ?></li>
            </ul>
            <a class="btn btn--primary" href="<?php echo esc_url(hb_tedarik_whatsapp_url('iletişim sayfasından teklif talebim')); ?>" target="_blank" rel="noopener">WhatsApp ile yaz</a>
        </div>
        <form class="quote-form" action="<?php echo esc_url(hb_tedarik_whatsapp_url('iletişim formu teklif talebim')); ?>" method="get" target="_blank">
            <label>Ad Soyad / Firma<input type="text" name="firma" placeholder="Firma adınız"></label>
            <label>Telefon<input type="tel" name="telefon" placeholder="Telefon numaranız"></label>
            <label>İhtiyaç Kategorisi<select name="kategori"><option>Gıda</option><option>Temizlik</option><option>Ambalaj</option><option>Hırdavat</option><option>Tüm kategoriler</option></select></label>
            <label>Mesaj<textarea name="mesaj" rows="5" placeholder="Tedarik listenizi yazın"></textarea></label>
            <a class="btn btn--primary" href="<?php echo esc_url(hb_tedarik_whatsapp_url('detaylı tedarik listem')); ?>" target="_blank" rel="noopener">WhatsApp'a geç</a>
        </form>
    </div>
</section>
<?php get_footer(); ?>
