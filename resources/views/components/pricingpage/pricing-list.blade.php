<section id="pricing" class="section-pad" style="background:var(--dark);">
    <div class="container px-0">
        <div class="text-center mb-5 mx-auto" style="max-width:700px;">
            <div class="cheadline cheadline-center">Transparent Pricing</div>
            <h2 class="section-title text-light">Plans that Scale with your gym</h2>
            <p class="feat-hero-desc mx-auto">No hidden fees. No lock-in. Just powerful tools at a price that matches
                your size.</p>
        </div>
        <div class="row g-4 align-items-stretch mb-4">
            <!-- ── BASIC ── -->
            <x-common.pricing-card tier="Basic" :price="2000" aos="fade-right" :features="['Member Management', 'Attendance Tracking', 'Email Support']"
                :excluded="['24/7 Access Control', 'Member Mobile App']" />

            <!-- ── STANDARD: MOST POPULAR ── -->
            <x-common.pricing-card tier="Standard" :price="5000" aos="fade-down" :popular="true"
                button-class="btn-primary-custom" :features="['Member Management', '24/7 Access Control', 'Advanced Reporting', 'Priority Support']" :excluded="['Member Mobile App']" />

            <!-- ── PREMIUM ── -->
            <x-common.pricing-card tier="Premium" :price="10000" aos="fade-left" :features="[
                'Full Management Suite',
                '24/7 Access Control',
                'Member Mobile App',
                'Custom Branding',
                'Direct Call Support',
            ]" />
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- ── ENTERPRIZE ── -->
                <div data-aos="fade-up" class="enterprise-card">
                    <div class="ent-body flex-grow-1">
                        <div class="ent-price">Enterprise</div>
                        <h4>Custom</h4>
                        <p>Perfect for large fitness chains and franchises with multiple locations across the country.
                            Get a tailored solution built for your exact needs.</p>
                        <div class="ent-tags">
                            <span class="ent-tag">Multi-location Support</span>
                            <span class="ent-tag">API Access</span>
                            <span class="ent-tag">Dedicated Manager</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="contact.html" class="btn-ghost-custom">
                            Contact Sales <span class="arr">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
