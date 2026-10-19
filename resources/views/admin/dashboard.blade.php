
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | LaporWarga</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --navy: #10264a;
            --blue: #3268f5;
            --bg: #f5f7fb;
            --text: #1d2b45;
            --muted: #8995a9;
            --border: #e9edf4;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        button, input { font: inherit; }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 10;
            width: 250px;
            display: flex;
            flex-direction: column;
            padding: 28px 18px;
            color: white;
            background:
                radial-gradient(circle at 0% 0%, #234a85, transparent 38%),
                linear-gradient(180deg, #10264a, #0b1b36);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
            border-bottom: 1px solid #ffffff18;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            border-radius: 13px;
            background: linear-gradient(135deg, #5b8cff, #2860e9);
            font-size: 22px;
        }

        .brand-name { font-size: 19px; font-weight: 800; }

        .brand-sub {
            margin-top: 4px;
            color: #a9bddc;
            font-size: 10px;
        }

        .menu-label {
            margin: 30px 12px 12px;
            color: #8298b9;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 6px;
            padding: 13px 14px;
            border-radius: 10px;
            color: #b6c5dc;
            font-size: 13px;
            text-decoration: none;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: linear-gradient(90deg, #3268f5, #3d75f5);
            box-shadow: 0 6px 18px #1d4ed833;
        }

        .nav-icon { width: 21px; text-align: center; font-size: 17px; }

        .sidebar-bottom { margin-top: auto; }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            margin: 15px 0;
            padding: 15px 10px;
            border-top: 1px solid #ffffff18;
        }

        .avatar {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: #31558b;
            color: white;
            font-weight: 800;
        }

        .profile-name { font-size: 12px; font-weight: 700; }
        .profile-role { margin-top: 4px; color: #a9bddc; font-size: 10px; }

        .logout-menu {
            width: 100%;
            border: 0;
            background: transparent;
            text-align: left;
            cursor: pointer;
        }

        .main { min-height: 100vh; margin-left: 250px; }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 18px 35px;
            border-bottom: 1px solid var(--border);
            background: #ffffffed;
            backdrop-filter: blur(12px);
        }

        .breadcrumb { color: var(--muted); font-size: 12px; }
        .breadcrumb strong { color: var(--text); }

        .top-right { display: flex; align-items: center; gap: 15px; }
        .today { color: #6b7890; font-size: 11px; }

        .logout {
            padding: 10px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            background: white;
            color: #34445e;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .logout:hover { color: #dc2626; border-color: #fecaca; }

        .content { max-width: 1600px; margin: auto; padding: 32px 35px 45px; }

        .welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .welcome h1 {
            margin: 0;
            color: #142747;
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .welcome p { margin: 9px 0 0; color: #8793a6; font-size: 13px; line-height: 1.7; }

        .welcome-badge {
            padding: 10px 14px;
            border: 1px solid #dce7ff;
            border-radius: 10px;
            background: #eef4ff;
            color: #3263d8;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 18px #1d355708;
            transition: .2s;
        }

        .stat-card:hover { transform: translateY(-3px); }

        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 8px; }
        .stat-label { color: #7d899c; font-size: 12px; font-weight: 600; }

        .stat-icon {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            border-radius: 13px;
            font-size: 20px;
        }

        .icon-blue { background: #edf3ff; }
        .icon-orange { background: #fff4e6; }
        .icon-purple { background: #f3edff; }
        .icon-green { background: #e9f9f0; }

        .stat-number {
            margin-top: 18px;
            color: #1a2c4b;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .stat-caption { margin-top: 8px; color: #9aa4b5; font-size: 10px; }

        .overview-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(260px, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .panel {
            min-width: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 18px #1d355706;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 22px 24px;
            border-bottom: 1px solid #eff2f7;
        }

        .panel-heading h2 { margin: 0; color: #21324e; font-size: 14px; font-weight: 800; }
        .panel-heading p { margin: 7px 0 0; color: #97a1b1; font-size: 11px; }

        .mini-label {
            padding: 7px 10px;
            border-radius: 8px;
            background: #f2f6ff;
            color: #416bd4;
            font-size: 10px;
            font-weight: 700;
        }

        .chart-area {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: clamp(12px, 4vw, 45px);
            height: 230px;
            padding: 25px 20px 0;
        }

        .chart-column {
            display: flex;
            flex: 1;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            height: 100%;
            max-width: 90px;
        }

        .chart-value { color: #65738c; font-size: 12px; font-weight: 800; }

        .bar-track {
            display: flex;
            align-items: flex-end;
            width: 100%;
            height: 125px;
            overflow: hidden;
            border-radius: 9px 9px 4px 4px;
            background: #f4f6fb;
        }

        .bar { width: 100%; min-height: 0; border-radius: 9px 9px 4px 4px; }
        .bar-blue { background: linear-gradient(180deg, #6093ff, #3268f5); }
        .bar-orange { background: linear-gradient(180deg, #ffc875, #f59e0b); }
        .bar-green { background: linear-gradient(180deg, #64d9a0, #10b981); }
        .chart-name { padding-bottom: 18px; color: #8a96a8; font-size: 10px; text-align: center; }

        .status-body { padding: 25px; }

        .status-summary {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
            padding: 18px;
            border-radius: 13px;
            background: linear-gradient(120deg, #eff5ff, #f8faff);
        }

        .summary-icon {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: white;
            color: #3268f5;
            font-size: 22px;
        }

        .summary-number { color: #173b76; font-size: 27px; font-weight: 800; }
        .summary-text { margin-top: 4px; color: #8793a6; font-size: 10px; }

        .progress-item { margin-top: 22px; }
        .progress-info { display: flex; justify-content: space-between; gap: 10px; margin-bottom: 9px; color: #64748b; font-size: 11px; }
        .progress-info strong { color: #334155; }

        .progress-track { height: 7px; overflow: hidden; border-radius: 10px; background: #eef1f6; }
        .progress-fill { height: 100%; border-radius: 10px; }

        .action-panel {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 24px;
            border: 1px solid #dce7ff;
            border-radius: 16px;
            background: linear-gradient(120deg, #eef4ff, #ffffff);
        }

        .action-panel h2 { margin: 0; color: #1e3763; font-size: 15px; }
        .action-panel p { margin: 8px 0 0; color: #7585a0; font-size: 12px; line-height: 1.7; }

        .primary-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            flex-shrink: 0;
            padding: 12px 16px;
            border-radius: 10px;
            background: var(--blue);
            color: white;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: .2s;
        }

        .primary-link:hover { background: #2054d5; transform: translateY(-1px); }

        .page-footer { padding: 25px 0 0; color: #a0aaba; font-size: 10px; text-align: center; }

        @media (max-width: 1200px) {
            .sidebar { width: 220px; }
            .main { margin-left: 220px; }
            .content { padding: 28px 22px; }
            .topbar { padding: 17px 22px; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .overview-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 760px) {
            .sidebar { position: relative; width: 100%; padding: 17px 18px; }
            .brand { padding-bottom: 16px; }
            .sidebar .menu-label, .sidebar-bottom { display: none; }
            .sidebar .nav-link { display: flex; }
            .main { margin-left: 0; }
            .topbar { position: relative; padding: 15px 18px; }
            .today { display: none; }
            .content { padding: 25px 15px; }
            .welcome { align-items: flex-start; flex-direction: column; }
            .welcome h1 { font-size: 24px; }
            .stats { gap: 12px; }
            .stat-card { padding: 17px; }
            .stat-number { font-size: 29px; }
            .panel-heading { align-items: flex-start; flex-direction: column; padding: 18px; }
            .action-panel { align-items: flex-start; flex-direction: column; }
        }

        @media (max-width: 380px) {
            .stats { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
<aside class="sidebar">
    <div class="brand">
        <div class="brand-icon">🏛️</div>
        <div>
            <div class="brand-name">LaporWarga</div>
            <div class="brand-sub">Sistem Pengaduan Masyarakat</div>
        </div>
    </div>

    <div class="menu-label">MENU UTAMA</div>

    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
        <span class="nav-icon">▦</span>
        Dashboard Utama
    </a>

    <a href="{{ route('admin.pengaduan') }}" class="nav-link">
        <span class="nav-icon">▤</span>
        Daftar Pengaduan
    </a>

    <div class="sidebar-bottom">
        <div class="menu-label">AKUN</div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link logout-menu">
                <span class="nav-icon">↪</span>
                Keluar
            </button>
        </form>

        <div class="admin-profile">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-role">Administrator</div>
            </div>
        </div>
    </div>
</aside>

<div class="main">
    <header class="topbar">
        <div class="breadcrumb">
            LaporWarga &nbsp;/&nbsp; <strong>Dashboard Utama</strong>
        </div>

        <div class="top-right">
            <span class="today">{{ now()->translatedFormat('l, d F Y') }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">↪ Keluar</button>
            </form>
        </div>
    </header>

    <main class="content">
        <section class="welcome">
            <div>
                <h1>Dashboard Admin 👋</h1>
                <p>
                    Halo, {{ auth()->user()->name }}! Selamat datang di panel
                    administrasi LaporWarga. Pantau perkembangan laporan
                    masyarakat melalui ringkasan berikut.
                </p>
            </div>

            <div class="welcome-badge">● Sistem Pengaduan Aktif</div>
        </section>

        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Total Pengaduan</div>
                    <div class="stat-icon icon-blue">▤</div>
                </div>
                <div class="stat-number">{{ $totalPengaduan }}</div>
                <div class="stat-caption">Seluruh laporan yang masuk</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Menunggu</div>
                    <div class="stat-icon icon-orange">◷</div>
                </div>
                <div class="stat-number">{{ $menunggu }}</div>
                <div class="stat-caption">Laporan menunggu penanganan</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Sedang Diproses</div>
                    <div class="stat-icon icon-purple">⟳</div>
                </div>
                <div class="stat-number">{{ $diproses }}</div>
                <div class="stat-caption">Laporan dalam penanganan</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Selesai</div>
                    <div class="stat-icon icon-green">✓</div>
                </div>
                <div class="stat-number">{{ $selesai }}</div>
                <div class="stat-caption">Laporan telah diselesaikan</div>
            </div>
        </section>

        <section class="overview-grid">
            <div class="panel">
                <div class="panel-heading">
                    <div>
                        <h2>Ringkasan Status Pengaduan</h2>
                        <p>Perbandingan jumlah laporan berdasarkan status.</p>
                    </div>
                    <span class="mini-label">Data terkini</span>
                </div>

                @php
                    $maxChart = max(1, $totalPengaduan);
                    $chartItems = [
                        ['label' => 'Menunggu', 'value' => $menunggu, 'class' => 'bar-orange'],
                        ['label' => 'Diproses', 'value' => $diproses, 'class' => 'bar-blue'],
                        ['label' => 'Selesai', 'value' => $selesai, 'class' => 'bar-green'],
                    ];
                @endphp

                <div class="chart-area">
                    @foreach ($chartItems as $item)
                        <div class="chart-column">
                            <div class="chart-value">{{ $item['value'] }}</div>
                            <div class="bar-track">
                                <div
                                    class="bar {{ $item['class'] }}"
                                    style="height: {{ $item['value'] > 0 ? max(8, ($item['value'] / $maxChart) * 100) : 0 }}%;"
                                ></div>
                            </div>
                            <div class="chart-name">{{ $item['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <div>
                        <h2>Ikhtisar Pengaduan</h2>
                        <p>Distribusi laporan berdasarkan status.</p>
                    </div>
                </div>

                <div class="status-body">
                    <div class="status-summary">
                        <div class="summary-icon">▤</div>
                        <div>
                            <div class="summary-number">{{ $totalPengaduan }}</div>
                            <div class="summary-text">Total seluruh pengaduan</div>
                        </div>
                    </div>

                    @php
                        $statusItems = [
                            ['label' => 'Menunggu', 'value' => $menunggu, 'color' => '#f59e0b'],
                            ['label' => 'Diproses', 'value' => $diproses, 'color' => '#3268f5'],
                            ['label' => 'Selesai', 'value' => $selesai, 'color' => '#10b981'],
                        ];
                    @endphp

                    @foreach ($statusItems as $item)
                        <div class="progress-item">
                            <div class="progress-info">
                                <span>{{ $item['label'] }}</span>
                                <strong>
                                    {{ $totalPengaduan > 0 ? round(($item['value'] / $totalPengaduan) * 100) : 0 }}%
                                    ({{ $item['value'] }})
                                </strong>
                            </div>
                            <div class="progress-track">
                                <div
                                    class="progress-fill"
                                    style="width: {{ $totalPengaduan > 0 ? ($item['value'] / $totalPengaduan) * 100 : 0 }}%; background: {{ $item['color'] }};"
                                ></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="action-panel">
            <div>
                <h2>Kelola Pengaduan Masyarakat</h2>
                <p>
                    Buka halaman daftar pengaduan untuk membaca laporan warga,
                    mencari laporan tertentu, memfilter status, dan memperbarui
                    proses penanganan.
                </p>
            </div>

            <a href="{{ route('admin.pengaduan') }}" class="primary-link">
                📋 Lihat Daftar Pengaduan →
            </a>
        </section>

        <footer class="page-footer">
            © {{ date('Y') }} LaporWarga · Admin Panel
        </footer>
    </main>
</div>
</body>
</html>

