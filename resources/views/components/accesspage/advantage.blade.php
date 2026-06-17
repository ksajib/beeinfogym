<section id="advantage" class="section-pad" style="background: var(--black);">
    <div class="container px-lg-5 px-3">

        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-5">
                <div class="cheadline">Grow Revenue</div>
                <h2 class="section-title text-light">Competitive advantage <br>with <span class="highlight">24/7
                        access</span></h2>
                <p class="sub">Give your gym a serious edge over the competition by staying open around the clock —
                    without the staffing costs. More access means more memberships and more revenue.</p>
                <div>
                    <x-common.bg-button text="Get Started Today" to="/contact" />
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    @foreach ($advantages as $advantage)
                        <x-common.advantage-card :number="$advantage['number']" :title="$advantage['title']" :image="$advantage['image']" :description="$advantage['description']"
                            :class="$advantage['class'] ?? ''" />
                    @endforeach
                </div>
            </div>
        </div>

        <!-- ── METRIC GRID ── -->
        <div class="metric-grid rv">
            @foreach ($metrics as $metric)
                <x-common.metric-card :metric="$metric" />
            @endforeach
        </div>

    </div>
</section>
