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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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

        /* CONTENT */
        .content {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 14px
        }

        /* WELCOME HERO */
        .hero {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 16px
        }

        .hero-av-wrap {
            position: relative;
            flex-shrink: 0
        }

        .hero-av {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold3));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 700;
            color: var(--black);
            font-family: var(--bebas);
            border: 2px solid var(--gold2)
        }

        .hero-dot {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            background: var(--green);
            border-radius: 50%;
            border: 2px solid var(--card)
        }

        .hero-info {
            flex: 1;
            min-width: 0
        }

        .hero-greeting {
            font-size: 11px;
            color: var(--muted);
            margin-bottom: 2px
        }

        .hero-name {
            font-family: var(--bebas);
            font-size: 26px;
            color: var(--white);
            letter-spacing: 1.5px;
            line-height: 1
        }

        .hero-role {
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px
        }

        .hero-stars {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px
        }

        .stars {
            color: var(--gold);
            font-size: 12px;
            letter-spacing: 1px
        }

        .hero-rating {
            font-size: 11px;
            color: var(--muted)
        }

        .profile-badge {
            background: rgba(0, 255, 135, 0.1);
            border: 1px solid rgba(0, 255, 135, 0.2);
            color: var(--green);
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 4px
        }

        .hero-stats {
            display: flex;
            gap: 10px;
            margin-left: auto;
            flex-shrink: 0
        }

        .hstat {
            background: rgba(245, 197, 24, 0.07);
            border: 1px solid rgba(245, 197, 24, 0.15);
            border-radius: 10px;
            padding: 10px 16px;
            text-align: center;
            min-width: 72px
        }

        .hstat-num {
            font-family: var(--bebas);
            font-size: 22px;
            color: var(--gold);
            line-height: 1
        }

        .hstat-lbl {
            font-size: 9px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-top: 2px
        }

        /* STAT CARDS */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px
        }

        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 10px
        }

        .stat-label {
            font-size: 10px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .8px
        }

        .stat-icon {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: rgba(245, 197, 24, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .stat-icon i {
            color: var(--gold);
            font-size: 15px
        }

        .stat-icon.green-icon {
            background: rgba(0, 255, 135, 0.1)
        }

        .stat-icon.green-icon i {
            color: var(--green)
        }

        .stat-num {
            font-family: var(--bebas);
            font-size: 28px;
            color: var(--white);
            letter-spacing: 1px;
            line-height: 1
        }

        .stat-trend {
            font-size: 10px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 3px
        }

        .t-green {
            color: var(--green)
        }

        .t-gold {
            color: var(--gold)
        }

        .t-red {
            color: var(--accent)
        }

        /* PANELS ROW */
        .panels-row {
            display: grid;
            grid-template-columns: 1.55fr 1fr;
            gap: 12px
        }

        .panel {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px
        }

        .panel-title {
            font-family: var(--bebas);
            font-size: 15px;
            color: var(--white);
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .panel-title i {
            color: var(--gold);
            font-size: 15px
        }

        .view-all {
            font-size: 11px;
            color: var(--gold);
            cursor: pointer;
            text-decoration: none
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th {
            font-size: 9px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .8px;
            padding: 0 6px 7px;
            text-align: left;
            border-bottom: 1px solid var(--border)
        }

        td {
            padding: 7px 6px;
            font-size: 11px;
            color: var(--white);
            border-bottom: 1px solid rgba(30, 30, 30, 0.7)
        }

        tr:last-child td {
            border: none
        }

        .pill {
            display: inline-flex;
            align-items: center;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 500;
            white-space: nowrap
        }

        .p-green {
            background: rgba(0, 255, 135, 0.1);
            color: var(--green);
            border: 1px solid rgba(0, 255, 135, 0.2)
        }

        .p-gold {
            background: rgba(245, 197, 24, 0.1);
            color: var(--gold);
            border: 1px solid rgba(245, 197, 24, 0.2)
        }

        .p-red {
            background: rgba(255, 77, 0, 0.1);
            color: var(--accent);
            border: 1px solid rgba(255, 77, 0, 0.2)
        }

        .p-muted {
            background: rgba(122, 122, 122, 0.1);
            color: var(--muted);
            border: 1px solid var(--border)
        }

        .act-link {
            color: var(--gold);
            font-size: 11px;
            cursor: pointer;
            text-decoration: none
        }

        .act-link:hover {
            text-decoration: underline
        }

        /* STATUS BARS */
        .status-bars {
            display: flex;
            flex-direction: column;
            gap: 10px
        }

        .sbar-row {
            display: flex;
            flex-direction: column;
            gap: 4px
        }

        .sbar-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 10px
        }

        .sbar-label {
            color: var(--white)
        }

        .sbar-count {
            color: var(--muted)
        }

        .sbar-track {
            background: var(--border);
            border-radius: 4px;
            height: 7px;
            overflow: hidden
        }

        .sbar-fill {
            height: 100%;
            border-radius: 4px
        }

        .fill-green {
            background: var(--green)
        }

        .fill-gold {
            background: var(--gold)
        }

        .fill-muted {
            background: var(--muted)
        }

        .fill-red {
            background: var(--accent)
        }

        .fill-border {
            background: #2e2e2e
        }

        /* BOTTOM 3 PANELS */
        .bottom-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px
        }

        /* INTERVIEW CARDS */
        .interview-card {
            background: rgba(245, 197, 24, 0.04);
            border: 1px solid rgba(245, 197, 24, 0.12);
            border-radius: 9px;
            padding: 10px 12px;
            margin-bottom: 8px
        }

        .interview-card:last-of-type {
            margin-bottom: 10px
        }

        .ic-company {
            font-size: 12px;
            color: var(--white);
            font-weight: 500
        }

        .ic-role {
            font-size: 11px;
            color: var(--muted);
            margin-top: 1px
        }

        .ic-time {
            font-size: 10px;
            color: var(--gold);
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px
        }

        .ic-type {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            background: var(--border);
            color: var(--muted);
            font-size: 9px;
            padding: 2px 7px;
            border-radius: 20px;
            margin-top: 4px
        }

        /* SAVED JOBS */
        .saved-row {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 0;
            border-bottom: 1px solid rgba(30, 30, 30, 0.7)
        }

        .saved-row:last-of-type {
            border: none
        }

        .saved-icon {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            background: rgba(245, 197, 24, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .saved-icon i {
            color: var(--gold);
            font-size: 14px
        }

        .saved-title {
            font-size: 12px;
            color: var(--white)
        }

        .saved-gym {
            font-size: 10px;
            color: var(--muted)
        }

        .saved-salary {
            font-size: 10px;
            color: var(--gold);
            margin-left: auto;
            white-space: nowrap
        }

        .bm-icon {
            color: var(--gold);
            font-size: 14px;
            margin-left: 6px;
            flex-shrink: 0
        }

        /* PROFILE STRENGTH */
        .strength-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 12px
        }

        .strength-ring {
            position: relative;
            width: 72px;
            height: 72px
        }

        .strength-svg {
            width: 72px;
            height: 72px;
            transform: rotate(-90deg)
        }

        .ring-track {
            fill: none;
            stroke: var(--border);
            stroke-width: 6
        }

        .ring-fill {
            fill: none;
            stroke: var(--gold);
            stroke-width: 6;
            stroke-linecap: round;
            stroke-dasharray: 188.5;
            stroke-dashoffset: 15.1;
            transition: stroke-dashoffset .5s
        }

        .strength-pct {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: var(--bebas);
            font-size: 18px;
            color: var(--gold);
            line-height: 1
        }

        .checklist {
            display: flex;
            flex-direction: column;
            gap: 7px
        }

        .check-row {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 11px
        }

        .check-row.done {
            color: var(--white)
        }

        .check-row.pending {
            color: var(--muted)
        }

        .check-row i {
            font-size: 14px;
            flex-shrink: 0
        }

        .check-row.done i {
            color: var(--green)
        }

        .check-row.pending i {
            color: var(--border)
        }

        .strength-bar-wrap {
            margin-top: 10px
        }

        .strength-track {
            background: var(--border);
            border-radius: 4px;
            height: 5px;
            overflow: hidden
        }

        .strength-fill {
            height: 100%;
            width: 92%;
            background: var(--gold);
            border-radius: 4px
        }

        .strength-tip {
            font-size: 10px;
            color: var(--muted);
            margin-top: 5px;
            font-style: italic
        }

        /* RECOMMENDED */
        .rec-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px
        }

        .rec-title {
            font-family: var(--bebas);
            font-size: 17px;
            color: var(--white);
            letter-spacing: 1.5px
        }

        .rec-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px
        }

        .job-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .new-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--gold);
            color: var(--black);
            font-size: 9px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
            letter-spacing: .5px
        }

        .jc-top {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .jc-logo {
            width: 32px;
            height: 32px;
            border-radius: 7px;
            background: rgba(245, 197, 24, 0.1);
            border: 1px solid rgba(245, 197, 24, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .jc-logo i {
            color: var(--gold);
            font-size: 15px
        }

        .jc-title {
            font-size: 12px;
            color: var(--white);
            font-weight: 500;
            line-height: 1.3
        }

        .jc-gym {
            font-size: 10px;
            color: var(--muted)
        }

        .jc-salary {
            font-family: var(--bebas);
            font-size: 15px;
            color: var(--gold);
            letter-spacing: .5px
        }

        .jc-loc {
            font-size: 10px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 3px
        }

        .jc-loc i {
            font-size: 11px
        }

        .jc-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 4px
        }

        .jtag {
            background: rgba(122, 122, 122, 0.1);
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: 9px;
            padding: 2px 7px;
            border-radius: 20px
        }

        .btn-apply {
            background: var(--gold);
            color: var(--black);
            font-family: var(--bebas);
            font-size: 13px;
            letter-spacing: 1px;
            border: none;
            border-radius: 7px;
            padding: 6px 0;
            width: 100%;
            cursor: pointer;
            margin-top: auto
        }

        .btn-primary-cta {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 5px 8px;
            background: var(--accent);
            color: var(--white);
            font-family: var(--fira-sans);
            font-weight: 400;
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 2px;
            overflow: hidden;
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
            <a class="nav-item" href="/admin/benefit"><i class="ti ti-gift"></i> Benefit</a>
            <a class="nav-item" href="/admin/required-documents"><i class="ti ti-folder"></i> Required Documents</a>
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
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {!! Toastr::message() !!}
</body>

</html>
