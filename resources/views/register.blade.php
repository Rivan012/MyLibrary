<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register - MyLibrary</title>
    <style>
        :root{
            --bg:#f4f7fb;
            --card:#ffffff;
            --accent:#2b6cb0;
            --danger:#e53e3e;
            --muted:#6b7280;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
        body{
            background: linear-gradient(180deg,var(--bg),#fff);
            display:flex;
            align-items:center;
            justify-content:center;
            min-height:100vh;
            margin:0;
            padding:24px;
        }
        .card{
            background:var(--card);
            width:100%;
            max-width:420px;
            padding:28px;
            border-radius:12px;
            box-shadow:0 6px 24px rgba(15,23,42,0.08);
        }
        h1{margin:0 0 16px;font-size:20px;color:#0f172a}
        p.subtitle{margin:0 0 18px;color:var(--muted);font-size:14px}
        label{display:block;font-size:13px;color:#0f172a;margin-bottom:6px}
        input[type="text"],
        input[type="email"],
        input[type="password"]{
            width:100%;
            padding:10px 12px;
            border:1px solid #e6e9ef;
            border-radius:8px;
            margin-bottom:12px;
            font-size:14px;
            box-sizing:border-box;
        }
        input:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px rgba(43,108,176,0.08)}
        .btn{
            width:100%;
            display:inline-block;
            background:var(--accent);
            color:#fff;
            padding:10px 12px;
            border-radius:8px;
            border:none;
            cursor:pointer;
            font-weight:600;
            font-size:15px;
        }
        .oauth-btn{
            width:100%;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            padding:10px 12px;
            border-radius:8px;
            border:1px solid #e6e9ef;
            background:#fff;
            color:#111;
            font-weight:600;
            cursor:pointer;
            text-decoration:none;
            margin-bottom:12px;
        }
        .oauth-logo{width:18px;height:18px;display:inline-block;vertical-align:middle}
        .meta{
            margin-top:12px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:13px;
            color:var(--muted);
        }
        .link{color:var(--accent);text-decoration:none;font-weight:600}
        .error{
            color:var(--danger);
            font-size:13px;
            margin-top:-8px;
            margin-bottom:8px;
        }
        .divider{
            display:flex;
            align-items:center;
            gap:12px;
            margin:14px 0;
            color:var(--muted);
            font-size:13px;
        }
        .divider::before,
        .divider::after{
            content:'';
            flex:1;
            height:1px;
            background:#eef2f7;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <main class="card" role="main" aria-labelledby="registerHeading">
        <h1 id="registerHeading">Buat Akun Baru</h1>
        <p class="subtitle">Isi data di bawah untuk mendaftar. Semua field wajib diisi.</p>

        <form action="{{ route('register.post') }}" method="post" novalidate>
            @csrf

            <!-- Google OAuth button -->
            <a class="oauth-btn" href="{{ route('login.google') }}">
                <svg class="oauth-logo" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill="#4285f4" d="M533.5 278.4c0-18.4-1.6-36-4.6-53.2H272v100.7h146.9c-6.3 34.1-25 62.9-53.6 82.1v68.1h86.6c50.7-46.7 80.6-115.6 80.6-197.7z"/>
                    <path fill="#34a853" d="M272 544.3c72.6 0 133.6-24.1 178.2-65.5l-86.6-68.1c-24.1 16.2-55 25.8-91.6 25.8-70.4 0-130-47.6-151.4-111.6H34.2v69.9C78.5 489.5 168.4 544.3 272 544.3z"/>
                    <path fill="#fbbc04" d="M120.6 327.9c-10.8-32.1-10.8-66.8 0-98.9V159.1H34.2C12.2 199.9 0 244.8 0 292.4s12.2 92.5 34.2 133.3l86.4-97.8z"/>
                    <path fill="#ea4335" d="M272 107.7c39.4 0 74.8 13.6 102.6 40.3l76.9-76.9C405.6 24.9 344.6 0 272 0 168.4 0 78.5 54.8 34.2 139.2l86.4 69.9C142 155.3 201.6 107.7 272 107.7z"/>
                </svg>
                Daftar dengan Google
            </a>

            <div class="divider">atau</div>

            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkap">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="email@contoh.com">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Minimal 6 karakter">
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label for="npm">NPM</label>
            <input id="npm" type="text" name="npm" value="{{ old('npm') }}" placeholder="Nomor Pokok Mahasiswa">
            @error('npm') <div class="error">{{ $message }}</div> @enderror

            @if ($errors->has('error'))
                <div class="error">{{ $errors->first('error') }}</div>
            @endif

            <button class="btn btn-primary" type="submit">Daftar</button>

            <div class="meta">
                <span>Sudah punya akun?</span>
                <a class="link" href="{{ url('/login') }}">Ke halaman login</a>
            </div>
        </form>
    </main>
</body>
</html>