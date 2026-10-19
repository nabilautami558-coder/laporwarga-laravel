
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - LaporWarga</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #243247;
        }

        header {
            background: #173b67;
            color: white;
            padding: 20px 7%;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        main {
            max-width: 800px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px #0000000a;
        }

        h1 {
            color: #173b67;
            margin-top: 0;
        }

        .status {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #92400e;
        }

        .status-diproses {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-selesai {
            background: #d1fae5;
            color: #065f46;
        }

        .progress-card {
            margin: 25px 0;
            padding: 22px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        .progress-title {
            margin: 0 0 24px;
            color: #173b67;
            font-size: 17px;
        }

        .progress-line {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .step-circle {
            width: 36px;
            height: 36px;
            margin: 0 auto 9px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e2e8f0;
            color: #64748b;
            font-weight: bold;
            position: relative;
            z-index: 2;
        }

        .step.active .step-circle {
            background: #1769aa;
            color: white;
        }

        .step.completed .step-circle {
            background: #15803d;
            color: white;
        }

        .step-label {
            font-size: 12px;
            color: #64748b;
            font-weight: bold;
        }

        .step.active .step-label,
        .step.completed .step-label {
            color: #173b67;
        }

        .progress-track {
            display: flex;
            margin: 0 16%;
            height: 5px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: #1769aa;
            transition: width 0.3s ease;
        }

        .progress-message {
            margin: 22px 0 0;
            padding: 12px;
            border-radius: 8px;
            background: white;
            color: #475569;
            font-size: 13px;
            line-height: 1.6;
        }

        .info {
            padding: 17px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .label {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .value {
            font-size: 15px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .report {
            white-space: pre-line;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 18px;
            background: #1769aa;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        .back:hover {
            background: #12558b;
        }

        @media (max-width: 500px) {
            .card {
                padding: 20px;
            }

            .progress-card {
                padding: 16px 10px;
            }

            .step-label {
                font-size: 10px;
            }

            .progress-track {
                margin: 0 17%;
            }
        }
    </style>
</head>

<body>

<header>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboard</a>
</header>

<main>
    <section class="card">
        <h1>Detail Pengaduan</h1>

        @php
            $status = $pengaduan->status;

            $statusClass = match ($status) {
                'Menunggu' => 'status-menunggu',
                'Diproses' => 'status-diproses',
                'Selesai' => 'status-selesai',
                default => 'status-menunggu',
            };

            $progress = match ($status) {
                'Menunggu' => 0,
                'Diproses' => 50,
                'Selesai' => 100,
                default => 0,
            };

            $activeStep = match ($status) {
                'Menunggu' => 1,
                'Diproses' => 2,
                'Selesai' => 3,
                default => 1,
            };

            $pesanStatus = match ($status) {
                'Menunggu' => 'Laporan kamu sudah dikirim dan sedang menunggu pemeriksaan admin.',
                'Diproses' => 'Laporan kamu sedang ditindaklanjuti oleh admin.',
                'Selesai' => 'Laporan kamu sudah ditandai selesai oleh admin.',
                default => 'Status laporan akan diperbarui oleh admin.',
            };
        @endphp

        <p class="status {{ $statusClass }}">
            {{ $status }}
        </p>

        <section class="progress-card">
            <h2 class="progress-title">Progres Pengaduan</h2>

            <div class="progress-line">
                <div class="step {{ $activeStep >= 1 ? ($activeStep == 1 ? 'active' : 'completed') : '' }}">
                    <div class="step-circle">
                        @if ($activeStep > 1)
                            ✓
                        @else
                            1
                        @endif
                    </div>
                    <div class="step-label">Menunggu</div>
                </div>

                <div class="step {{ $activeStep == 2 ? 'active' : ($activeStep > 2 ? 'completed' : '') }}">
                    <div class="step-circle">
                        @if ($activeStep > 2)
                            ✓
                        @else
                            2
                        @endif
                    </div>
                    <div class="step-label">Diproses</div>
                </div>

                <div class="step {{ $activeStep == 3 ? 'active' : '' }}">
                    <div class="step-circle">
                        @if ($activeStep == 3)
                            ✓
                        @else
                            3
                        @endif
                    </div>
                    <div class="step-label">Selesai</div>
                </div>
            </div>

            <div class="progress-track">
                <div class="progress-fill" style="width: {{ $progress }}%;"></div>
            </div>

            <p class="progress-message">
                <strong>Informasi status:</strong><br>
                {{ $pesanStatus }}
            </p>
        </section>

        <div class="info">
            <div class="label">Judul Pengaduan</div>
            <div class="value">
                <strong>{{ $pengaduan->judul }}</strong>
            </div>
        </div>

        <div class="info">
            <div class="label">Kategori</div>
            <div class="value">{{ $pengaduan->kategori }}</div>
        </div>

        <div class="info">
            <div class="label">Lokasi Kejadian</div>
            <div class="value">{{ $pengaduan->lokasi }}</div>
        </div>

        <div class="info">
            <div class="label">Waktu Kejadian</div>
            <div class="value">
                @if ($pengaduan->waktu_kejadian)
                    {{ $pengaduan->waktu_kejadian->format('d-m-Y H:i') }}
                @else
                    Tidak dicantumkan
                @endif
            </div>
        </div>

        <div class="info">
            <div class="label">Isi Laporan</div>
            <div class="value report">{{ $pengaduan->isi_laporan }}</div>
        </div>

        <div class="info">
            <div class="label">Tanggal Pengiriman</div>
            <div class="value">
                {{ $pengaduan->created_at->format('d-m-Y H:i') }}
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="back">
            Kembali ke Dashboard
        </a>
    </section>
</main>

</body>
</html>

