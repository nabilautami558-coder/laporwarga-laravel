
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan | LaporWarga</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f5f7fb;
            color: #1d2b45;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 245px;
            padding: 28px 18px;
            background: linear-gradient(180deg, #10264a, #0b1b36);
            color: white;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 28px;
            border-bottom: 1px solid #ffffff20;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            background: #3268f5;
            border-radius: 13px;
            font-size: 22px;
        }

        .brand-name { font-size: 19px; font-weight: 800; }
        .brand-sub { margin-top: 5px; color: #a9bddc; font-size: 10px; }

        .menu-label {
            margin: 30px 12px 12px;
            color: #8298b9;
            font-size: 10px;
            letter-spacing: 1.4px;
            font-weight: 700;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 7px;
            padding: 13px;
            border-radius: 10px;
            color: #b6c5dc;
            text-decoration: none;
            font-size: 13px;
        }

        .nav-link:hover { background: #ffffff12; color: white; }

        .nav-link.active {
            background: #3268f5;
            color: white;
            box-shadow: 0 6px 18px #1d4ed833;
        }

        .sidebar-bottom { margin-top: auto; }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 5px 5px;
            border-top: 1px solid #ffffff20;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #31558b;
            font-weight: 800;
        }

        .profile-name { font-size: 12px; font-weight: 700; }
        .profile-role { margin-top: 4px; color: #a9bddc; font-size: 10px; }

        .main { margin-left: 245px; min-height: 100vh; }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 20px 32px;
            background: white;
            border-bottom: 1px solid #e9edf4;
        }

        .breadcrumb { color: #8995a9; font-size: 12px; }
        .breadcrumb strong { color: #1d2b45; }

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

        .content { max-width: 1500px; margin: auto; padding: 32px; }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 26px;
        }

        h1 {
            margin: 0;
            color: #142747;
            font-size: 27px;
            letter-spacing: -.7px;
        }

        .page-heading p {
            margin: 9px 0 0;
            color: #8995a9;
            font-size: 13px;
            line-height: 1.7;
        }

        .total-badge {
            padding: 11px 14px;
            border: 1px solid #dce7ff;
            border-radius: 10px;
            background: #eef4ff;
            color: #3263d8;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat {
            padding: 20px;
            border: 1px solid #e9edf4;
            border-radius: 14px;
            background: white;
        }

        .stat-label { color: #8995a9; font-size: 12px; }

        .stat-number {
            margin-top: 12px;
            color: #1d2b45;
            font-size: 30px;
            font-weight: 800;
        }

        .panel {
            overflow: hidden;
            border: 1px solid #e9edf4;
            border-radius: 15px;
            background: white;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 23px;
            border-bottom: 1px solid #edf0f5;
        }

        .panel-header h2 { margin: 0; font-size: 15px; }

        .panel-header p {
            margin: 7px 0 0;
            color: #8995a9;
            font-size: 11px;
            line-height: 1.6;
        }

        .tools { display: flex; flex-wrap: wrap; gap: 9px; }

        .search, .filter {
            height: 39px;
            padding: 0 12px;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
            outline: none;
            background: #fbfcff;
            color: #526078;
            font-size: 11px;
        }

        .search { width: 230px; max-width: 100%; }
        .search:focus, .filter:focus { border-color: #7399f8; }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        th {
            padding: 15px;
            background: #fafbfd;
            color: #8793a6;
            font-size: 10px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 17px 15px;
            border-top: 1px solid #f0f2f7;
            color: #59677d;
            font-size: 11px;
            vertical-align: top;
        }

        tbody tr:hover { background: #fafcff; }

        .report-title {
            display: block;
            max-width: 220px;
            color: #273954;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.6;
        }

        .muted {
            display: block;
            margin-top: 6px;
            color: #97a1b1;
            line-height: 1.6;
        }

        .category {
            display: inline-block;
            margin-top: 7px;
            padding: 5px 8px;
            border-radius: 6px;
            background: #f0f4ff;
            color: #456bd0;
            font-size: 10px;
        }

        .status {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .menunggu { background: #fff5df; color: #b7790b; }
        .diproses { background: #eaf1ff; color: #3268d9; }
        .selesai { background: #e6f8ef; color: #12845a; }

        .status-form {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 125px;
        }

        .status-form select {
            padding: 9px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: white;
            font-size: 11px;
        }

        .update-button {
            padding: 10px;
            border: 0;
            border-radius: 8px;
            background: #3268f5;
            color: white;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .update-button:hover { background: #2054d5; }

        .alert {
            margin: 18px 22px 0;
            padding: 13px 15px;
            border-radius: 9px;
            font-size: 12px;
            line-height: 1.7;
        }

        .success { background: #eaf9f0; color: #137348; }
        .error { background: #fff0f0; color: #a92828; }

        .empty {
            padding: 50px 20px;
            color: #8995a9;
            text-align: center;
        }

        .empty h3 { color: #34445e; font-size: 15px; }
        .empty p { font-size: 12px; }

        .no-results {
            display: none;
            padding: 30px;
            text-align: center;
            color: #8995a9;
            font-size: 12px;
        }

        .footer {
            padding: 20px;
            color: #a0aaba;
            font-size: 10px;
            text-align: center;
        }

        @media (max-width: 1000px) {
            .sidebar { width: 210px; }
            .main { margin-left: 210px; }
            .content { padding: 22px; }
            .panel-header { align-items: flex-start; flex-direction: column; }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                padding: 16px;
            }

            .brand { padding-bottom: 14px; }
            .menu-label, .sidebar-bottom { display: none; }

            .nav-link {
                display: inline-flex;
                margin: 12px 4px 0 0;
                padding: 10px;
            }

            .main { margin-left: 0; }
            .topbar { padding: 15px; }
            .content { padding: 20px 12px; }
            .page-heading { align-items: flex-start; flex-direction: column; }
            .stats { gap: 9px; }
            .stat { padding: 13px; }
            .stat-number { font-size: 24px; }
            .panel-header { padding: 17px; }
            .tools, .search { width: 100%; }
            .filter { flex: 1; }
        }

        @media (max-width: 360px) {
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

    <a href="{{ route('admin.dashboard') }}" class="nav-link">
        ▦ &nbsp; Dashboard
    </a>

    <a href="{{ route('admin.pengaduan') }}" class="nav-link active">
        ▤ &nbsp; Daftar Pengaduan
    </a>

    <div class="sidebar-bottom">
        <div class="menu-label">AKUN</div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link"
                style="width:100%;border:0;background:transparent;text-align:left;cursor:pointer;">
                ↪ &nbsp; Keluar
            </button>
        </form>

        <div class="profile">
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
            LaporWarga &nbsp;/&nbsp; <strong>Daftar Pengaduan</strong>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">↪ Keluar</button>
        </form>
    </header>

    <main class="content">
        <section class="page-heading">
            <div>
                <h1>Daftar Pengaduan 📋</h1>
                <p>
                    Kelola semua laporan yang dikirim warga,
                    periksa detailnya, dan perbarui status penanganan.
                </p>
            </div>

            <div class="total-badge">
                {{ $pengaduans->count() }} Total Laporan
            </div>
        </section>

        <section class="stats">
            <div class="stat">
                <div class="stat-label">📨 Total Pengaduan</div>
                <div class="stat-number">{{ $pengaduans->count() }}</div>
            </div>

            <div class="stat">
                <div class="stat-label">🕒 Menunggu</div>
                <div class="stat-number">
                    {{ $pengaduans->where('status', 'Menunggu')->count() }}
                </div>
            </div>

            <div class="stat">
                <div class="stat-label">✓ Selesai</div>
                <div class="stat-number">
                    {{ $pengaduans->where('status', 'Selesai')->count() }}
                </div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-header">
                <div>
                    <h2>Semua Laporan Warga</h2>
                    <p>
                        Cari laporan berdasarkan judul, pelapor, kategori,
                        lokasi, atau saring berdasarkan status.
                    </p>
                </div>

                <div class="tools">
                    <input
                        type="search"
                        id="searchInput"
                        class="search"
                        placeholder="⌕ Cari laporan..."
                        aria-label="Cari laporan"
                    >

                    <select id="statusFilter" class="filter" aria-label="Filter status">
                        <option value="">Semua Status</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="diproses">Diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>

            @if (session('success'))
                <div class="alert success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if ($pengaduans->isEmpty())
                <div class="empty">
                    <div style="font-size:36px;">📭</div>
                    <h3>Belum Ada Pengaduan</h3>
                    <p>Laporan warga yang masuk akan tampil di sini.</p>
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>DETAIL LAPORAN</th>
                                <th>PELAPOR</th>
                                <th>LOKASI</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengaduans as $pengaduan)
                                @php
                                    $statusClass = match($pengaduan->status) {
                                        'Selesai' => 'selesai',
                                        'Diproses' => 'diproses',
                                        default => 'menunggu',
                                    };
                                @endphp

                                <tr class="report-row"
                                    data-status="{{ strtolower($pengaduan->status) }}">
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <span class="report-title">
                                            {{ $pengaduan->judul }}
                                        </span>

                                        <span class="category">
                                            {{ $pengaduan->kategori }}
                                        </span>

                                        <span class="muted">
                                            {{ \Illuminate\Support\Str::limit($pengaduan->isi_laporan, 120) }}
                                        </span>
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $pengaduan->user?->name ?? 'Pengguna tidak ditemukan' }}
                                        </strong>

                                        <span class="muted">
                                            {{ $pengaduan->user?->email ?? '-' }}
                                        </span>
                                    </td>

                                    <td>{{ $pengaduan->lokasi ?: '-' }}</td>

                                    <td>
                                        {{ $pengaduan->created_at?->format('d-m-Y') }}
                                        <span class="muted">
                                            {{ $pengaduan->created_at?->format('H:i') }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status {{ $statusClass }}">
                                            {{ $pengaduan->status }}
                                        </span>
                                    </td>

                                    <td>
                                        <form
                                            action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}"
                                            method="POST"
                                            class="status-form"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <select name="status" required>
                                                <option value="Menunggu"
                                                    {{ $pengaduan->status === 'Menunggu' ? 'selected' : '' }}>
                                                    Menunggu
                                                </option>

                                                <option value="Diproses"
                                                    {{ $pengaduan->status === 'Diproses' ? 'selected' : '' }}>
                                                    Diproses
                                                </option>

                                                <option value="Selesai"
                                                    {{ $pengaduan->status === 'Selesai' ? 'selected' : '' }}>
                                                    Selesai
                                                </option>
                                            </select>

                                            <button class="update-button" type="submit">
                                                Simpan Status
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="noResults" class="no-results">
                    Tidak ada laporan yang cocok dengan pencarian atau filter.
                </div>

                <div style="padding:16px 22px;border-top:1px solid #edf0f5;color:#929daf;font-size:10px;">
                    Total {{ $pengaduans->count() }} pengaduan dari database LaporWarga
                </div>
            @endif
        </section>

        <footer class="footer">
            © {{ date('Y') }} LaporWarga · Admin Panel
        </footer>
    </main>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('.report-row');
    const noResults = document.getElementById('noResults');

    function filterReports() {
        const query = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value;
        let visible = 0;

        rows.forEach(function (row) {
            const matchesText = row.textContent.toLowerCase().includes(query);
            const matchesStatus = !status || row.dataset.status === status;
            const show = matchesText && matchesStatus;

            row.style.display = show ? '' : 'none';

            if (show) visible++;
        });

        if (noResults) {
            noResults.style.display =
                rows.length > 0 && visible === 0 ? 'block' : 'none';
        }
    }

    searchInput.addEventListener('input', filterReports);
    statusFilter.addEventListener('change', filterReports);
</script>

</body>
</html>