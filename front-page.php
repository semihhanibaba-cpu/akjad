<?php
/**
 * Front page template.
 *
 * @package HBTedarik
 */
get_header();
?>
<section class="hero hero--home">
    <div class="container hero__grid">
        <div class="hero__content">
            <span class="eyebrow">Hanibaba Tedarik • Kurumsal tedarik partneri</span>
            <h1>Market, fabrika ve OSB işletmeleri için hızlı, güvenilir ve kapsamlı tedarik.</h1>
            <p>HB Tedarik; gıda, temizlik, ambalaj ve hırdavat ürünlerini düzenli sevkiyat, şeffaf teklif ve profesyonel operasyon desteğiyle kurumlara ulaştırır.</p>
            <div class="hero__actions">
                <a class="btn btn--primary" href="<?php echo esc_url(hb_tedarik_whatsapp_url('kurumsal tedarik listem')); ?>" target="_blank" rel="noopener">WhatsApp Teklif Al</a>
                <a class="btn btn--ghost" href="<?php echo esc_url(get_post_type_archive_link('hb_product')); ?>">Ürünleri İncele</a>
            </div>
            <div class="metric-row">
                <span><strong>4+</strong>Kategori</span>
                <span><strong>24s</strong>Hızlı dönüş</span>
                <span><strong>B2B</strong>Kurumsal odak</span>
            </div>
        </div>
        <div class="hero-card">
            <div class="supply-orbit"><span>Gıda</span><span>Temizlik</span><span>Ambalaj</span><span>Hırdavat</span></div>
            <h2>Teklif süreci</h2>
            <ol>
                <li>İhtiyaç listenizi gönderin.</li>
                <li>Alternatifli ürün ve fiyat teklifi alın.</li>
                <li>Planlı sevkiyatla ürünlerinize ulaşın.</li>
            </ol>
        </div>
    </div>
</section>

<section class="section section--lift">
    <div class="container section-heading">
        <span class="eyebrow">Tedarik kategorileri</span>
        <h2>İşletmenizin günlük operasyonu için ihtiyaç duyduğu ürünler tek kanalda.</h2>
    </div>
    <div class="container category-grid">
        <?php foreach ([['Gıda','Temel gıda, market ürünleri, içecek ve yemekhane sarfı.','🌾'],['Temizlik','Endüstriyel kimyasal, hijyen ekipmanı ve sarf ürünleri.','🧼'],['Ambalaj','Koli, bant, streç, poşet ve tek kullanımlık servis ürünleri.','📦'],['Hırdavat','El aletleri, bağlantı elemanları, iş güvenliği ve teknik sarf.','🛠️']] as $category) : ?>
            <article class="category-card">
                <span><?php echo esc_html($category[2]); ?></span>
                <h3><?php echo esc_html($category[0]); ?></h3>
                <p><?php echo esc_html($category[1]); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section split-section">
    <div class="container split-grid">
        <div>
            <span class="eyebrow">Neden HB Tedarik?</span>
            <h2>Satın alma yükünüzü azaltan profesyonel tedarik modeli.</h2>
            <p>Tek bir ürün değil, işletmenizin düzenli satın alma operasyonunu kolaylaştıran sürdürülebilir bir çözüm sunuyoruz.</p>
        </div>
        <div class="feature-list">
            <div><strong>Alternatifli teklif</strong><span>Marka, kalite ve bütçeye göre seçenekli fiyatlandırma.</span></div>
            <div><strong>Planlı sevkiyat</strong><span>Market, fabrika ve OSB noktalarına düzenli lojistik.</span></div>
            <div><strong>Tek muhatap</strong><span>Farklı kategorilerde tüm sarf ihtiyaçları için tek iletişim.</span></div>
            <div><strong>Kurumsal takip</strong><span>Sipariş, teslimat ve tekrar ihtiyaç süreçlerinde kayıtlı takip.</span></div>
        </div>
    </div>
</section>

<section class="section products-preview">
    <div class="container section-heading section-heading--row">
        <div>
            <span class="eyebrow">Öne çıkan ürünler</span>
            <h2>Demo katalogla yayına hazır ürün vitrinleri.</h2>
        </div>
        <a class="btn btn--ghost" href="<?php echo esc_url(get_post_type_archive_link('hb_product')); ?>">Tüm Ürünler</a>
    </div>
    <div class="container product-grid">
        <?php foreach (array_slice(hb_tedarik_demo_products(), 0, 4) as $product) { hb_tedarik_product_card($product); } ?>
    </div>
</section>

<section class="cta-band">
    <div class="container cta-band__inner">
        <div>
            <span class="eyebrow">Hızlı teklif</span>
            <h2>Tedarik listenizi gönderin, aynı gün dönüş yapalım.</h2>
        </div>
        <a class="btn btn--light" href="<?php echo esc_url(hb_tedarik_whatsapp_url('tedarik listem ve toplu alım talebim')); ?>" target="_blank" rel="noopener">WhatsApp'tan Gönder</a>
    </div>
</section>
<?php get_footer(); ?>
