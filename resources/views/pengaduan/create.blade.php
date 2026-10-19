
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan - LaporWarga</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #243247;
        }

        header {
            background: #173b67;
            padding: 20px 7%;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        main {
            max-width: 750px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px #0000000a;
        }

        h1 { color: #173b67; margin-top: 0; }

        .description, .hint {
            color: #64748b;
            line-height: 1.6;
        }

        label {
            display: block;
            margin: 20px 0 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .hint {
            font-size: 13px;
            margin-top: 7px;
        }

        .notice {
            background: #eff6ff;
            color: #1e40af;
            padding: 14px;
            border-radius: 8px;
            line-height: 1.6;
            font-size: 14px;
            margin: 20px 0;
        }

        .error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        button, .back {
            padding: 13px 18px;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        button {
            border: none;
            background: #1769aa;
            color: white;
            flex: 1;
        }

        .back {
            background: #e2e8f0;
            color: #243247;
        }

        @media (max-width: 500px) {
            .form-card { padding: 20px; }
            .buttons { flex-direction: column; }
        }
    </style>
</head>

<body>
<header>
    <a href="{{ route('dashboard') }}">← Kembali ke Dashboard</a>
</header>

<main>
    <section class="form-card">
        <h1>Buat Pengaduan</h1>

        <p class="description">
            Laporkan masalah di lingkunganmu agar dapat ditindaklanjuti,
            mulai dari kerusakan fasilitas umum hingga gangguan keamanan.
        </p>

        <div class="notice">
            <strong>Perhatian:</strong> Jelaskan kejadian sesuai fakta yang
            kamu ketahui. Foto tidak wajib dan laporan tetap dapat dikirim
            tanpa foto.
        </div>

        @if ($errors->any())
            <div class="notice" style="background:#fef2f2;color:#991b1b;">
                Ada bagian yang perlu diperbaiki. Periksa pesan di bawah
                setiap kolom.
            </div>
        @endif

        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <label for="judul">Judul Pengaduan *</label>
            <input
                type="text"
                id="judul"
                name="judul"
                value="{{ old('judul') }}"
                placeholder="Contoh: Lampu jalan mati"
                required
            >
            @error('judul')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="kategori">Kategori Pengaduan *</label>
            <select id="kategori" name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Keamanan dan Ketertiban" {{ old('kategori') == 'Keamanan dan Ketertiban' ? 'selected' : '' }}>Keamanan dan Ketertiban</option>
                <option value="Gangguan Lingkungan" {{ old('kategori') == 'Gangguan Lingkungan' ? 'selected' : '' }}>Gangguan Lingkungan</option>
                <option value="Ketertiban Umum" {{ old('kategori') == 'Ketertiban Umum' ? 'selected' : '' }}>Ketertiban Umum</option>
                <option value="Fasilitas Umum" {{ old('kategori') == 'Fasilitas Umum' ? 'selected' : '' }}>Fasilitas Umum</option>
                <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('kategori')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="lokasi">Lokasi Kejadian *</label>
            <input
                type="text"
                id="lokasi"
                name="lokasi"
                value="{{ old('lokasi') }}"
                placeholder="Contoh: Jalan Melati, RT 02/RW 03"
                required
            >
            @error('lokasi')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="waktu_kejadian">Waktu Kejadian (opsional)</label>
            <input
                type="datetime-local"
                id="waktu_kejadian"
                name="waktu_kejadian"
                value="{{ old('waktu_kejadian') }}"
            >
            <p class="hint">
                Boleh dikosongkan jika waktu kejadian tidak diketahui.
            </p>
            @error('waktu_kejadian')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="isi_laporan">Isi Laporan *</label>
            <textarea
                id="isi_laporan"
                name="isi_laporan"
                placeholder="Jelaskan masalah yang terjadi, kondisi saat ini, dan dampaknya bagi warga..."
                required
            >{{ old('isi_laporan') }}</textarea>
            <p class="hint">
                Minimal 10 karakter. Sertakan informasi yang relevan dan
                mudah dipahami.
            </p>
            @error('isi_laporan')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="buttons">
                <a href="{{ route('dashboard') }}" class="back">Batal</a>
                <button type="submit">Kirim Pengaduan</button>
            </div>
        </form>
    </section>
</main>
</body>
</html>

