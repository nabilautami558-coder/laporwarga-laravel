<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporWarga — Suara Anda, Perubahan Kita</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }


    body {
        font-family: "Segoe UI", Arial, sans-serif;
        color: #172b4d;
        background: #f7f9fc;
        line-height: 1.6;
    }

    nav {
        height: 76px;
        padding: 0 8%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: white;
        border-bottom: 1px solid #e8edf5;
    }

    .logo { font-size: 23px; font-weight: 800; color: #1769e0; }
    .logo span { color: #172b4d; }
    .nav-links { display: flex; align-items: center; gap: 26px; }
    a { text-decoration: none; color: inherit; }
    .nav-links a { font-size: 14px; font-weight: 600; }
    .btn {
        display: inline-block;
        background: #1769e0;
        color: white !important;
        padding: 11px 21px;
        border-radius: 9px;
        font-weight: 700;
    }

    .hero {
        padding: 85px 8%;
        background: linear-gradient(120deg, #edf5ff, #ffffff);
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        align-items: center;
        gap: 55px;
    }

    .tag {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 30px;
        background: #dceaff;
        color: #1769e0;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 22px;
    }

    h1 {
        font-size: clamp(38px, 5vw, 58px);
        line-height: 1.15;
        letter-spacing: -1.5px;
        margin-bottom: 22px;
    }

    h1 span { color: #1769e0; }
    .hero p { color: #65748b; font-size: 16px; max-width: 520px; }
    .hero-actions { display: flex; gap: 13px; margin-top: 30px; flex-wrap: wrap; }

    .btn-outline {
        display: inline-block;
        padding: 10px 20px;
        border: 1px solid #cbd7e8;
        border-radius: 9px;
        font-weight: 700;
        background: white;
    }

    .illustration {
        min-height: 300px;
        background: linear-gradient(145deg, #1769e0, #65a4ff);
        border-radius: 28px;
        padding: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 24px 55px #1769e026;
    }

    .report-card {
        background: white;
        width: 100%;
        max-width: 310px;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 15px 40px #123b7725;
    }

    .report-icon {
        width: 54px;
        height: 54px;
        display: grid;
        place-items: center;
        border-radius: 14px;
        background: #e8f1ff;
        font-size: 27px;
        margin-bottom: 17px;
    }

    .report-card h3 { font-size: 19px; margin-bottom: 7px; }
    .report-card p { font-size: 13px; }
    .status {
        display: inline-block;
        background: #fff2cf;
        color: #946200;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        margin-top: 19px;
    }

    .section { padding: 75px 8%; }
    .section-heading { text-align: center; margin-bottom: 38px; }
    .section-heading h2 { font-size: 32px; margin-bottom: 10px; }
    .section-heading p { color: #718096; }

    .features {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .feature {
        background: white;
        border: 1px solid #e8edf5;
        border-radius: 16px;
        padding: 27px;
    }

    .feature-icon {
        font-size: 26px;
        background: #edf4ff;
        width: 57px;
        height: 57px;
        display: grid;
        place-items: center;
        border-radius: 14px;
        margin-bottom: 19px;
    }

    .feature h3 { margin-bottom: 9px; font-size: 18px; }
    .feature p { color: #718096; font-size: 14px; }

    .cta {
        margin: 0 8% 70px;
        padding: 43px;
        background: #1769e0;
        color: white;
        border-radius: 20px;
        text-align: center;
    }

    .cta h2 { font-size: 29px; margin-bottom: 10px; }
    .cta p { color: #e0ecff; margin-bottom: 23px; }
    .cta .btn { background: white; color: #1769e0 !important; }

    footer {
        background: white;
        border-top: 1px solid #e8edf5;
        padding: 25px 8%;
        color: #718096;
        font-size: 13px;
        display: flex;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }

    @media (max-width: 760px) {
        nav { padding: 0 5%; }
        .nav-links { gap: 12px; }
        .nav-links a:first-child { display: none; }
        .hero { grid-template-columns: 1fr; padding: 55px 6%; gap: 35px; }
        .section { padding: 55px 6%; }
        .features { grid-template-columns: 1fr; }
        .cta { margin: 0 6% 45px; padding: 32px 20px; }
    }
</style>


</head>
<body>
    <nav>
        <a href="/" class="logo">Lapor<span>Warga.</span></a>
        <div class="nav-links">
            <a href="#layanan">Layanan</a>
            <a href="#tentang">Tentang</a>
            <a href="/login" class="btn">Masuk</a>
        </div>
    </nav>


<main>
    <section class="hero" id="tentang">
        <div>
            <span class="tag">PLATFORM PENGADUAN MASYARAKAT</span>
            <h1>Suara Anda,<br><span>Perubahan Kita.</span></h1>
            <p>
                Sampaikan keluhan dan aspirasi untuk lingkungan yang lebih baik.
                LaporWarga membantu masyarakat menyampaikan pengaduan dengan
                mudah, praktis, dan transparan.
            </p>
            <div class="hero-actions">
                <a href="/register" class="btn">Mulai Melapor &rarr;</a>
                <a href="#layanan" class="btn-outline">Pelajari Layanan</a>
            </div>
        </div>

        <div class="illustration">
            <div class="report-card">
                <div class="report-icon">📋</div>
                <h3>Pengaduan Warga</h3>
                <p>Laporkan masalah di lingkunganmu dan pantau perkembangannya.</p>
                <span class="status">● Contoh status laporan</span>
            </div>
        </div>
    </section>

    <section class="section" id="layanan">
        <div class="section-heading">
            <h2>Layanan Kami</h2>
            <p>Satu platform untuk menyampaikan aspirasi dan membangun lingkungan.</p>
        </div>

        <div class="features">
            <article class="feature">
                <div class="feature-icon">📝</div>
                <h3>Kirim Pengaduan</h3>
                <p>Sampaikan laporan mengenai fasilitas umum, kebersihan,
                infrastruktur, dan masalah lingkungan.</p>
            </article>

            <article class="feature">
                <div class="feature-icon">🔎</div>
                <h3>Pantau Laporan</h3>
                <p>Lihat perkembangan penanganan laporan agar prosesnya
                lebih mudah dipantau.</p>
            </article>

            <article class="feature">
                <div class="feature-icon">🤝</div>
                <h3>Transparansi</h3>
                <p>Dukung komunikasi antara masyarakat dan petugas
                melalui sistem pengaduan yang terorganisasi.</p>
            </article>
        </div>
    </section>

    <section class="cta">
        <h2>Punya Aspirasi untuk Lingkunganmu?</h2>
        <p>Mulai sampaikan pengaduan dan jadilah bagian dari perubahan.</p>
        <a href="/register" class="btn">Daftar Akun Sekarang</a>
    </section>
</main>

<footer>
    <span>© 2026 LaporWarga. Platform Pengaduan Masyarakat.</span>
    <span>Suara warga, langkah menuju perubahan.</span>
</footer>


</body>
</html>
