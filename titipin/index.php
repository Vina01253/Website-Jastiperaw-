<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Titipin — Jasa Titip Luar Negeri</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<nav id="mainNav">
  <div class="logo">Titipin<span>.</span></div>
  <ul class="nav-links">
    <li><a href="#how">Cara Kerja</a></li>
    <li><a href="#katalog">Katalog</a></li>
    <li><a href="#fitur">Fitur</a></li>
    <li><a href="request.php">Request</a></li>
    <li><a href="login.php" onclick="openModal('login')">Login</a></li>
    <li><a href="register.php" class="btn-nav" onclick="openModal('register')">Daftar Sekarang</a></li>
  </ul>
  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-content">
    <div class="hero-badge">✦ Jasa Titip Makeup Luar Negeri Terpercaya</div>
    <h1><em>Titipin Aja!</em> Produk Luar Negeri Impian Kamu <em>Don't Worry, Just Titipin</em></h1>
    <p>Platform jastip terpercaya untuk skincare & makeup luar negeri. Pemesanan mudah, harga transparan, tracking real-time.</p>
    <div class="hero-cta">
      <a href="#katalog" class="btn btn-primary">🛍️ Shop Now</a>
      <a href="#how" class="btn btn-outline">Cara Kerja →</a>
    </div>

  </div>
  <div class="hero-visual">
    <div class="hero-card-stack">
      <div class="hero-card hcard-1">
        <a href="#"><img src="images/romand jiucy.jpg" class="hcard-img" alt=""></a>
        <div class="hcard-brand">Roma&nd • Korea</div>
        <div class="hcard-name">Juicy Lasting Lip Tint</div>
        <div class="hcard-price">Rp 150.000</div>
        <span class="hcard-badge">⭐ Bestseller</span>
      </div>
      <div class="hero-card hcard-2">
        <a href="#"><img src="images/strawberry cupid palette.jpg" class="hcard-img" alt=""></a>
        <div class="hcard-brand">Flower Knows • China</div>
        <div class="hcard-name">Strawberry Cupid Makeup Palette</div>
        <div class="hcard-price">Rp 390.000</div>
        <span class="hcard-badge">🔥 Trending</span>
      </div>
      <div class="hero-card hcard-3">
    <div class="hcard-img">
      <a href="#"><img src="images/rhode-peptide-lip.jpg" class="hcard-img" alt=""></a>
    </div>
    <div class="hcard-brand">RHODE • USA</div>
    <div class="hcard-name">Peptide Lip Tint</div>
    <div class="hcard-price">Rp 230.000</div>
    <span class="hcard-badge">🆕 New Arrival</span>
</div>
    </div>
  </div>
</section>

<!-- CARA KERJA -->
<section class="how" id="how">
  <div class="section-label">Cara Kerja</div>
  <div class="section-title">Mudah & <em>Transparan</em></div>
  <p class="section-sub">Dari pemesanan hingga produk sampai di tangan kamu, semua terpantau dengan jelas.</p>
  <div class="steps-grid">
    <div class="step-card">
      <div class="step-num">1</div>
      <div class="step-icon">📋</div>
      <h3>Pilih / Request Produk</h3>
      <p>Pilih dari katalog atau request produk custom dengan memasukkan link dari toko luar negeri.</p>
    </div>
    <div class="step-card">
      <div class="step-num">2</div>
      <div class="step-icon">💳</div>
      <h3>Bayar DP / Lunas</h3>
      <p>Sistem DP untuk mengamankan pesanan atau langsung melakukan pembayaran lunas.</p>
    </div>
    <div class="step-card">
      <div class="step-num">3</div>
      <div class="step-icon">🌍</div>
      <h3>Jastiper Belikan</h3>
      <p>Jastiper kami yang terpercaya akan membantu membelikan produk dari negara asal sesuai pesanan kamu.</p>
    </div>
  </div>
</section>

<!-- KATALOG -->
<section class="katalog" id="katalog">
  <div class="katalog-header">
    <div>
      <div class="section-label">Katalog Produk</div>
      <div class="section-title">Produk Pilihan Luar Negeri</div>
    </div>
    <a href="request.php" class="btn btn-primary">+ Request Produk</a>
  </div>
  <div class="filter-bar">
    <button class="filter-btn active" onclick="filterProduct(this,'semua')">Semua</button>
    <button class="filter-btn" onclick="filterProduct(this,'korea')">Korea 🇰🇷</button>
    <button class="filter-btn" onclick="filterProduct(this,'us')">USA 🇺🇸</button>
    <button class="filter-btn" onclick="filterProduct(this,'uk')">China 🇨🇳</button>
    <button class="filter-btn" onclick="filterProduct(this,'japan')">Japan 🇯🇵</button>
  </div>
  <div class="products-grid" id="productsGrid">
    <!-- Products injected by JS -->
  </div>
</section>

<!-- REQUEST PRODUK -->
<section class="request-section" id="request">
  <div class="request-box">
    <div class="request-info">
      <div class="section-label">Titip Custom</div>
      <h3>Produk Tidak Ada di Katalog? <em> Tenang, Request Aja!</em></h3>
      <p>Masukkan link produk dari website luar negeri manapun dan kami akan bantu membelikannya untuk kamu.</p>
      <div class="request-perks">
        <div class="perk"><div class="perk-icon">🔗</div><p>Input link produk dari website manapun</p></div>
        <div class="perk"><div class="perk-icon">💬</div><p>Konsultasi langsung via fitur chat</p></div>
        <div class="perk"><div class="perk-icon">✅</div><p>Jastiper terpercaya & terverifikasi</p></div>
        <div class="perk"><div class="perk-icon">🛡️</div><p>Sistem DP untuk keamanan transaksi</p></div>
      </div>
    </div>
    <div class="request-form">
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" placeholder="Cth: LANEIGE Lip Sleeping Mask"/>
      </div>
      <div class="form-group">
        <label>Link Produk</label>
        <input type="url" placeholder="https://www.sephora.com/product/..."/>
      </div>
      <div class="form-group">
        <label>Negara Asal</label>
        <select>
          <option>Korea Selatan 🇰🇷</option>
          <option>Amerika Serikat 🇺🇸</option>
          <option>Inggris 🇬🇧</option>
          <option>Jepang 🇯🇵</option>
          <option>Prancis 🇫🇷</option>
          <option>Australia 🇦🇺</option>
        </select>
      </div>
      <div class="form-group">
        <label>Catatan Tambahan</label>
        <textarea placeholder="Warna, ukuran, atau catatan khusus..."></textarea>
      </div>
      <button class="btn btn-primary" onclick="showToast('Request berhasil dikirim! Tim kami akan menghubungi kamu segera. 📩')">Kirim Request</button>
    </div>
  </div>
</section>



<!-- FITUR -->
<section class="features" id="fitur">
  <div class="features-header">
    <div class="section-label">Fitur Platform</div>
    <div class="section-title">Semua yang Kamu <em>Butuhkan</em></div>
    <p class="section-sub">Platform lengkap dengan fitur-fitur yang dirancang untuk kenyamanan dan keamanan transaksi jastip.</p>
  </div>
  <div class="features-grid">
    <div class="feat-card">
      <div class="feat-icon">🔐</div>
      <h3>Login & Manajemen Akun</h3>
      <p>Buat akun, kelola profil, dan akses fitur sesuai role — User, Jastiper, atau Admin. Sistem aman dan terstruktur.</p>
      <span class="feat-tag">Keamanan</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">🛍️</div>
      <h3>Katalog Produk Terorganisir</h3>
      <p>Jelajahi ribuan produk skincare & makeup dari luar negeri dengan filter kategori, brand, dan harga.</p>
      <span class="feat-tag">Katalog</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">📝</div>
      <h3>Request Produk Custom</h3>
      <p>Produk tidak ada di katalog? Ajukan request dengan memasukkan link dari website manapun.</p>
      <span class="feat-tag">Fleksibilitas</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">💳</div>
      <h3>Sistem Pembayaran & DP</h3>
      <p>Bayar DP untuk mengamankan pesanan. Upload bukti pembayaran dan verifikasi oleh admin.</p>
      <span class="feat-tag">Transaksi</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">⭐</div>
      <h3>Review & Rating</h3>
      <p>Baca ulasan dari pembeli lain dan berikan penilaian setelah menerima produk. Bangun kepercayaan bersama.</p>
      <span class="feat-tag">Kepercayaan</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">💬</div>
      <h3>Fitur Chat Langsung</h3>
      <p>Tanya langsung ke admin atau jastiper jika ada pertanyaan. Respon cepat dan ramah.</p>
      <span class="feat-tag">Komunikasi</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">🔍</div>
      <h3>Pencarian & Filter Cerdas</h3>
      <p>Temukan produk lebih cepat dengan fitur pencarian berdasarkan kata kunci, kategori, atau harga.</p>
      <span class="feat-tag">Kemudahan</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">📊</div>
      <h3>Dashboard & Riwayat</h3>
      <p>Kelola semua pesanan, transaksi, dan data dalam satu dashboard yang intuitif dan lengkap.</p>
      <span class="feat-tag">Dashboard</span>
    </div>
    <div class="feat-card">
      <div class="feat-icon">🌐</div>
      <h3>Multi-Negara</h3>
      <p>Titip dari Korea, USA, UK, Jepang, Prancis, dan banyak negara lainnya dalam satu platform.</p>
      <span class="feat-tag">Global</span>
    </div>
  </div>
</section>

<!-- REVIEW -->
<section class="reviews" id="reviews">
  <div class="section-label">Testimoni</div>
  <div class="section-title">Kata Mereka <em>yang Sudah Merasakan</em></div>
  <div class="reviews-grid">
    <div class="review-card">
      <div class="review-header">
        <div class="review-avatar">R</div>
        <div class="review-meta"><h4>Rina Amalia</h4><span>Surabaya · 3 hari lalu</span></div>
      </div>
      <div class="review-stars">★★★★★</div>
      <p class="review-text">Pertama kali coba jastip via Titipin dan langsung impressed! Harga transparan banget, nggak ada biaya surprise. Tracking-nya juga update terus jadi tenang nunggunya.</p>
      <span class="review-product">LANEIGE Lip Mask · Korea 🇰🇷</span>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-avatar" style="background:linear-gradient(135deg,#9c27b0,#673ab7)">D</div>
        <div class="review-meta"><h4>Dina Kusuma</h4><span>Jakarta · 1 minggu lalu</span></div>
      </div>
      <div class="review-stars">★★★★★</div>
      <p class="review-text">Fitur request produk-nya TOP banget! Saya minta produk yang memang nggak ada di katalog dan jastiper langsung cari. Prosesnya cepat dan komunikatif.</p>
      <span class="review-product">Charlotte Tilbury · UK 🇬🇧</span>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-avatar" style="background:linear-gradient(135deg,#00897b,#00695c)">S</div>
        <div class="review-meta"><h4>Sarah Putri</h4><span>Bandung · 2 minggu lalu</span></div>
      </div>
      <div class="review-stars">★★★★☆</div>
      <p class="review-text">Udah pesan 4x dan selalu memuaskan. Sistem DP-nya bikin aman, nggak takut ditipu. Barang selalu original dan terpercaya. Highly recommend!</p>
      <span class="review-product">NARS Cosmetics · USA 🇺🇸</span>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-avatar" style="background:linear-gradient(135deg,#f57c00,#e65100)">A</div>
        <div class="review-meta"><h4>Ayu Nandita</h4><span>Malang · 3 minggu lalu</span></div>
      </div>
      <div class="review-stars">★★★★★</div>
      <p class="review-text">Kalkulator harganya helpful banget! Jadi nggak kaget waktu bayar karena udah tahu dari awal total yang harus dikeluarkan. Platform yang sangat jujur!</p>
      <span class="review-product">Sulwhasoo · Korea 🇰🇷</span>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-avatar" style="background:linear-gradient(135deg,#1976d2,#1565c0)">F</div>
        <div class="review-meta"><h4>Fitri Handayani</h4><span>Yogyakarta · 1 bulan lalu</span></div>
      </div>
      <div class="review-stars">★★★★★</div>
      <p class="review-text">Chat dengan admin super responsif! Ada kendala soal bea cukai dan langsung dibantu dengan solusi yang jelas. Customer service terbaik!</p>
      <span class="review-product">Shiseido · Japan 🇯🇵</span>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="review-avatar" style="background:linear-gradient(135deg,#388e3c,#2e7d32)">M</div>
        <div class="review-meta"><h4>Maya Sari</h4><span>Semarang · 1 bulan lalu</span></div>
      </div>
      <div class="review-stars">★★★★★</div>
      <p class="review-text">Finally ada platform jastip yang beneran aman! Semua terverifikasi, ada tracking, ada review. Nggak perlu khawatir ditipu lagi kayak pengalaman sebelumnya.</p>
      <span class="review-product">Tatcha · Japan 🇯🇵</span>
    </div>
  </div>
</section>

<!-- CHAT -->
<section class="chat-section" id="chat">
  <div style="text-align:center">
    <div class="section-label">Live Chat</div>
    <div class="section-title">Ada Pertanyaan? <em>Chat Kami!</em></div>
    <p class="section-sub" style="margin:0 auto">Tim kami siap membantu kamu 24/7. Tanyakan apa saja tentang produk, pesanan, atau jasa titip kami.</p>
  </div>
  <div class="chat-box">
    <div class="chat-header">
      <div class="chat-avatar">👩‍💼</div>
      <div class="chat-header-info">
        <h4>Titipin Support</h4>
        <span>Online · Biasanya balas dalam 5 menit</span>
      </div>
      <div style="margin-left:auto"><div class="chat-online"></div></div>
    </div>
    <div class="chat-messages" id="chatMessages">
      <div class="msg admin">
        <div class="msg-bubble">Halo! 👋 Selamat datang di Titipin. Ada yang bisa kami bantu?</div>
        <div class="msg-time">10:00</div>
      </div>
      <div class="msg user">
        <div class="msg-bubble">Halo kak, saya mau tanya soal request produk custom 🙏</div>
        <div class="msg-time">10:02</div>
      </div>
      <div class="msg admin">
        <div class="msg-bubble">Tentu! Kamu bisa request produk dari website luar negeri manapun. Cukup share link produknya dan kami bantu carikan 😊</div>
        <div class="msg-time">10:03</div>
      </div>
    </div>
    <div class="chat-input-bar">
      <input type="text" id="chatInput" placeholder="Ketik pesan..." onkeydown="if(event.key==='Enter')sendChat()"/>
      <button class="chat-send" onclick="sendChat()">➤</button>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <h2>Siap Titip Produk <em>Impianmu?</em></h2>
  <p>Bergabung dengan ribuan pelanggan puas yang sudah mempercayai Titipin. Daftar gratis sekarang!</p>
  <div class="cta-btns">
    <button class="btn btn-white" onclick="openModal('register')">🚀 Daftar Gratis Sekarang</button>
    <a href="#katalog" class="btn btn-ghost">Lihat Katalog →</a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="logo">Titipin</div>
      <p>Platform jasa titip produk luar negeri terpercaya. Skincare & makeup impianmu, kami yang carikan.</p>
      <div class="social-links">
        <div class="social-icon">📱</div>
        <div class="social-icon">📸</div>
        <div class="social-icon">💬</div>
        <div class="social-icon">🐦</div>
      </div>
    </div>
    <div class="footer-col">
      <h4>Platform</h4>
      <ul>
        <li><a href="#">Cara Kerja</a></li>
        <li><a href="#">Katalog Produk</a></li>
        <li><a href="#">Request Custom</a></li>
        <li><a href="#">Tracking Pesanan</a></li>
        <li><a href="#">Kalkulator Harga</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Jastiper</h4>
      <ul>
        <li><a href="#">Daftar Jadi Jastiper</a></li>
        <li><a href="#">Dashboard Jastiper</a></li>
        <li><a href="#">Panduan Jastiper</a></li>
        <li><a href="#">Syarat & Ketentuan</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Bantuan</h4>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Hubungi Kami</a></li>
        <li><a href="#">Kebijakan Privasi</a></li>
        <li><a href="#">Ketentuan Layanan</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-divider"></div>
  <div class="footer-bottom">
    <span>© 2025 Titipin · Sistem Penyedia Jasa Titip Luar Negeri</span>
    <span>Dibuat oleh <a href="#">Vina Nailul Jazilah</a> · NPM 13.2024.1.01253</span>
  </div>
</footer>

<!-- MODAL LOGIN/REGISTER -->

    <div id="loginForm">
      <div class="form-group"><label>Email</label><input type="email" placeholder="email@kamu.com"/></div>
      <div class="form-group"><label>Password</label><input type="password" placeholder="••••••••"/></div>
      <button class="btn btn-primary" style="width:100%;margin-top:1rem" onclick="showToast('Login berhasil! Selamat datang kembali 👋');closeModal()">Masuk</button>
      <p style="text-align:center;font-size:.82rem;color:var(--muted);margin-top:.8rem"><a href="#" style="color:var(--pink-hot)">Lupa password?</a></p>
    </div>
    
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast"><span class="toast-icon">✅</span><span id="toastMsg">Berhasil!</span></div>

<script>
  // NAV SCROLL
  window.addEventListener('scroll', () => {
    document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 30);
  });

  // HAMBURGER
  function toggleMenu() {
    const ul = document.querySelector('.nav-links');
    ul.style.display = ul.style.display === 'flex' ? 'none' : 'flex';
    ul.style.flexDirection = 'column';
    ul.style.position = 'absolute';
    ul.style.top = '68px'; ul.style.left = '0'; ul.style.right = '0';
    ul.style.background = 'white'; ul.style.padding = '1rem 5%';
    ul.style.boxShadow = '0 4px 20px rgba(0,0,0,.1)';
  }

  // PRODUCTS DATA
  const products = [
    { name: '2-in-1 Highlight Contour Pallete', brand: 'Judydoll', price: 'Rp 199.000', country: '🇰🇷 Korea', cat: 'skincare korea', img: 'images/Judydoll-2in1.jpg', emoji: '💄', rating: 4.9, reviews: 128 },
    { name: 'Pillow Talk Lipstick', brand: 'Charlotte Tilbury', price: 'Rp 520.000', country: '🇬🇧 UK', cat: 'makeup uk', emoji: '💄', rating: 4.8, reviews: 96 },
    { name: 'Sheer Glow Foundation', brand: 'NARS', price: 'Rp 710.000', country: '🇺🇸 USA', cat: 'makeup us', emoji: '✨', rating: 4.7, reviews: 83 },
    { name: 'First Care Serum', brand: 'Sulwhasoo', price: 'Rp 890.000', country: '🇰🇷 Korea', cat: 'skincare korea', emoji: '🌿', rating: 4.9, reviews: 215 },
    { name: 'Dewy Sun Stick', brand: 'Beauty of Joseon', price: 'Rp 280.000', country: '🇰🇷 Korea', cat: 'skincare korea', emoji: '☀️', rating: 4.8, reviews: 301 },
    { name: 'Lip Sleeping Mask', brand: 'LANEIGE', price: 'Rp 320.000', country: '🇰🇷 Korea', cat: 'skincare korea', emoji: '🌸', rating: 4.9, reviews: 412 },
    { name: 'Soft Matte Foundation', brand: 'NYX', price: 'Rp 310.000', country: '🇺🇸 USA', cat: 'makeup us', emoji: '🪞', rating: 4.5, reviews: 67 },
    { name: 'Skin Tint SPF 30', brand: 'Tatcha', price: 'Rp 780.000', country: '🇯🇵 Japan', cat: 'skincare japan', emoji: '🌺', rating: 4.8, reviews: 54 },
  ];

  function renderProducts(filter='semua') {
    const grid = document.getElementById('productsGrid');
    const filtered = filter === 'semua' ? products : products.filter(p => p.cat.includes(filter));
    grid.innerHTML = filtered.map(p => `
      <div class="product-card">
       <div class="product-img">
      <img src="${p.image}" alt="${p.name}">
      </div>
        <div class="product-info">
          <div class="product-brand">${p.brand}</div>
          <div class="product-name">${p.name}</div>
          <div class="product-price">${p.price}</div>
          <div class="product-rating"><span class="stars">★</span>${p.rating} (${p.reviews} ulasan)</div>
          <button class="btn-pesan" onclick="showToast('${p.name} ditambahkan ke keranjang! 🛍️')">Pesan Sekarang</button>
        </div>
      </div>
    `).join('');
  }
  renderProducts();

  function filterProduct(btn, cat) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    renderProducts(cat);
  }



  // MODAL
  function openModal(tab) {
    document.getElementById('authModal').classList.add('open');
    switchTab(tab, document.querySelectorAll('.modal-tab')[tab==='register'?1:0]);
  }
  function closeModal() { document.getElementById('authModal').classList.remove('open'); }
  function closeModalOutside(e) { if (e.target.id === 'authModal') closeModal(); }
  function switchTab(tab, btn) {
    document.querySelectorAll('.modal-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('loginForm').style.display = tab === 'login' ? 'block' : 'none';
    document.getElementById('registerForm').style.display = tab === 'register' ? 'block' : 'none';
    document.getElementById('modalTitle').innerHTML = tab === 'login' ? 'Masuk ke <em style="color:var(--pink-hot);font-style:italic">Titipin</em>' : 'Daftar ke <em style="color:var(--pink-hot);font-style:italic">Titipin</em>';
  }

  // TOAST
  function showToast(msg) {
    const t = document.getElementById('toast');
    document.getElementById('toastMsg').textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3500);
  }

  // CHAT
  function sendChat() {
    const inp = document.getElementById('chatInput');
    const msg = inp.value.trim(); if (!msg) return;
    const box = document.getElementById('chatMessages');
    const now = new Date().toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'});
    box.innerHTML += `<div class="msg user"><div class="msg-bubble">${msg}</div><div class="msg-time">${now}</div></div>`;
    inp.value = '';
    box.scrollTop = box.scrollHeight;
    setTimeout(() => {
      const replies = ['Terima kasih sudah menghubungi kami! 😊 Kami akan segera membantu.', 'Baik, kami catat ya! Ada lagi yang bisa kami bantu?', 'Informasi lengkap bisa kamu cek di halaman FAQ kami 📋', 'Silakan tunggu, kami cek terlebih dahulu 🔍'];
      box.innerHTML += `<div class="msg admin"><div class="msg-bubble">${replies[Math.floor(Math.random()*replies.length)]}</div><div class="msg-time">${new Date().toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'})}</div></div>`;
      box.scrollTop = box.scrollHeight;
    }, 1000);
  }
</script>
</body>
</html>
