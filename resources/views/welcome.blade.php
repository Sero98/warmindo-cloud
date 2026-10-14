<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warmindo Suka-Suka</title>
    <style>
        :root {
            --bg: #fffaf1;
            --panel: rgba(255, 255, 255, 0.9);
            --card: #ffffff;
            --primary: #ffb703;
            --primary-dark: #f59e0b;
            --secondary: #7c2d12;
            --text: #1f2937;
            --muted: #6b7280;
            --line: rgba(148, 163, 184, 0.2);
            --success: #16a34a;
            --shadow: 0 20px 45px rgba(120, 53, 15, 0.12);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 183, 3, 0.18), transparent 24%),
                radial-gradient(circle at bottom right, rgba(124, 45, 18, 0.12), transparent 28%),
                var(--bg);
            color: var(--text);
        }

        .page-shell {
            max-width: 1180px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 26px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), #ffd166);
            box-shadow: inset 0 2px 8px rgba(255,255,255,0.4);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 0.95rem;
            color: var(--muted);
        }

        .nav a {
            text-decoration: none;
            color: inherit;
            font-weight: 600;
        }

        .nav .cta {
            background: var(--secondary);
            color: white;
            border-radius: 999px;
            padding: 10px 18px;
            box-shadow: 0 10px 20px rgba(124, 45, 18, 0.2);
        }

        .hero {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 28px;
            align-items: center;
            padding: 36px 0 22px;
        }

        .hero-copy {
            padding: 20px 10px 20px 4px;
        }

        .tag {
            display: inline-block;
            background: rgba(255, 183, 3, 0.12);
            color: #9a5b00;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 8px 14px;
            border-radius: 999px;
            border: 1px solid rgba(255, 183, 3, 0.2);
        }

        h1 {
            margin: 20px 0 16px;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            line-height: 1.05;
            letter-spacing: -0.06em;
        }

        .accent {
            color: var(--secondary);
        }

        .hero-copy p {
            margin: 0 0 26px;
            max-width: 540px;
            color: var(--muted);
            font-size: 1.03rem;
            line-height: 1.7;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .button-primary,
        .button-secondary {
            text-decoration: none;
            border-radius: 999px;
            padding: 15px 24px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .button-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #2b1b07;
            box-shadow: 0 16px 28px rgba(245, 158, 11, 0.28);
        }

        .button-secondary {
            background: white;
            color: var(--text);
            border: 1px solid var(--line);
        }

        .button-primary:hover, .button-secondary:hover {
            transform: translateY(-2px);
        }

        .hero-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(255, 248, 236, 0.95));
            border: 1px solid rgba(255, 183, 3, 0.2);
            border-radius: 28px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .dish-visual {
            background: linear-gradient(135deg, rgba(255, 183, 3, 0.16), rgba(124, 45, 18, 0.08));
            border-radius: 22px;
            padding: 18px;
            position: relative;
            overflow: hidden;
            min-height: 320px;
        }

        .dish-plate {
            position: absolute;
            inset: auto 35px 28px 35px;
            height: 150px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #fff, #f3f4f6 55%, #e5e7eb 100%);
            box-shadow: 0 18px 30px rgba(15, 23, 42, 0.12);
        }

        .dish-plate::before,
        .dish-plate::after {
            content: "";
            position: absolute;
            border-radius: 50%;
        }

        .dish-plate::before {
            inset: 18px 18px auto 18px;
            height: 68px;
            background: linear-gradient(135deg, #fca5a5, #f97316);
            border: 10px solid #fef3c7;
        }

        .dish-plate::after {
            width: 110px;
            height: 110px;
            left: 50%;
            top: 18px;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #facc15, #f59e0b);
            border: 10px solid rgba(255,255,255,0.8);
        }

        .float-badge {
            position: absolute;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.95);
            border-radius: 999px;
            padding: 10px 14px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
            font-size: 0.82rem;
            font-weight: 700;
        }

        .badge-top { top: 20px; right: 22px; }
        .badge-bottom { bottom: 26px; left: 22px; }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(110px, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .stat {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 14px 16px;
        }

        .stat strong {
            display: block;
            font-size: 1.35rem;
            margin-bottom: 4px;
        }

        .stat span {
            color: var(--muted);
            font-size: 0.8rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 26px;
            margin-top: 28px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 26px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 24px 16px;
        }

        .panel-header h2 {
            margin: 0;
            font-size: 1.8rem;
        }

        .panel-header span {
            color: var(--muted);
            font-weight: 600;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 18px;
            padding: 0 24px 24px;
        }

        .menu-card {
            position: relative;
            background: linear-gradient(180deg, #fff, #fffaf6);
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 18px 18px 16px;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.04);
        }

        .menu-card .emoji {
            font-size: 2.2rem;
            margin-bottom: 10px;
            display: inline-block;
        }

        .menu-card h3 {
            margin: 0 0 8px;
            font-size: 1.05rem;
        }

        .menu-card p {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-top: 1px solid rgba(148, 163, 184, 0.18);
            padding-top: 12px;
        }

        .price {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--secondary);
        }

        .chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 80px;
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 0.72rem;
            font-weight: 700;
            background: rgba(22, 163, 74, 0.1);
            color: var(--success);
        }

        .menu-card .card-bottom {
            flex-wrap: wrap;
        }

        .quantity-control {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 4px;
            background: white;
        }

        .quantity-control button {
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 50%;
            background: rgba(255, 183, 3, 0.18);
            color: var(--secondary);
            font: inherit;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
        }

        .quantity-control button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .quantity-value {
            min-width: 18px;
            text-align: center;
            font-weight: 700;
        }

        .selection-hint {
            margin: -8px 0 0;
            color: var(--muted);
            font-size: 0.82rem;
        }

        .order-summary {
            border: 1px solid rgba(255, 183, 3, 0.35);
            border-radius: 16px;
            background: rgba(255, 183, 3, 0.08);
            padding: 14px 16px;
        }

        .order-summary strong {
            display: block;
            margin-bottom: 6px;
            color: var(--secondary);
        }

        .order-summary p {
            margin: 0;
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .form-panel {
            padding: 24px;
        }

        .form-panel h2 {
            margin: 0 0 12px;
            font-size: 1.8rem;
        }

        .form-panel p {
            margin: 0 0 22px;
            color: var(--muted);
            line-height: 1.6;
        }

        form {
            display: grid;
            gap: 18px;
        }

        .field {
            display: grid;
            gap: 8px;
        }

        label {
            font-weight: 700;
            font-size: 0.9rem;
        }

        input[type="text"] {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(148, 163, 184, 0.4);
            background: rgba(255,255,255,0.8);
            min-height: 52px;
            padding: 0 16px;
            font: inherit;
            color: var(--text);
            outline: none;
        }

        input[type="text"]:focus {
            border-color: rgba(255, 183, 3, 0.8);
            box-shadow: 0 0 0 4px rgba(255, 183, 3, 0.12);
        }

        button[type="submit"] {
            border: none;
            cursor: pointer;
            border-radius: 14px;
            min-height: 54px;
            font: inherit;
            font-weight: 800;
            background: linear-gradient(135deg, var(--secondary), #a94818);
            color: white;
            box-shadow: 0 16px 26px rgba(124, 45, 18, 0.2);
        }

        .mini-info {
            margin-top: 18px;
            display: grid;
            gap: 12px;
        }

        .mini-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            background: rgba(255,255,255,0.72);
            border: 1px solid var(--line);
            border-radius: 14px;
        }

        .mini-item .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary);
            box-shadow: 0 0 0 6px rgba(255, 183, 3, 0.14);
        }

        .mini-item span {
            color: var(--muted);
            font-size: 0.88rem;
        }

        footer {
            background: linear-gradient(135deg, #1f2937, #111827);
            border-radius: 28px;
            margin-top: 34px;
            padding: 34px 26px 28px;
            color: white;
            box-shadow: 0 16px 30px rgba(17, 24, 39, 0.18);
        }

        .footer-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .footer-head h3 {
            margin: 0;
            font-size: 1.5rem;
        }

        .tag-footer {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 999px;
            padding: 8px 14px;
            color: #fef3c7;
            font-size: 0.76rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .team-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 12px 18px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .team-list li {
            padding: 12px 14px;
            border-radius: 14px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.05);
            line-height: 1.6;
            color: rgba(255,255,255,0.82);
        }

        @media (max-width: 900px) {
            .hero,
            .content-grid {
                grid-template-columns: 1fr;
            }

            .nav {
                display: none;
            }

            .menu-grid,
            .team-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .page-shell {
                padding-left: 14px;
                padding-right: 14px;
            }

            .topbar {
                padding: 14px 16px;
            }

            .hero {
                padding-top: 20px;
            }

            h1 {
                font-size: 2.5rem;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <header class="topbar">
            <div class="brand">
                <div class="brand-mark">🍜</div>
                Warmindo Suka-Suka
            </div>
            <nav class="nav" aria-label="Navigasi utama">
                <a href="#menu">Menu</a>
                <a href="#pesan">Pesan</a>
                <a href="#team">Tim</a>
                <a class="cta" href="#pesan">Order Now</a>
            </nav>
        </header>

        <section class="hero">
            <div class="hero-copy">
                <span class="tag">Fresh • Fast • Tasty</span>
                <h1>Nikmati <span class="accent">mie favorit</span> dengan rasa yang bikin nagih.</h1>
                <p>Tempat nongkrong asik dengan sajian Indomie kekinian, diolah dengan rasa yang gurih, pedas, dan bikin ketagihan. Pesanan online kami siap hadir cepat.</p>

                <div class="hero-actions">
                    <a href="#menu" class="button-primary">Lihat Menu</a>
                    <a href="#pesan" class="button-secondary">Pesan Sekarang</a>
                </div>


            </div>

            <div class="hero-card" aria-label="Ilustrasi menu favorit">
                <div class="dish-visual">
                    <div class="float-badge badge-top">🔥 Best Seller</div>
                    <div class="float-badge badge-bottom">Rp 15.000</div>
                    <div class="dish-plate"></div>
                </div>
            </div>
        </section>

        <section class="content-grid">
            <div class="panel" id="menu">
                <div class="panel-header">
                    <h2>Daftar Menu</h2>
                    <span>5 pilihan favorit</span>
                </div>

                <div class="menu-grid">
                    <article class="menu-card" data-menu-name="Indomie Goreng Telur Kornet" data-menu-price="15000">
                        <div class="emoji">🍜</div>
                        <h3>Indomie Goreng Telur Kornet</h3>
                        <p>Gurih, bertekstur lembut, dan cocok untuk camilan sambil nongkrong.</p>
                        <div class="card-bottom">
                            <span class="price">Rp 15.000</span>
                            <div class="quantity-control" aria-label="Jumlah Indomie Goreng Telur Kornet">
                                <button type="button" data-quantity-change="-1" aria-label="Kurangi Indomie Goreng Telur Kornet" disabled>-</button>
                                <span class="quantity-value" aria-live="polite">0</span>
                                <button type="button" data-quantity-change="1" aria-label="Tambah Indomie Goreng Telur Kornet">+</button>
                            </div>
                        </div>
                    </article>

                    <article class="menu-card" data-menu-name="Indomie Rebus Spesial" data-menu-price="12000">
                        <div class="emoji">🥘</div>
                        <h3>Indomie Rebus Spesial</h3>
                        <p>Lezat dengan kuah hangat dan isian protein yang membuat makan makin puas.</p>
                        <div class="card-bottom">
                            <span class="price">Rp 12.000</span>
                            <div class="quantity-control" aria-label="Jumlah Indomie Rebus Spesial">
                                <button type="button" data-quantity-change="-1" aria-label="Kurangi Indomie Rebus Spesial" disabled>-</button>
                                <span class="quantity-value" aria-live="polite">0</span>
                                <button type="button" data-quantity-change="1" aria-label="Tambah Indomie Rebus Spesial">+</button>
                            </div>
                        </div>
                    </article>

                    <article class="menu-card" data-menu-name="Magelangan" data-menu-price="14000">
                        <div class="emoji">🍲</div>
                        <h3>Magelangan</h3>
                        <p>Campuran mie goreng dan nasi yang bikin rasa lebih kaya dan mengenyangkan.</p>
                        <div class="card-bottom">
                            <span class="price">Rp 14.000</span>
                            <div class="quantity-control" aria-label="Jumlah Magelangan">
                                <button type="button" data-quantity-change="-1" aria-label="Kurangi Magelangan" disabled>-</button>
                                <span class="quantity-value" aria-live="polite">0</span>
                                <button type="button" data-quantity-change="1" aria-label="Tambah Magelangan">+</button>
                            </div>
                        </div>
                    </article>

                    <article class="menu-card" data-menu-name="Es Teh Manis" data-menu-price="5000">
                        <div class="emoji">🥤</div>
                        <h3>Es Teh Manis</h3>
                        <p>Minuman segar dengan rasa manis yang pas untuk menemani santapan.</p>
                        <div class="card-bottom">
                            <span class="price">Rp 5.000</span>
                            <div class="quantity-control" aria-label="Jumlah Es Teh Manis">
                                <button type="button" data-quantity-change="-1" aria-label="Kurangi Es Teh Manis" disabled>-</button>
                                <span class="quantity-value" aria-live="polite">0</span>
                                <button type="button" data-quantity-change="1" aria-label="Tambah Es Teh Manis">+</button>
                            </div>
                        </div>
                    </article>

                    <article class="menu-card" data-menu-name="Nutrisari Jeruk Peras" data-menu-price="5000">
                        <div class="emoji">🍋</div>
                        <h3>Nutrisari Jeruk Peras</h3>
                        <p>Rasa citrus yang menyegarkan, pas untuk menambah semangat hari Anda.</p>
                        <div class="card-bottom">
                            <span class="price">Rp 5.000</span>
                            <div class="quantity-control" aria-label="Jumlah Nutrisari Jeruk Peras">
                                <button type="button" data-quantity-change="-1" aria-label="Kurangi Nutrisari Jeruk Peras" disabled>-</button>
                                <span class="quantity-value" aria-live="polite">0</span>
                                <button type="button" data-quantity-change="1" aria-label="Tambah Nutrisari Jeruk Peras">+</button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <aside class="panel form-panel" id="pesan">
                <h2>Formulir Pesanan</h2>
                <p>Isi data berikut untuk melanjutkan pesanan Anda. Tim kami siap memproses dengan cepat.</p>

                @if(session('sukses'))
                    <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 15px;">
                        {{ session('sukses') }}
                    </div>
                @endif

                <form action="/pesan" method="POST">
                    @csrf
                    <div class="field">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="field">
                        <label for="pesanan">Detail Pesanan</label>
                        <input type="text" id="pesanan" name="pesanan" placeholder="Pilih menu dari daftar di sebelah" required>
                        <span class="selection-hint">Atur jumlah menu dengan tombol + dan − di setiap kartu menu.</span>
                    </div>

                    <div class="order-summary" aria-live="polite">
                        <strong>Ringkasan Pesanan</strong>
                        <p id="ringkasan-pesanan">Belum ada menu yang dipilih.</p>
                    </div>

                    <div class="field">
                        <label for="keterangan">Keterangan Tambahan</label>
                        <input type="text" id="keterangan" name="keterangan" placeholder="Contoh: Pedas, Telur Setengah Matang">
                    </div>

                    <button type="submit">Kirim Pesanan</button>
                </form>

                <div class="mini-info" aria-label="Keunggulan layanan">
                    <div class="mini-item">
                        <span class="dot"></span>
                        <span>Pesanan diproses cepat dan aman</span>
                    </div>
                    <div class="mini-item">
                        <span class="dot"></span>
                        <span>Atur rasa sesuai selera!</span>
                    </div>
                </div>
            </aside>
        </section>

        <footer id="team">
            <div class="footer-head">
                <h3>Kelompok 9 - 05SIFM001</h3>
                <span class="tag-footer">Warmindo Crew</span>
            </div>

            <ul class="team-list">
                <li>Malvin Evander Lopulalan – 241011700903<br>Cloud Architect</li>
                <li>Ardiansyah – 241011700904<br>Infrastructure Engineer</li>
                <li>Muhammad Syafiy Fakhri – 241011700648<br>Security & Governance Officer</li>
                <li>Ezy Arya Putra – 241011701053<br>Cost & Operations Analyst</li>
            </ul>
        </footer>
    </div>
    <script>
        const pesananInput = document.getElementById('pesanan');
        const ringkasanPesanan = document.getElementById('ringkasan-pesanan');
        const menuCards = document.querySelectorAll('.menu-card[data-menu-name][data-menu-price]');
        const jumlahMenu = new Map();

        pesananInput.readOnly = true;

        function perbaruiPesanan() {
            const pilihan = [...jumlahMenu.entries()].filter(([, jumlah]) => jumlah > 0);
            const total = pilihan.reduce((jumlahTotal, [, jumlah]) => jumlahTotal + jumlah, 0);

            if (pilihan.length === 0) {
                pesananInput.value = '';
                ringkasanPesanan.textContent = 'Belum ada menu yang dipilih.';
                return;
            }

            const rincian = pilihan.map(([nama, jumlah]) => `${jumlah}x ${nama}`);
            const totalHarga = pilihan.reduce((jumlahTotal, [nama, jumlah]) => {
                const kartuMenu = [...menuCards].find((card) => card.dataset.menuName === nama);
                return jumlahTotal + (Number(kartuMenu.dataset.menuPrice) * jumlah);
            }, 0);

            pesananInput.value = rincian.join(', ');
            ringkasanPesanan.textContent = `${total} item — ${rincian.join(', ')}. Total: Rp ${totalHarga.toLocaleString('id-ID')}`;
        }

        menuCards.forEach((card) => {
            const nama = card.dataset.menuName;
            jumlahMenu.set(nama, 0);

            card.querySelectorAll('[data-quantity-change]').forEach((button) => {
                button.addEventListener('click', () => {
                    const jumlahBaru = jumlahMenu.get(nama) + Number(button.dataset.quantityChange);
                    jumlahMenu.set(nama, jumlahBaru);
                    card.querySelector('.quantity-value').textContent = jumlahBaru;
                    card.querySelector('[data-quantity-change="-1"]').disabled = jumlahBaru === 0;
                    perbaruiPesanan();
                });
            });
        });
    </script>
</body>
</html>
