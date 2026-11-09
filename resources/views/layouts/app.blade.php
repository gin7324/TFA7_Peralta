<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'AetherWorkz') }}</title>
        <style>
            :root {
                --bg: #f7f7fb;
                --panel: #ffffff;
                --text: #1f2937;
                --muted: #6b7280;
                --accent: #3b82f6;
                --accent-dark: #1d4ed8;
                --danger: #ef4444;
                --line: #e5e7eb;
            }

            * { box-sizing: border-box; }
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                background: var(--bg);
                color: var(--text);
            }
            .topbar {
                background: #111827;
                color: white;
                padding: 1rem 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .brand {
                font-size: 1.4rem;
                font-weight: bold;
                letter-spacing: 0.04em;
            }
            .nav {
                display: flex;
                gap: 1rem;
            }
            .nav a {
                color: #dbeafe;
                text-decoration: none;
                font-weight: 600;
            }
            main {
                max-width: 1100px;
                margin: 2rem auto;
                padding: 0 1rem 2rem;
            }
            .card {
                background: var(--panel);
                border: 1px solid var(--line);
                border-radius: 14px;
                box-shadow: 0 10px 25px rgba(15, 23, 42, 0.04);
                padding: 1.5rem;
            }
            .page-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.25rem;
            }
            .page-head h1 {
                margin: 0;
                font-size: 2rem;
            }
            .button {
                display: inline-block;
                background: var(--accent);
                color: white;
                text-decoration: none;
                border: none;
                border-radius: 8px;
                padding: 0.72rem 1rem;
                font-weight: 600;
                cursor: pointer;
            }
            .button.secondary {
                background: #e5e7eb;
                color: var(--text);
            }
            .button.danger {
                background: var(--danger);
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 0.85rem 0.75rem;
                border-bottom: 1px solid var(--line);
                text-align: left;
            }
            th {
                color: var(--muted);
                font-size: 0.8rem;
                text-transform: uppercase;
                letter-spacing: 0.04em;
            }
            .actions {
                display: flex;
                gap: 0.5rem;
            }
            .field {
                margin-bottom: 1rem;
            }
            label {
                display: block;
                margin-bottom: 0.45rem;
                font-weight: 600;
            }
            input, button {
                font: inherit;
            }
            input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
                width: 100%;
                padding: 0.7rem 0.85rem;
                border: 1px solid var(--line);
                border-radius: 8px;
                background: white;
            }
            .error {
                color: var(--danger);
                font-size: 0.84rem;
                margin-top: 0.35rem;
            }
            .success {
                margin-bottom: 1rem;
                padding: 0.75rem 1rem;
                border-radius: 8px;
                background: #dcfce7;
                color: #166534;
                border: 1px solid #bbf7d0;
            }
            .avatar {
                width: 52px;
                height: 52px;
                object-fit: cover;
                border-radius: 50%;
                border: 2px solid #e5e7eb;
                background: #f3f4f6;
            }
            .meta {
                color: var(--muted);
                font-size: 0.9rem;
            }
        </style>
    </head>
    <body>
        <header class="topbar">
            <div class="brand">AetherWorkz</div>
            <nav class="nav">
                <a href="{{ route('users.index') }}">User Accounts</a>
                <a href="{{ route('customers.index') }}">Customers</a>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>
    </body>
</html>
