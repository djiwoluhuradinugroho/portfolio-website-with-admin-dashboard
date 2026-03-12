<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Get Started</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f0f0;
            font-family: 'Sora', sans-serif;
        }

        .card {
            display: flex;
            width: 900px;
            min-height: 580px;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 8px 64px rgba(0,0,0,0.12);
        }

        /* LEFT PANEL */
        .left-panel {
            width: 42%;
            background: #0d0d0d;
            padding: 44px 36px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            width: 280px; height: 280px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
            bottom: -60px; right: -60px;
        }

        .corner-mark {
            position: absolute;
            top: 20px; right: 20px;
            width: 32px; height: 32px;
            border-top: 2px solid rgba(255,255,255,0.15);
            border-right: 2px solid rgba(255,255,255,0.15);
            border-radius: 0 6px 0 0;
        }

        .panel-top { position: relative; z-index: 1; }

        .panel-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 100px;
            padding: 5px 12px;
            color: rgba(255,255,255,0.5);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .panel-badge::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #fff;
            opacity: 0.6;
        }

        .panel-headline {
            color: #fff;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.3;
        }

        .panel-headline span {
            color: rgba(255,255,255,0.35);
        }

        .panel-bottom {
            position: relative;
            z-index: 1;
        }

        /* RIGHT PANEL */
        .right-panel {
            flex: 1;
            padding: 36px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fafafa !important;
            color-scheme: light;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: #0d0d0d;
            margin-bottom: 6px;
            letter-spacing: -0.02em;
        }

        .form-subtitle {
            font-size: 13.5px;
            color: #999;
            margin-bottom: 22px;
        }

        .fields-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 16px;
        }

        .field-group { margin-bottom: 15px; }
        .field-group.full { grid-column: 1 / -1; }

        .field-label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: #333;
            margin-bottom: 7px;
            letter-spacing: 0.01em;
        }

        .field-input {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #e2e2e2 !important;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Sora', sans-serif;
            color: #111 !important;
            background: #fff !important;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none;
        }
        .field-input:focus {
            border-color: #111 !important;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.06);
        }
        .field-input.has-error { border-color: #e74c3c !important; }

        .password-wrapper { position: relative; }
        .password-wrapper .field-input { padding-right: 42px; }
        .toggle-pw {
            position: absolute;
            right: 13px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: #bbb;
            display: flex; align-items: center;
            transition: color 0.2s;
        }
        .toggle-pw:hover { color: #555; }

        .error-text {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        .btn-primary {
            width: 100%;
            padding: 13px;
            background: #0d0d0d;
            color: #fff;
            font-size: 14.5px;
            font-weight: 600;
            font-family: 'Sora', sans-serif;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
            margin-top: 4px;
            letter-spacing: 0.01em;
        }
        .btn-primary:hover {
            background: #222;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.18);
        }
        .btn-primary:active { transform: translateY(0); box-shadow: none; }

        .login-row {
            text-align: center;
            margin-top: 16px;
            font-size: 13px;
            color: #999;
        }
        .login-row a {
            color: #0d0d0d;
            font-weight: 600;
            text-decoration: none;
        }
        .login-row a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="card">
    <!-- LEFT PANEL -->
    <div class="left-panel">
        <div class="corner-mark"></div>

        <div class="panel-top">
            <div class="panel-badge">New Account</div>
            <h1 class="panel-headline">
                Join and start<br>
                managing your<br>
                <span>commissions.</span>
            </h1>
        </div>

        <div class="panel-bottom">
            <p style="color:rgba(255,255,255,0.2);font-size:12px;font-weight:500;letter-spacing:0.08em;text-transform:uppercase;">Shxttyjiro © 2026</p>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
        <h2 class="form-title">Create account</h2>
        <p class="form-subtitle">Fill in the details below to get started.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="fields-grid">
                <!-- Name -->
                <div class="field-group full">
                    <label class="field-label" for="name">Full name</label>
                    <input
                        id="name"
                        class="field-input {{ $errors->has('name') ? 'has-error' : '' }}"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your name..."
                        required
                        autofocus
                        autocomplete="name"
                    >
                    @error('name')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="field-group full">
                    <label class="field-label" for="email">Email address</label>
                    <input
                        id="email"
                        class="field-input {{ $errors->has('email') ? 'has-error' : '' }}"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@shxttyjiro.com"
                        required
                        autocomplete="username"
                    >
                    @error('email')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="field-group">
                    <label class="field-label" for="password">Password</label>
                    <div class="password-wrapper">
                        <input
                            id="password"
                            class="field-input {{ $errors->has('password') ? 'has-error' : '' }}"
                            type="password"
                            name="password"
                            placeholder="••••••••••••"
                            required
                            autocomplete="new-password"
                        >
                        <button type="button" class="toggle-pw" onclick="togglePassword('password', this)">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="field-group">
                    <label class="field-label" for="password_confirmation">Confirm password</label>
                    <div class="password-wrapper">
                        <input
                            id="password_confirmation"
                            class="field-input"
                            type="password"
                            name="password_confirmation"
                            placeholder="••••••••••••"
                            required
                            autocomplete="new-password"
                        >
                        <button type="button" class="toggle-pw" onclick="togglePassword('password_confirmation', this)">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-primary">Create Account →</button>

            <p class="login-row">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </form>
    </div>
</div>

<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
        btn.innerHTML = '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
    } else {
        input.type = 'password';
        btn.innerHTML = '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
    }
}
</script>
</body>
</html>