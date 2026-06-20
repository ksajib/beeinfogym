<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee Info Gyms</title>
    <meta name="description" content="Your website description here">
    <meta name="keywords" content="web, laravel, design, development">
    <meta name="author" content="Naimul Islam">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>

<body>
    <!-- ── PRELOADER ── -->
    {{-- <div id="loader">
        <div class="icon"></div>
    </div> --}}

    <div id="preloader">
        <img src="{{ asset('images/favicon.svg') }}" alt="Loading" class="loader-logo">
    </div>

    <!-- ── BACK TO TOP ── -->
    <button id="back-to-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="bi bi-arrow-up"></i>
    </button>

    <x-common.navbar />
    <div id="toast-container"></div>

    @yield('content')

    <x-common.footer />
    <x-common.cookies />

    <script src="https://unpkg.com/lottie-web/build/player/lottie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // -- ── IMAGE MASONRY GALLERY ── --
        const galleryItems = document.querySelectorAll('.masonry-item img, .gallery-preview');
        const modalImage = document.getElementById('modalImage');

        const imageModal = new bootstrap.Modal(
            document.getElementById('imagePreviewModal')
        );

        galleryItems.forEach((img) => {
            img.addEventListener('click', () => {
                modalImage.src = img.src;
                imageModal.show();
            });
        });
    </script>
    <script>
        // -- ── VIDEO GALLERY ── --
        const videoCards = document.querySelectorAll('.video-card');
        const youtubeVideo = document.getElementById('youtubeVideo');
        const videoModal = new bootstrap.Modal(
            document.getElementById('videoModal')
        );

        videoCards.forEach((card) => {
            card.addEventListener('click', () => {
                document.activeElement.blur();
                const videoId = card.getAttribute('data-video');
                youtubeVideo.src =
                    `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                videoModal.show();
            });
        });

        document
            .getElementById('videoModal')
            .addEventListener('hidden.bs.modal', () => {
                youtubeVideo.src = '';
            });
    </script>
    <script>
        // -- ── SHORT VIDEO GALLERY ── --
        const shortModalEl = document.getElementById('shortvideoModal');
        const shortModal = new bootstrap.Modal(shortModalEl);
        const shortFrame = document.getElementById("videoFrame");

        function openVideo(videoId) {
            shortFrame.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            shortModal.show();
        }

        // stop video when modal closes
        shortModalEl.addEventListener('hidden.bs.modal', function() {
            shortFrame.src = "";
        });
    </script>
    <script>
        /* ── MOVE SHORTS ── */
        const track = document.getElementById("shortsTrack");

        let index = 0;

        function getVisibleItems() {
            if (window.innerWidth >= 992) return 4;
            if (window.innerWidth >= 768) return 3;
            return 1;
        }

        function moveShorts(direction) {
            if (!track) return;

            const items = document.querySelectorAll(".shorts-item");
            if (!items.length) return;

            const visible = getVisibleItems();

            index += direction;

            const maxIndex = items.length - visible;

            if (index < 0) index = 0;
            if (index > maxIndex) index = maxIndex;

            const itemWidth = items[0].offsetWidth + 12;

            track.style.transform = `translateX(-${index * itemWidth}px)`;
        }

        window.addEventListener("resize", () => {
            if (!track) return;

            index = 0;
            track.style.transform = "translateX(0px)";
        });

        window.addEventListener("resize", () => {
            index = 0;
            track.style.transform = "translateX(0px)";
        });
    </script>
    <script>
        (function() {
            var banner = document.getElementById('cookieBanner');
            var consent = localStorage.getItem('beeinfo_cookie_consent');

            if (!consent) {
                // Slight delay so it doesn't flash immediately on load
                setTimeout(function() {
                    banner.style.display = 'block';
                    // Slide-in animation
                    banner.style.transform = 'translateY(100%)';
                    banner.style.transition = 'transform 0.4s cubic-bezier(0.22, 1, 0.36, 1)';
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            banner.style.transform = 'translateY(0)';
                        });
                    });
                }, 1200);
            }

            function dismissBanner(value) {
                localStorage.setItem('beeinfo_cookie_consent', value);
                banner.style.transform = 'translateY(100%)';
                setTimeout(function() {
                    banner.style.display = 'none';
                }, 420);
            }

            document.getElementById('cookieAccept').addEventListener('click', function() {
                dismissBanner('accepted');
            });

            document.getElementById('cookieDecline').addEventListener('click', function() {
                dismissBanner('declined');
            });
        })();
    </script>
    <script>
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('preloader').style.display = 'none';
            }, 2000); // 2000ms = 2 seconds
        });
    </script>
    <script>
        function showToast(type, title, message) {
            const container = document.getElementById("toast-container");

            const toast = document.createElement("div");
            toast.className = `toast toast-${type}`;

            toast.innerHTML = `
        <div>
            <h4>${title}</h4>
            <p>${message}</p>
        </div>
        <button onclick="this.parentElement.remove()">×</button>
    `;

            container.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    </script>
    @vite(['resources/js/app.js'])
</body>

</html>
