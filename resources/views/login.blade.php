<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <style>
        :root {
            --accent: #1a73e8;
            --danger: #e53935;
            --muted: #666;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: #f5f7fb;
            margin: 0;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            background: #fff;
            padding: 28px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(20, 30, 40, .08);
            width: 360px;
        }

        h2 {
            margin: 0 0 14px;
            font-size: 20px;
            color: #111;
        }

        label {
            display: block;
            margin-top: 10px;
            font-size: 13px;
            color: var(--muted);
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #d7dbe0;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .actions {
            margin-top: 16px;
            display: flex;
            gap: 8px;
            align-items: center;
        }

        button.primary {
            background: var(--accent);
            color: #fff;
            border: 0;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer;
            flex: 1;
        }

        .oauth-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            border: 1px solid #d7dbe0;
            padding: 8px 10px;
            border-radius: 6px;
            color: #111;
            background: #fff;
        }

        .oauth-logo {
            width: 18px;
            height: 18px;
            display: block;
        }

        .muted-link {
            font-size: 13px;
            color: var(--muted);
            text-decoration: none;
        }

        .error {
            color: var(--danger);
            font-size: 13px;
            margin-top: 6px;
        }

        .flash {
            padding: 8px 10px;
            border-radius: 6px;
            background: #e9f7ef;
            color: #065f46;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .errors-list {
            background: #fff5f5;
            border: 1px solid #f3c2c2;
            padding: 8px 10px;
            border-radius: 6px;
            color: var(--danger);
            margin-bottom: 10px;
            font-size: 13px;
        }

        .small {
            font-size: 13px;
            color: var(--muted);
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .oauth-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #e6e9ef;
            background: #fff;
            color: #111;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 12px;
        }

        .oauth-logo {
            width: 18px;
            height: 18px;
            display: inline-block;
            vertical-align: middle
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 14px 0;
            color: var(--muted);
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #eef2f7;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <main class="card" role="main" aria-labelledby="loginTitle">
        <h2 id="loginTitle">Masuk ke akun Anda</h2>

        @if (session('status'))
            <div class="flash" role="status">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="errors-list" role="alert">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors-list" role="alert">
                <strong>Terdapat kesalahan:</strong>
                <ul style="margin:6px 0 0 18px; padding:0;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" novalidate>
            @csrf

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                autofocus aria-describedby="emailHelp">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Kata sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="small">
                <label style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat saya
                </label>
            </div>

            <div class="actions">
                <button type="submit" class="primary">Masuk</button>
            </div>
            <div class="divider">atau</div>

            <div class="text-center mt-2">
                <a class="oauth-btn" href="{{ route('login.google') }}" aria-label="Masuk dengan Google">
                    <svg class="oauth-logo" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path fill="#4285f4"
                            d="M533.5 278.4c0-18.4-1.6-36-4.6-53.2H272v100.7h146.9c-6.3 34.1-25 62.9-53.6 82.1v68.1h86.6c50.7-46.7 80.6-115.6 80.6-197.7z" />
                        <path fill="#34a853"
                            d="M272 544.3c72.6 0 133.6-24.1 178.2-65.5l-86.6-68.1c-24.1 16.2-55 25.8-91.6 25.8-70.4 0-130-47.6-151.4-111.6H34.2v69.9C78.5 489.5 168.4 544.3 272 544.3z" />
                        <path fill="#fbbc04"
                            d="M120.6 327.9c-10.8-32.1-10.8-66.8 0-98.9V159.1H34.2C12.2 199.9 0 244.8 0 292.4s12.2 92.5 34.2 133.3l86.4-97.8z" />
                        <path fill="#ea4335"
                            d="M272 107.7c39.4 0 74.8 13.6 102.6 40.3l76.9-76.9C405.6 24.9 344.6 0 272 0 168.4 0 78.5 54.8 34.2 139.2l86.4 69.9C142 155.3 201.6 107.7 272 107.7z" />
                    </svg>
                    Google
                </a>
            </div>
        </form>

        <p style="margin-top:14px; text-align:center;">
            Belum punya akun? <a href="{{ url('/register') }}">Daftar</a>
        </p>
    </main>
</body>

</html>