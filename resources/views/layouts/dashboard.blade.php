<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee Info – My Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --black: #060606;
            --dark: #0f0f0f;
            --card: #141414;
            --border: #1e1e1e;
            --gold: #f5c518;
            --gold2: #e6b000;
            --gold3: #c49500;
            --white: #efefef;
            --muted: #7a7a7a;
            --accent: #ff4d00;
            --green: #00ff87;
            --bebas: "Bebas Neue", sans-serif;
            --fira: "Fira Sans", sans-serif;
        }

        body {
            background: var(--black);
            color: var(--white);
            font-family: var(--fira);
            font-size: 13px;
            display: flex;
            height: 100vh;
            overflow: hidden
        }

        .modal-backdrop.show {
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            background: rgba(0, 0, 0, 0.4);
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px
        }

        ::-webkit-scrollbar-track {
            background: var(--dark)
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 2px
        }

        /* SIDEBAR */
        .sidebar {
            width: 300px;
            min-width: 200px;
            background: var(--dark);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            overflow-y: auto
        }

        .logo {
            padding: 16px 14px 12px;
            border-bottom: 1px solid var(--border)
        }

        .logo-title {
            font-family: var(--bebas);
            font-size: 20px;
            color: var(--gold);
            letter-spacing: 2px
        }

        .logo-sub {
            font-size: 9px;
            color: var(--muted);
            letter-spacing: 1.5px;
            margin-top: 1px
        }

        .nav-section {
            padding: 10px 0 2px
        }

        .nav-label {
            padding: 0 14px 5px;
            font-size: 12px;
            color: var(--muted);
            letter-spacing: 1.5px;
            text-transform: uppercase
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            color: var(--muted);
            font-size: 14px;
            border-left: 3px solid transparent;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s
        }

        .nav-item:hover {
            color: var(--white);
            background: rgba(255, 255, 255, 0.03)
        }

        .nav-item.active {
            color: var(--gold);
            border-left-color: var(--gold);
            background: rgba(245, 197, 24, 0.06)
        }

        .nav-item i {
            font-size: 15px;
            flex-shrink: 0
        }

        .nav-badge {
            margin-left: auto;
            background: var(--accent);
            color: #fff;
            font-size: 9px;
            padding: 1px 5px;
            border-radius: 10px;
            font-weight: 600
        }

        .sidebar-foot {
            margin-top: auto;
            padding: 12px 14px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 8px
        }

        .foot-av {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: var(--black);
            font-family: var(--bebas);
            flex-shrink: 0;
            position: relative
        }

        .foot-dot {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background: var(--green);
            border-radius: 50%;
            border: 2px solid var(--dark)
        }

        .foot-name {
            font-size: 11px;
            color: var(--white);
            font-weight: 500;
            line-height: 1.3
        }

        .foot-role {
            font-size: 10px;
            color: var(--muted)
        }

        /* MAIN */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            min-width: 0
        }

        /* TOPBAR */
        .topbar {
            background: var(--dark);
            border-bottom: 1px solid var(--border);
            padding: 0 18px;
            height: 48px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0
        }

        .portal-label {
            font-size: 10px;
            color: var(--muted);
            letter-spacing: 1.5px;
            text-transform: uppercase
        }

        .breadcrumb-sep {
            color: var(--border);
            margin: 0 4px
        }

        .breadcrumb-active {
            font-size: 11px;
            color: var(--gold);
            letter-spacing: 1px;
            text-transform: uppercase;
            font-family: var(--bebas)
        }

        .topbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .search-box {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 7px;
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 0 10px;
            height: 32px;
            width: 200px
        }

        .search-box i {
            color: var(--muted);
            font-size: 14px
        }

        .search-box input {
            background: none;
            border: none;
            outline: none;
            color: var(--white);
            font-size: 11px;
            font-family: var(--fira);
            width: 100%
        }

        .search-box input::placeholder {
            color: var(--muted)
        }

        .notif-btn {
            position: relative;
            width: 32px;
            height: 32px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0
        }

        .notif-btn i {
            color: var(--muted);
            font-size: 15px
        }

        .notif-dot {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 7px;
            height: 7px;
            background: var(--accent);
            border-radius: 50%;
            border: 2px solid var(--dark)
        }

        .btn-gold {
            background: var(--gold);
            color: var(--black);
            font-family: var(--bebas);
            font-size: 13px;
            letter-spacing: 1px;
            border: none;
            border-radius: 7px;
            padding: 0 14px;
            height: 32px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap
        }

        .btn-gold i {
            font-size: 13px
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="logo">
            <div class="logo-title">Bee Info</div>
            <div class="logo-sub">JOB PORTAL</div>
        </div>

        <div class="nav-section">
            <div class="nav-label">My Profile</div>
            <a class="nav-item active" href="#"><i class="ti ti-layout-dashboard"></i> My Dashboard</a>
            <a class="nav-item" href="/admin/post-jobs"><i class="ti ti-file-text"></i> Post Jobs <span
                    class="nav-badge">3</span></a>
            <a class="nav-item" href="/admin/skill"><i class="ti ti-bulb"></i> Skill</a>
            <a class="nav-item" href="#"><i class="ti ti-file-cv"></i> My Resume</a>
        </div>

        <div class="nav-section">
            <div class="nav-label">Explore</div>
            <a class="nav-item" href="#"><i class="ti ti-search"></i> Find Jobs</a>
            <a class="nav-item" href="#"><i class="ti ti-barbell"></i> Top Trainers</a>
            <a class="nav-item" href="#"><i class="ti ti-building"></i> Gym Directory</a>
        </div>

        <div class="nav-section">
            <div class="nav-label">Account</div>
            <a class="nav-item" href="#"><i class="ti ti-bell"></i> Notifications <span
                    class="nav-badge">3</span></a>
            <a class="nav-item" href="#"><i class="ti ti-settings"></i> Settings</a>
            <a href="{{ route('logout') }}" class="nav-item"><i class="ti ti-logout"></i> Logout</a>
        </div>

        <div class="sidebar-foot">
            <div class="foot-av">
                {{ collect(explode(' ', Auth::user()->name))->take(2)->map(fn($word) => strtoupper($word[0]))->implode('') }}
                <div class="foot-dot"></div>
            </div>
            <div>
                <div class="foot-name">
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                </div>
                <div class="foot-role">Yoga Trainer</div>
            </div>
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <span class="portal-label">Portal</span>
            <span class="breadcrumb-sep">›</span>
            <span class="breadcrumb-active">My Dashboard</span>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="ti ti-search"></i>
                    <input type="text" placeholder="Search jobs, trainers...">
                </div>
                <div class="notif-btn"><i class="ti ti-bell"></i>
                    <div class="notif-dot"></div>
                </div>
                <button class="btn-gold"><i class="ti ti-plus"></i> APPLY FOR JOB</button>
            </div>
        </header>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
