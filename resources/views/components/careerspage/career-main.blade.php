<section id="careers-body" class="section-pad">
    <div class="container px-0">
        <div class="row g-5 align-items-start">

            <!-- ── SIDEBAR FILTERS ── -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="filter-sidebar">

                    <div class="mb-3" id="activeFilterWrap">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="filter-active">Active Filters</span>
                            <button class="btn-clear">Clear All</button>
                        </div>
                        <div class="active-filters" id="activeFilterTags"></div>
                    </div>

                    <div class="filter-card">
                        <div class="filter-card-heading"><i class="bi bi-briefcase-fill"></i> Job Type</div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Full Time</label><span class="filter-count">8</span></div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Part Time</label><span class="filter-count">2</span></div>
                    </div>

                    <div class="filter-card">
                        <div class="filter-card-heading"><i class="bi bi-bar-chart-fill"></i> Experience Level</div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Beginner</label><span class="filter-count">4</span></div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Experienced</label><span class="filter-count">3</span></div>
                    </div>

                    <div class="filter-card">
                        <div class="filter-card-heading"><i class="bi bi-diagram-3-fill"></i> Department</div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Engineering</label><span class="filter-count">5</span></div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Product &amp; Design</label><span class="filter-count">3</span>
                        </div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Sales &amp; Marketing</label><span class="filter-count">2</span>
                        </div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Customer Support</label><span class="filter-count">1</span>
                        </div>
                    </div>

                    <div class="filter-card">
                        <div class="filter-card-heading"><i class="bi bi-geo-alt-fill"></i> Location</div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Dhaka</label><span class="filter-count">4</span></div>
                        <div class="filter-opt"><label class="filter-opt-left"><input type="checkbox"
                                    class="filter-cb" />Chottogram</label><span class="filter-count">3</span></div>
                    </div>

                </div>
            </div>

            <!-- ── JOB LISTINGS ── -->
            <div class="col-lg-9">
                <div class="results-header rv">
                    <div class="results-count">Found <span id="visibleCount">06</span> Jobs</div>
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <div class="sort-wrap">
                            Sort:
                            <select class="sort-select">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="az">A → Z</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="jobGrid">
                    <div class="row g-4" id="gridJobsInner">
                        <div data-aos="fade-up" class="col-sm-6">
                            <div class="job-grid-card">
                                <div class="job-grid-card-bar"></div>
                                <div class="grid-logo"><img src="assets/images/beeinfo.svg" alt="BeeInfo" /></div>
                                <div class="grid-title">Customer Success Manager</div>
                                <div class="grid-company">BeeInfo</div>
                                <div class="grid-meta">
                                    <span class="jm-tag level-experienced"><i class="bi bi-bar-chart-fill"></i>
                                        Experienced</span>
                                    <span class="jm-tag type-fulltime"><i class="bi bi-clock-fill"></i> Full
                                        time</span>
                                    <span class="jm-tag"><i class="bi bi-grid-fill"></i> Support</span>
                                </div>
                                <div class="grid-footer">
                                    <div class="grid-deadline"><i class="bi bi-calendar3"></i>Jul 15, 2026</div>
                                    <a href="career-details.html" class="btn-apply"><i class="bi bi-info-circle"></i>
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-down" class="col-sm-6">
                            <div class="job-grid-card">
                                <div class="job-grid-card-bar"></div>
                                <div class="grid-logo"><img src="assets/images/beeinfo.svg" alt="BeeInfo" /></div>
                                <div class="grid-title">Digital marketing specialist</div>
                                <div class="grid-company">BeeInfo</div>
                                <div class="grid-meta">
                                    <span class="jm-tag level-beginner"><i class="bi bi-bar-chart-fill"></i>
                                        Beginner</span>
                                    <span class="jm-tag type-parttime"><i class="bi bi-clock-fill"></i> Part
                                        time</span>
                                    <span class="jm-tag"><i class="bi bi-grid-fill"></i> Sales</span>
                                </div>
                                <div class="grid-footer">
                                    <div class="grid-deadline"><i class="bi bi-calendar3"></i>Jul 28, 2026</div>
                                    <a href="career-details.html" class="btn-apply"><i class="bi bi-info-circle"></i>
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="col-sm-6">
                            <div class="job-grid-card">
                                <div class="job-grid-card-bar"></div>
                                <div class="grid-logo"><img src="assets/images/beeinfo.svg" alt="BeeInfo" /></div>
                                <div class="grid-title">DevOps Engineer</div>
                                <div class="grid-company">BeeInfo</div>
                                <div class="grid-meta">
                                    <span class="jm-tag level-experienced"><i class="bi bi-bar-chart-fill"></i>
                                        Experienced</span>
                                    <span class="jm-tag type-parttime"><i class="bi bi-clock-fill"></i> Part
                                        time</span>
                                    <span class="jm-tag"><i class="bi bi-grid-fill"></i> Engineering</span>
                                </div>
                                <div class="grid-footer">
                                    <div class="grid-deadline"><i class="bi bi-calendar3"></i>Jul 30, 2026</div>
                                    <a href="career-details.html" class="btn-apply"><i class="bi bi-info-circle"></i>
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-down" class="col-sm-6">
                            <div class="job-grid-card">
                                <div class="job-grid-card-bar"></div>
                                <div class="grid-logo"><img src="assets/images/beeinfo.svg" alt="BeeInfo" /></div>
                                <div class="grid-title">Product Manager</div>
                                <div class="grid-company">BeeInfo</div>
                                <div class="grid-meta">
                                    <span class="jm-tag level-beginner"><i class="bi bi-bar-chart-fill"></i>
                                        Beginner</span>
                                    <span class="jm-tag type-fulltime"><i class="bi bi-clock-fill"></i> Full
                                        time</span>
                                    <span class="jm-tag"><i class="bi bi-grid-fill"></i> Product</span>
                                </div>
                                <div class="grid-footer">
                                    <div class="grid-deadline"><i class="bi bi-calendar3"></i>Aug 15, 2026</div>
                                    <a href="career-details.html" class="btn-apply"><i class="bi bi-info-circle"></i>
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="col-sm-6">
                            <div class="job-grid-card">
                                <div class="job-grid-card-bar"></div>
                                <div class="grid-logo"><img src="assets/images/beeinfo.svg" alt="BeeInfo" /></div>
                                <div class="grid-title">Graphic designer</div>
                                <div class="grid-company">BeeInfo</div>
                                <div class="grid-meta">
                                    <span class="jm-tag level-beginner"><i class="bi bi-bar-chart-fill"></i>
                                        Beginner</span>
                                    <span class="jm-tag type-parttime"><i class="bi bi-clock-fill"></i> Part
                                        Time</span>
                                    <span class="jm-tag"><i class="bi bi-grid-fill"></i> Product</span>
                                </div>
                                <div class="grid-footer">
                                    <div class="grid-deadline"><i class="bi bi-calendar3"></i>Sep 10, 2026</div>
                                    <a href="career-details.html" class="btn-apply"><i class="bi bi-info-circle"></i>
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-down" class="col-sm-6">
                            <div class="job-grid-card">
                                <div class="job-grid-card-bar"></div>
                                <div class="grid-logo"><img src="assets/images/beeinfo.svg" alt="BeeInfo" /></div>
                                <div class="grid-title">Senior Laravel Developer</div>
                                <div class="grid-company">BeeInfo</div>
                                <div class="grid-meta">
                                    <span class="jm-tag level-experienced"><i class="bi bi-bar-chart-fill"></i>
                                        Experienced</span>
                                    <span class="jm-tag type-fulltime"><i class="bi bi-clock-fill"></i> Full
                                        Time</span>
                                    <span class="jm-tag"><i class="bi bi-grid-fill"></i> Engineering</span>
                                </div>
                                <div class="grid-footer">
                                    <div class="grid-deadline"><i class="bi bi-calendar3"></i>Sep 15, 2026</div>
                                    <a href="career-details.html" class="btn-apply"><i class="bi bi-info-circle"></i>
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-wrap rv" id="paginationWrap">
                    <button class="pg-btn arrow"><i class="bi bi-chevron-left"></i></button>
                    <button class="pg-btn active">1</button>
                    <button class="pg-btn">2</button>
                    <button class="pg-btn">3</button>
                    <button class="pg-btn arrow"><i class="bi bi-chevron-right"></i></button>
                </div>

            </div>

        </div>
    </div>
</section>
