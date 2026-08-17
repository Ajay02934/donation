<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Donation')</title>
    <style>
        :root { font-family: Inter, ui-sans-serif, system-ui, sans-serif; color: #18251f; background: #f5f8f4; }
        * { box-sizing: border-box; } body { margin: 0; } a { color: #1f6a47; } button, input, textarea { font: inherit; }
        .nav { background: #fff; border-bottom: 1px solid #e5ebe6; } .nav-inner { max-width: 1050px; margin: auto; padding: 16px 24px; display: flex; justify-content: space-between; align-items: center; }
        .brand { color:#1f6a47; font-weight:800; font-size: 1.2rem; text-decoration:none; } .container { max-width:1050px; margin:0 auto; padding:42px 24px; }
        .card { background:#fff; border:1px solid #e1e9e3; border-radius:14px; padding:28px; box-shadow: 0 8px 28px rgba(22,50,32,.06); }
        .auth-card { max-width:540px; margin:30px auto; } h1 { margin-top:0; font-size:2rem; } h2 { margin-top:0; font-size:1.25rem; }
        label { display:block; margin:16px 0 6px; font-weight:650; font-size:.92rem; } input, textarea { width:100%; border:1px solid #cdd9d0; border-radius:8px; padding:11px 12px; background:#fff; } textarea { min-height:85px; resize:vertical; }
        .check { display:flex; gap:9px; align-items:flex-start; margin-top:18px; font-size:.9rem; } .check input { width:auto; margin-top:3px; }
        .button { display:inline-block; border:0; background:#23724d; color:white; padding:11px 18px; border-radius:8px; cursor:pointer; font-weight:700; text-decoration:none; } .button:hover { background:#195c3d; } .button.secondary { background:#e9f2eb; color:#205e40; }
        .button.full { width:100%; margin-top:22px; } .alert { padding:12px 15px; border-radius:8px; margin-bottom:18px; } .success { background:#e6f6e9; color:#1d6537; } .warning { background:#fff5da; color:#715300; } .errors { background:#fff0f0; color:#a42a2a; } .errors ul { margin:0; padding-left:20px; } .field-error { display:block; color:#b42318; font-size:.82rem; margin-top:5px; } .invalid { border-color:#d92d20; }
        .grid { display:grid; grid-template-columns: 1fr 1.25fr; gap:24px; } .stat { font-size:2.3rem; font-weight:800; color:#23724d; margin:5px 0; } .muted { color:#64756a; } .profile dl { margin:0; } .profile dt { font-size:.8rem; color:#65766b; margin-top:15px; text-transform:uppercase; letter-spacing:.04em; } .profile dd { margin:4px 0 0; font-weight:600; }
        table { width:100%; border-collapse:collapse; } th, td { text-align:left; padding:12px 8px; border-bottom:1px solid #edf1ee; } th { color:#66756b; font-size:.78rem; text-transform:uppercase; } .badge { font-size:.75rem; font-weight:800; border-radius:99px; padding:5px 8px; text-transform:uppercase; } .paid { background:#e5f6e9; color:#25713f; } .pending { background:#fff4d8; color:#856000; } .failed { background:#ffe8e8; color:#a33030; }
        .top-actions { display:flex; align-items:center; gap:12px; } .logout { border:0; background:none; color:#8a3d3d; cursor:pointer; } .amount { font-size:1.1rem; font-weight:800; } @media(max-width:750px) { .grid { grid-template-columns:1fr; } .container { padding:24px 16px; } .nav-inner { padding:14px 16px; } }
    </style>
</head>
<body>
<nav class="nav"><div class="nav-inner"><a class="brand" href="{{ auth()->check() ? route('dashboard') : route('login') }}">Donation</a>@auth <div class="top-actions"><span class="muted">{{ auth()->user()->name }}</span><form method="POST" action="{{ route('logout') }}">@csrf<button class="logout">Log out</button></form></div>@endauth</div></nav>
<main class="container">
    @if(session('success')) <div class="alert success">{{ session('success') }}</div> @endif
    @if(session('warning')) <div class="alert warning">{{ session('warning') }}</div> @endif

    @yield('content')
</main>
</body>
</html>
