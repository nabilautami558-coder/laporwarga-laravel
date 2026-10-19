
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - LaporWarga</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f5fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background: white;
            width: 90%;
            max-width: 430px;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 30px #183b5b18;
        }
        h1 { color: #153c60; margin-bottom: 8px; }
        p { color: #66788a; }
        label { display: block; margin-top: 17px; color: #263e52; }
        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #cbd5df;
            border-radius: 8px;
        }
        button {
            width: 100%;
            margin-top: 24px;
            padding: 13px;
            border: 0;
            border-radius: 8px;
            background: #174c78;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        a { color: #174c78; }
        .error { color: #c62828; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Buat Akun</h1>
        <p>Gabung bersama LaporWarga untuk menyampaikan aspirasi.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Daftar Sekarang</button>
        </form>

        <p style="text-align:center; margin-top:22px;">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </p>
    </div>
</body>
</html>