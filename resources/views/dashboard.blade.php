
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Warga - LaporWarga</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #243247;
        }

        header {
            background: #173b67;
            color: white;
            padding: 18px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            letter-spacing: .3px;
        }

        .brand span {
            color: #8fc9ff;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .header-right a {
            color: white;
            text-decoration: none;
        }

        .logout {
            border: 1px solid #ffffff80;
            background: transparent;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        main {
            max-width: 1150px;
            margin: 35px auto;
            padding: 0 22px;
        }

        .welcome {
            background: linear-gradient(120deg, #173b67, #2875b9);
            color: white;
            padding: 32px;
            border-radius: 16px;
            margin-bottom: 28px;
        }

        .welcome h1 {
            margin: 0 0 12px;
            font-size: 28px;
        }

        .welcome p {
            line-height: 1.7;
            margin: 0;
            color: #e2efff;
            max-width: 650px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat {
            background: white;
            padding: 22px;
            border-radius: 13px;
            box-shadow: 0 3px 12px #00000008;
            border: 1px solid #e8edf4;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #173b67;
        }

        .section {
            background: white;
            border: 1px solid #e8edf4;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 3px 12px #00000008;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .section-heading h2 {
            margin: 0;
            color: #173b67;
            font-size: 21px;
        }

        .add-button {
            background: #1769aa;
            color: white;
            padding: 12px 17px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 22px;
        }

        .complaint {
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .complaint:last-child {
            margin-bottom: 0;
        }

        .complaint-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .complaint h3 {
            color: #173b67;
            font-size: 18px;
            margin: 0 0 12px;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            background: #fef3c7;
            color: #92400e;
            white-space: nowrap;
        }

        .status-diproses {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .metadata {
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .report-preview {
            font-size: 14px;
            color: #475569;
            line-height: 1.7;
            margin-bottom: 17px;
            overflow-wrap: anywhere;
        }

        .detail-link {
            color: #1769aa;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .detail-link:hover {
            text-decoration: underline;
        }

        .empty {
            text-align: center;
            padding: 38px 15px;
        }

        .empty h3 {
            color: #173b67;
            margin-bottom: 10px;
        }

        .empty p {
            color: #64748b;
            line-height: 1.7;
        }

        footer {
            text-align: center;
            padding: 25px 15px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .welcome {
                padding: 25px 22px;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .section {
                padding: 18px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">Lapor<span>Warga</span></div>

    <div class="header-right">
        <span>Halo, {{ auth()->user()->name }}</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </div>
</header>

<main>
    <section class="welcome">
        <h1>Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
        <p>
            Suara kamu berarti untuk lingkungan yang lebih baik.
            Sampaikan pengaduan mengenai keamanan, kebersihan,
            ketertiban, atau fasilitas umum di sekitarmu.
        </p>
    </section>

    @if (session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <section class="stats">
        <div class="stat">
            <div class="stat-label">Total Pengaduan</div>
            <div class="stat-number">{{ $pengaduans->count() }}</div>
        </div>

        <div class="stat">
            <div class="stat-label">Menunggu</div>
            <div class="stat-number">
                {{ $pengaduans->where('status', 'Menunggu')->count() }}
            </div>
        </div>

        <div class="stat">
            <div class="stat-label">Selesai</div>
            <div class="stat-number">
                {{ $pengaduans->where('status', 'Selesai')->count() }}
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-heading">
            <h2>Pengaduan Saya</h2>

            <a href="{{ route('pengaduan.create') }}" class="add-button">
                + Buat Pengaduan
            </a>
        </div>

        @forelse ($pengaduans as $pengaduan)
            <article class="complaint">
                <div class="complaint-top">
                    <h3>{{ $pengaduan->judul }}</h3>

                    <span class="status
                        @if ($pengaduan->status === 'Selesai') status-selesai
                        @elseif ($pengaduan->status === 'Diproses') status-diproses
                        @endif">
                        {{ $pengaduan->status }}
                    </span>
                </div>

                <div class="metadata">
                    Kategori: {{ $pengaduan->kategori }}<br>
                    Lokasi: {{ $pengaduan->lokasi }}<br>
                    Tanggal pengiriman:
                    {{ $pengaduan->created_at->format('d-m-Y H:i') }}
                </div>

                <div class="report-preview">
                    {{ \Illuminate\Support\Str::limit($pengaduan->isi_laporan, 180) }}
                </div>

                <a
                    href="{{ route('pengaduan.show', $pengaduan->id) }}"
                    class="detail-link"
                >
                    Lihat Detail →
                </a>
            </article>
        @empty
            <div class="empty">
                <h3>Belum Ada Pengaduan</h3>
                <p>
                    Kamu belum mengirim pengaduan.
                    Mulai laporkan masalah di lingkunganmu agar bisa
                    ditindaklanjuti.
                </p>

                <a href="{{ route('pengaduan.create') }}" class="add-button">
                    Buat Pengaduan Pertama
                </a>
            </div>
        @endforelse
    </section>
</main>

<footer>
    LaporWarga &copy; {{ date('Y') }} — Bersama Membangun Lingkungan yang Lebih Baik
</footer>

</body>
</html>

