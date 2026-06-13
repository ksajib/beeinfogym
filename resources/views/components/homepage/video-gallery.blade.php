<div>
    <section id="video" class="section-pad" style="background: var(--dark)">
        <div class="container px-0">

            <div class="text-center mx-auto mb-5" style="max-width: 560px">
                <div class="cheadline cheadline-center">See It In Action</div>
                <h2 class="section-title text-light">Watch how beeinfo works</h2>
            </div>

            <!-- ── VIDEO SHORTS ── -->
            <div id="shortsCarousel" class="shorts-carousel-wrapper">

                <button class="nav prev" onclick="moveShorts(-1)">
                    <i class="bi bi-arrow-left-short"></i>
                </button>

                <div class="shorts-track" id="shortsTrack">

                    <div class="shorts-item" onclick="openVideo('cUgCxsxToZY')">
                        <img src="https://img.youtube.com/vi/cUgCxsxToZY/hqdefault.jpg" />
                        <div class="video-overlay">
                            <button class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </button>
                        </div>
                    </div>

                    <div class="shorts-item" onclick="openVideo('ECJI_S43ib4')">
                        <img src="https://img.youtube.com/vi/ECJI_S43ib4/hqdefault.jpg" />
                        <div class="video-overlay">
                            <button class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </button>
                        </div>
                    </div>

                    <div class="shorts-item" onclick="openVideo('ubXn2z7uo5M')">
                        <img src="https://img.youtube.com/vi/ubXn2z7uo5M/hqdefault.jpg" />
                        <div class="video-overlay">
                            <button class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </button>
                        </div>
                    </div>

                    <div class="shorts-item" onclick="openVideo('JQKarRIzeaA')">
                        <img src="https://img.youtube.com/vi/JQKarRIzeaA/hqdefault.jpg" />
                        <div class="video-overlay">
                            <button class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </button>
                        </div>
                    </div>

                    <div class="shorts-item" onclick="openVideo('ECJI_S43ib4')">
                        <img src="https://img.youtube.com/vi/ECJI_S43ib4/hqdefault.jpg" />
                        <div class="video-overlay">
                            <button class="play-btn">
                                <i class="bi bi-play-fill"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <button class="nav next" onclick="moveShorts(1)">
                    <i class="bi bi-arrow-right-short"></i>
                </button>

            </div>

            <!-- ── DESKTOP VIDEO GRID ── -->
            <div class="video-gallery gap-2 d-none d-md-grid">

                <div class="video-card" data-video="GYtEXN5xbdU">
                    <img src="https://img.youtube.com/vi/GYtEXN5xbdU/maxresdefault.jpg" alt="Video Gallery">
                    <div class="video-overlay">
                        <button class="play-btn">
                            <i class="bi bi-play-fill"></i>
                        </button>
                    </div>
                </div>

                <div class="video-card" data-video="C7JwI-Clx80">
                    <img src="https://img.youtube.com/vi/C7JwI-Clx80/maxresdefault.jpg" alt="Video Gallery">
                    <div class="video-overlay">
                        <button class="play-btn">
                            <i class="bi bi-play-fill"></i>
                        </button>
                    </div>
                </div>

            </div>

            <!-- ── MOBILE VIDEO CAROUSEL ── -->
            <div id="mobileVideoCarousel" class="carousel slide d-md-none" data-bs-ride="false">

                <div class="carousel-inner rounded-1 overflow-hidden">

                    <div class="carousel-item active">
                        <div class="video-card" data-video="GYtEXN5xbdU">
                            <img src="https://img.youtube.com/vi/GYtEXN5xbdU/maxresdefault.jpg" alt="Video Gallery">
                            <div class="video-overlay">
                                <button class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item active">
                        <div class="video-card" data-video="C7JwI-Clx80">
                            <img src="https://img.youtube.com/vi/C7JwI-Clx80/maxresdefault.jpg" alt="Video Gallery">
                            <div class="video-overlay">
                                <button class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ── PREV ── -->
                <button class="carousel-control-prev" type="button" data-bs-target="#mobileVideoCarousel"
                    data-bs-slide="prev">
                    <i class="bi bi-arrow-left-short"></i>
                </button>

                <!-- ── NEXT ── -->
                <button class="carousel-control-next" type="button" data-bs-target="#mobileVideoCarousel"
                    data-bs-slide="next">
                    <i class="bi bi-arrow-right-short"></i>
                </button>

            </div>

        </div>
    </section>

    <!-- ── VIDEO GALLERY MODAL PREVIEW ── -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-black border-0">

                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3"
                    data-bs-dismiss="modal">
                </button>

                <div class="modal-body p-0">

                    <div class="ratio ratio-16x9">
                        <iframe id="youtubeVideo" src="" title="YouTube video"
                            allow="autoplay; encrypted-media" allowfullscreen frameborder="0">
                        </iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- ── SHORT VIDEO GALLERY MODAL PREVIEW ── -->
    <div class="modal fade" id="shortvideoModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm short-modal-dialog">
            <div class="modal-content bg-dark border-0 short-modal-content">

                <div class="modal-body p-0 short-modal-body">

                    <div class="short-frame">
                        <iframe id="videoFrame" src="" allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
