<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Dashboard') - Bee Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>

<body class="">
    <x-common.navbar />
    <div class="dashboard-header-inner">
        <div class="container mt-5">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-12 col-md-3">
                    <div class="card shadow-sm border-0 rounded-3 h-100 overflow-hidden sidebar-dark-card">

                        <div class="card-body border-bottom border-secondary p-3 flex-grow-0">
                            <div class="d-flex align-items-center gap-2">
                                <div class="navbar-hero-av">
                                    {{ collect(explode(' ', Auth::user()->name))->take(2)->map(fn($word) => strtoupper($word[0]))->implode('') }}
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="card-title mb-0 fw-bold text-white text-truncate">
                                        {{ Auth::user()->name }}</h6>
                                    <small class="text-white-50 text-truncate d-block">Manage your account</small>
                                </div>
                            </div>
                        </div>

                        <div
                            class="list-group list-group-flush flex-grow-1 d-flex flex-column justify-content-betweend-flex flex-column justify-content-between overflow-auto">
                            <div>
                                <a href="/user/profile"
                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="bi bi-person-circle me-3 fs-5"></i> <span>Bee Info Profile</span>
                                </a>

                                <a href="#saved"
                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="bi bi-bookmark-check me-3 fs-5"></i> <span>Saved Jobs</span>
                                </a>

                                <a href="#following"
                                    class="list-group-item list-group-item-action d-flex align-items-center text-nowrap">
                                    <i class="bi bi-people me-3 fs-5"></i> <span>Following Employer</span>
                                </a>

                                <a href="#applied"
                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="bi bi-send-check me-3 fs-5"></i> <span>Applied Jobs</span>
                                </a>

                                <a href="#settings"
                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="bi bi-gear me-3 fs-5"></i> <span>Account Settings</span>
                                </a>
                            </div>

                            <a href="{{ route('logout') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center text-danger logout-item">
                                <i class="bi bi-box-arrow-right me-3 fs-5"></i> <span>Sign Out</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <main class="col-12 col-md-9">
                    @yield('content')
                </main>

            </div>
        </div>
    </div>
    <x-common.footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
</body>

</html>
