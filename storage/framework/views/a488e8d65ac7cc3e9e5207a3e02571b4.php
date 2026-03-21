

<?php $__env->startSection('title', 'About Us — SoleMates Footwear'); ?>

<?php $__env->startSection('head'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --ab-black:      #0A0A0A;
    --ab-charcoal:   #1A1A1A;
    --ab-gold:       #C8A96E;
    --ab-gold-dk:    #A8893E;
    --ab-white:      #FFFFFF;
    --ab-cream:      #F9F7F2;
    --ab-border:     #E4E2DC;
    --ab-muted:      #888884;
    --ab-soft:       #5A5A5A;
    --f-head: 'Montserrat', sans-serif;
    --f-body: 'Inter', sans-serif;
    --ease: cubic-bezier(0.4, 0, 0.2, 1);
  }

  body { font-family: var(--f-body); }

  /* ── Page Header ── */
  .about-hero {
    background: linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 100%);
    padding: 5rem 0 4rem;
    position: relative;
    overflow: hidden;
  }
  .about-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 70% 60% at 10% 110%, rgba(200,169,110,0.20) 0%, transparent 55%),
      radial-gradient(ellipse 50% 40% at 90% -10%,  rgba(200,169,110,0.10) 0%, transparent 55%);
    pointer-events: none;
  }
  .about-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.045) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
  }
  .about-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 700px;
  }
  .about-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--f-head);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--ab-gold);
    margin-bottom: 1.25rem;
  }
  .about-eyebrow::before {
    content: '';
    display: block;
    width: 22px;
    height: 1.5px;
    background: var(--ab-gold);
    border-radius: 2px;
  }
  .about-hero-title {
    font-family: var(--f-head);
    font-size: clamp(2.2rem, 4vw, 3.4rem);
    font-weight: 900;
    color: #FFFFFF;
    line-height: 1.08;
    letter-spacing: -0.03em;
    margin-bottom: 1.25rem;
  }
  .about-hero-title .gold { color: var(--ab-gold); }
  .about-hero-desc {
    font-size: 1rem;
    line-height: 1.75;
    color: rgba(255,255,255,0.55);
    max-width: 560px;
  }

  /* ── Section Shared ── */
  .about-section {
    padding: 5rem 0;
  }
  .about-section-alt {
    background: var(--ab-cream);
  }
  .section-kicker {
    font-family: var(--f-head);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--ab-gold-dk);
    margin-bottom: 0.6rem;
  }
  .section-title {
    font-family: var(--f-head);
    font-size: clamp(1.7rem, 2.5vw, 2.4rem);
    font-weight: 900;
    color: var(--ab-black);
    letter-spacing: -0.03em;
    line-height: 1.15;
    margin-bottom: 1.1rem;
  }
  .section-body {
    font-size: 0.95rem;
    line-height: 1.8;
    color: var(--ab-soft);
    max-width: 560px;
  }

  /* ── Story Section ── */
  .story-visual {
    background: var(--ab-black);
    border-radius: 16px;
    min-height: 380px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 2.25rem;
    position: relative;
    overflow: hidden;
  }
  .story-visual::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 70% at 20% 110%, rgba(200,169,110,0.25) 0%, transparent 60%);
  }
  .story-visual::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
    background-size: 24px 24px;
  }
  .story-visual-inner {
    position: relative;
    z-index: 2;
  }
  .story-stat {
    display: inline-flex;
    flex-direction: column;
    gap: 0.2rem;
  }
  .story-stat-num {
    font-family: var(--f-head);
    font-size: 2.6rem;
    font-weight: 900;
    color: var(--ab-gold);
    line-height: 1;
  }
  .story-stat-label {
    font-size: 0.78rem;
    color: rgba(255,255,255,0.5);
    letter-spacing: 0.04em;
  }
  .story-stat-divider {
    width: 1px;
    height: 40px;
    background: rgba(255,255,255,0.12);
  }
  .story-shoe-icon {
    font-size: 5rem;
    opacity: 0.08;
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    color: #C8A96E;
  }

  /* ── Values Cards ── */
  .value-card {
    background: var(--ab-white);
    border: 1.5px solid var(--ab-border);
    border-radius: 14px;
    padding: 2rem 1.75rem;
    height: 100%;
    transition: border-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
  }
  .value-card:hover {
    border-color: var(--ab-gold);
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.08);
  }
  .value-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, rgba(200,169,110,0.15), rgba(200,169,110,0.08));
    border: 1.5px solid rgba(200,169,110,0.3);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--ab-gold-dk);
    font-size: 1.2rem;
    margin-bottom: 1.15rem;
  }
  .value-title {
    font-family: var(--f-head);
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--ab-black);
    margin-bottom: 0.6rem;
    letter-spacing: -0.01em;
  }
  .value-desc {
    font-size: 0.875rem;
    line-height: 1.7;
    color: var(--ab-soft);
    margin: 0;
  }

  /* ── Mission Banner ── */
  .mission-banner {
    background: var(--ab-black);
    border-radius: 20px;
    padding: 3.5rem 3rem;
    position: relative;
    overflow: hidden;
  }
  .mission-banner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 60% at 0% 100%, rgba(200,169,110,0.20) 0%, transparent 55%);
  }
  .mission-banner::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(255,255,255,0.045) 1px, transparent 1px);
    background-size: 26px 26px;
  }
  .mission-inner {
    position: relative;
    z-index: 2;
  }
  .mission-quote {
    font-family: var(--f-head);
    font-size: clamp(1.5rem, 2.5vw, 2.2rem);
    font-weight: 900;
    color: #FFFFFF;
    line-height: 1.2;
    letter-spacing: -0.025em;
    margin-bottom: 1.5rem;
  }
  .mission-quote .gold { color: var(--ab-gold); }
  .mission-sub {
    font-size: 0.92rem;
    color: rgba(255,255,255,0.5);
    line-height: 1.75;
    max-width: 500px;
    margin-bottom: 2rem;
  }
  .btn-mission {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 24px;
    background: var(--ab-gold);
    color: var(--ab-black);
    border-radius: 8px;
    font-family: var(--f-head);
    font-size: 0.82rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.2s ease;
  }
  .btn-mission:hover { background: #D4B87A; color: var(--ab-black); transform: translateY(-2px); }

  /* ── Contact Section ── */
  .contact-card {
    background: var(--ab-white);
    border: 1.5px solid var(--ab-border);
    border-radius: 14px;
    padding: 2rem 1.75rem;
    height: 100%;
    transition: border-color 0.25s ease;
  }
  .contact-card:hover { border-color: var(--ab-gold); }
  .contact-icon {
    width: 44px;
    height: 44px;
    background: var(--ab-cream);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--ab-gold-dk);
    font-size: 1.05rem;
    margin-bottom: 1rem;
  }
  .contact-label {
    font-family: var(--f-head);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--ab-muted);
    margin-bottom: 0.3rem;
  }
  .contact-value {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--ab-black);
    text-decoration: none;
  }
  .contact-value:hover { color: var(--ab-gold-dk); }

  /* ── Breadcrumb ── */
  .page-breadcrumb {
    background: var(--ab-cream);
    border-bottom: 1px solid var(--ab-border);
    padding: 0.75rem 0;
  }
  .breadcrumb { margin: 0; font-size: 0.82rem; }
  .breadcrumb-item a { color: var(--ab-gold-dk); text-decoration: none; }
  .breadcrumb-item a:hover { color: var(--ab-black); }
  .breadcrumb-item.active { color: var(--ab-muted); }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="page-breadcrumb">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</div>


<section class="about-hero">
  <div class="container">
    <div class="about-hero-inner">
      <p class="about-eyebrow">Our Story</p>
      <h1 class="about-hero-title">
        Built for Every
        <span class="gold">Step You Take.</span>
      </h1>
      <p class="about-hero-desc">
        SoleMates Footwear was born from a simple belief — that great shoes
        shouldn't cost a fortune. We curate quality footwear for every occasion,
        every lifestyle, and every budget.
      </p>
    </div>
  </div>
</section>


<section class="about-section">
  <div class="container">
    <div class="row align-items-center g-5">

      
      <div class="col-lg-5 order-lg-2">
        <div class="story-visual">
          <i class="fas fa-shoe-prints story-shoe-icon"></i>
          <div class="story-visual-inner">
            <div class="d-flex align-items-center gap-4 flex-wrap">
              <div class="story-stat">
                <span class="story-stat-num">500+</span>
                <span class="story-stat-label">Products available</span>
              </div>
              <div class="story-stat-divider"></div>
              <div class="story-stat">
                <span class="story-stat-num">2K+</span>
                <span class="story-stat-label">Happy customers</span>
              </div>
              <div class="story-stat-divider d-none d-sm-block"></div>
              <div class="story-stat">
                <span class="story-stat-num">100%</span>
                <span class="story-stat-label">Quality checked</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="col-lg-7 order-lg-1">
        <p class="section-kicker">Who We Are</p>
        <h2 class="section-title">
          More Than Just a Shoe Store
        </h2>
        <p class="section-body mb-4">
          Founded in 2024, SoleMates Footwear started as a small passion project
          and grew into a trusted destination for shoe lovers across the country.
          We believe every pair of shoes tells a story — and we want to help you
          write yours.
        </p>
        <p class="section-body">
          From casual sneakers perfect for weekend adventures, to polished dress
          shoes for life's most important moments — we hand-pick every product
          to ensure it meets our standards for comfort, durability, and style.
        </p>

        <div class="d-flex flex-wrap gap-3 mt-4">
          <a href="<?php echo e(route('products.index')); ?>" class="btn btn-dark px-4 py-2" style="font-family:'Montserrat',sans-serif;font-size:0.82rem;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;border-radius:8px;">
            Browse Our Collection
          </a>
          <a href="#contact" class="btn btn-outline-secondary px-4 py-2" style="font-size:0.82rem;font-weight:600;border-radius:8px;">
            Get in Touch
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="about-section about-section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-kicker">What Drives Us</p>
      <h2 class="section-title mx-auto" style="max-width:480px;">
        Our Core Values
      </h2>
      <p class="section-body mx-auto text-center" style="max-width:500px;">
        Everything we do is guided by a commitment to quality, accessibility,
        and genuine care for our customers.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-star" aria-hidden="true"></i></div>
          <h3 class="value-title">Quality First</h3>
          <p class="value-desc">
            Every shoe in our catalog is hand-reviewed for build quality,
            comfort, and longevity before it earns a spot on our shelves.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-tags" aria-hidden="true"></i></div>
          <h3 class="value-title">Fair Pricing</h3>
          <p class="value-desc">
            Premium footwear shouldn't break the bank. We work directly with
            suppliers to offer the best prices without compromising on quality.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-shipping-fast" aria-hidden="true"></i></div>
          <h3 class="value-title">Fast Delivery</h3>
          <p class="value-desc">
            We know you can't wait to wear your new pair. That's why we
            dispatch orders quickly with reliable local shipping partners.
          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="value-card">
          <div class="value-icon"><i class="fas fa-heart" aria-hidden="true"></i></div>
          <h3 class="value-title">Customer Love</h3>
          <p class="value-desc">
            Our customers are at the heart of everything we do. From easy
            returns to responsive support — we're here every step of the way.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="about-section">
  <div class="container">
    <div class="mission-banner">
      <div class="mission-inner">
        <div class="row align-items-center g-4">
          <div class="col-lg-8">
            <p class="about-eyebrow" style="margin-bottom:1rem;">Our Mission</p>
            <p class="mission-quote">
              To make quality footwear
              <span class="gold">accessible to everyone,</span>
              one perfect pair at a time.
            </p>
            <p class="mission-sub">
              We're on a mission to eliminate the compromise between style and
              affordability. Whether you're a sneaker head, a professional, or
              someone who just wants comfortable shoes — SoleMates has your back
              (and your feet).
            </p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="<?php echo e(route('products.index')); ?>" class="btn-mission">
              Shop Now
              <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="contact" class="about-section about-section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-kicker">Reach Out</p>
      <h2 class="section-title">Get In Touch</h2>
      <p class="section-body mx-auto text-center" style="max-width:460px;">
        Have a question about a product, your order, or just want to say hi?
        We'd love to hear from you.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-sm-6 col-lg-3">
        <div class="contact-card text-center">
          <div class="contact-icon mx-auto"><i class="fas fa-envelope" aria-hidden="true"></i></div>
          <p class="contact-label">Email Us</p>
          <a href="mailto:hello@solematesfootwear.com" class="contact-value">
            hello@solematesfootwear.com
          </a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="contact-card text-center">
          <div class="contact-icon mx-auto"><i class="fas fa-phone" aria-hidden="true"></i></div>
          <p class="contact-label">Call Us</p>
          <a href="tel:+639123456789" class="contact-value">
            +63 912 345 6789
          </a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="contact-card text-center">
          <div class="contact-icon mx-auto"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></div>
          <p class="contact-label">Visit Us</p>
          <span class="contact-value" style="cursor:default;">
            Manila, Philippines
          </span>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="contact-card text-center">
          <div class="contact-icon mx-auto"><i class="fas fa-clock" aria-hidden="true"></i></div>
          <p class="contact-label">Business Hours</p>
          <span class="contact-value" style="cursor:default;font-size:0.88rem;">
            Mon–Sat, 9AM–6PM
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
```

The file `about.blade.php` has been created at `resources/views/about.blade.php`. Here's a summary of what's included in the page:

**Structure overview:**

- **`<?php $__env->startSection('head'); ?>`** — Pulls in Montserrat & Inter from Google Fonts, plus all scoped CSS custom properties and component styles.
- **Breadcrumb bar** — Cream-toned strip with a `Home → About Us` trail.
- **Hero section** — Full dark gradient background with dot-grid texture, gold radial glows, an eyebrow label, a large clamp-scaled headline, and a subdued descriptor paragraph.
- **Our Story** — Two-column layout: a stats panel (dark card with 500+, 2K+, 100% figures) on the right, and the brand narrative + CTA buttons on the left.
- **Core Values** — 4-column card grid (Quality First, Fair Pricing, Fast Delivery, Customer Love), each with a gold-tinted icon box and hover lift effect, on a cream background.
- **Mission Banner** — Full-width dark card with dot-grid texture, a large pull-quote with a gold accent span, supporting copy, and a gold "Shop Now" CTA button.
- **Contact section** — 4 cards (Email, Phone, Location, Hours), each with a cream icon tile, label, and value, on the cream background.

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/about.blade.php ENDPATH**/ ?>