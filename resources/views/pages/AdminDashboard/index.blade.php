@extends('layouts.dashboard')

@section('content')
    <!-- CONTENT -->
    <div class="content">

        <!-- WELCOME HERO -->
        <div class="hero">
            <div class="hero-av-wrap">
                <div class="hero-av">
                    {{ collect(explode(' ', Auth::user()->name))->take(2)->map(fn($word) => strtoupper($word[0]))->implode('') }}
                </div>
                <div class="hero-dot"></div>
            </div>
            <div class="hero-info">
                <div class="hero-greeting">Welcome back,</div>
                <div class="hero-name">{{ Auth::user()->name }}</div>
                <div class="hero-role">Yoga &amp; Wellness Trainer &nbsp;·&nbsp; Dhaka, Bangladesh</div>
                <div class="hero-stars">
                    <span class="stars">★★★★★</span>
                    <span class="hero-rating">4.9 rating</span>
                    <span class="profile-badge"><i class="ti ti-circle-check" style="font-size:11px"></i> Profile
                        92% Complete</span>
                </div>
            </div>
            <div class="hero-stats">
                <div class="hstat">
                    <div class="hstat-num">11</div>
                    <div class="hstat-lbl">Jobs Applied</div>
                </div>
                <div class="hstat">
                    <div class="hstat-num">4</div>
                    <div class="hstat-lbl">Interviews</div>
                </div>
                <div class="hstat">
                    <div class="hstat-num" style="color:var(--green)">2</div>
                    <div class="hstat-lbl">Offers</div>
                </div>
            </div>
        </div>

        <!-- STAT CARDS -->
        <div class="stat-grid">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Profile Views</div>
                    <div class="stat-icon"><i class="ti ti-eye"></i></div>
                </div>
                <div class="stat-num">1,248</div>
                <div class="stat-trend t-green"><i class="ti ti-trending-up" style="font-size:11px"></i> +34 this
                    week</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Applications Sent</div>
                    <div class="stat-icon"><i class="ti ti-file-text"></i></div>
                </div>
                <div class="stat-num">11</div>
                <div class="stat-trend t-gold"><i class="ti ti-clock" style="font-size:11px"></i> 3 pending
                    review</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Interview Invites</div>
                    <div class="stat-icon"><i class="ti ti-calendar"></i></div>
                </div>
                <div class="stat-num">4</div>
                <div class="stat-trend t-green"><i class="ti ti-circle-check" style="font-size:11px"></i> 1
                    upcoming</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-label">Job Offers</div>
                    <div class="stat-icon green-icon"><i class="ti ti-check"></i></div>
                </div>
                <div class="stat-num" style="color:var(--green)">2</div>
                <div class="stat-trend t-red"><i class="ti ti-alert-circle" style="font-size:11px"></i> 1
                    awaiting reply</div>
            </div>
        </div>

        <!-- APPLICATIONS + STATUS OVERVIEW -->
        <div class="panels-row">
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title"><i class="ti ti-file-text"></i> My Applications</div>
                    <a class="view-all" href="#">View All →</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Gym / Employer</th>
                            <th>Applied</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Head Yoga Instructor</td>
                            <td style="color:var(--muted)">FitLife Dhaka</td>
                            <td style="color:var(--muted)">Jun 2, 2026</td>
                            <td><span class="pill p-green">Interview</span></td>
                            <td><a class="act-link" href="#">View</a></td>
                        </tr>
                        <tr>
                            <td>Wellness Coach</td>
                            <td style="color:var(--muted)">BodyZen Studio</td>
                            <td style="color:var(--muted)">May 28</td>
                            <td><span class="pill p-gold">Under Review</span></td>
                            <td><a class="act-link" href="#">View</a></td>
                        </tr>
                        <tr>
                            <td>HIIT Trainer</td>
                            <td style="color:var(--muted)">PowerHouse Gym</td>
                            <td style="color:var(--muted)">May 20</td>
                            <td><span class="pill p-green">Shortlisted</span></td>
                            <td><a class="act-link" href="#">View</a></td>
                        </tr>
                        <tr>
                            <td>Yoga Specialist</td>
                            <td style="color:var(--muted)">The Sanctuary</td>
                            <td style="color:var(--muted)">May 15</td>
                            <td><span class="pill p-red">Rejected</span></td>
                            <td><a class="act-link" href="#">View</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title"><i class="ti ti-chart-bar"></i> Status Overview</div>
                </div>
                <div class="status-bars">
                    <div class="sbar-row">
                        <div class="sbar-meta"><span class="sbar-label">Interview</span><span class="sbar-count">4
                                &nbsp;·&nbsp; 36%</span></div>
                        <div class="sbar-track">
                            <div class="sbar-fill fill-gold" style="width:36%"></div>
                        </div>
                    </div>
                    <div class="sbar-row">
                        <div class="sbar-meta"><span class="sbar-label">Under Review</span><span class="sbar-count">3
                                &nbsp;·&nbsp; 27%</span></div>
                        <div class="sbar-track">
                            <div class="sbar-fill fill-muted" style="width:27%"></div>
                        </div>
                    </div>
                    <div class="sbar-row">
                        <div class="sbar-meta"><span class="sbar-label">Shortlisted</span><span class="sbar-count">2
                                &nbsp;·&nbsp; 18%</span></div>
                        <div class="sbar-track">
                            <div class="sbar-fill fill-green" style="width:18%"></div>
                        </div>
                    </div>
                    <div class="sbar-row">
                        <div class="sbar-meta"><span class="sbar-label">Rejected</span><span class="sbar-count">1
                                &nbsp;·&nbsp; 9%</span></div>
                        <div class="sbar-track">
                            <div class="sbar-fill fill-red" style="width:9%"></div>
                        </div>
                    </div>
                    <div class="sbar-row">
                        <div class="sbar-meta"><span class="sbar-label">Applied</span><span class="sbar-count">1
                                &nbsp;·&nbsp; 9%</span></div>
                        <div class="sbar-track">
                            <div class="sbar-fill fill-border" style="width:9%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTTOM 3 PANELS -->
        <div class="bottom-row">

            <!-- UPCOMING INTERVIEWS -->
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title"><i class="ti ti-calendar-event"></i> Upcoming Interviews</div>
                </div>
                <div class="interview-card">
                    <div class="ic-company">FitLife Dhaka</div>
                    <div class="ic-role">Head Yoga Instructor</div>
                    <div class="ic-time"><i class="ti ti-clock" style="font-size:12px"></i> Jun 18, 2026
                        &nbsp;·&nbsp; 10:00 AM</div>
                    <div class="ic-type"><i class="ti ti-video" style="font-size:11px"></i> Video Call</div>
                </div>
                <div class="interview-card">
                    <div class="ic-company">BodyZen Studio</div>
                    <div class="ic-role">Wellness Coach</div>
                    <div class="ic-time"><i class="ti ti-clock" style="font-size:12px"></i> Jun 22, 2026
                        &nbsp;·&nbsp; 2:00 PM</div>
                    <div class="ic-type"><i class="ti ti-building" style="font-size:11px"></i> In-Person</div>
                </div>
                <button class="btn-gold" style="width:100%;justify-content:center"><i class="ti ti-video"></i>
                    JOIN CALL</button>
            </div>

            <!-- SAVED JOBS -->
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title"><i class="ti ti-bookmark"></i> Saved Jobs</div>
                </div>
                <div class="saved-row">
                    <div class="saved-icon"><i class="ti ti-barbell"></i></div>
                    <div>
                        <div class="saved-title">Pilates Instructor</div>
                        <div class="saved-gym">ZenFit Studio</div>
                    </div>
                    <div class="saved-salary">$1,100/mo</div>
                    <i class="ti ti-bookmark bm-icon"></i>
                </div>
                <div class="saved-row">
                    <div class="saved-icon"><i class="ti ti-heart-rate-monitor"></i></div>
                    <div>
                        <div class="saved-title">Wellness Trainer</div>
                        <div class="saved-gym">ActiveLife BD</div>
                    </div>
                    <div class="saved-salary">$900/mo</div>
                    <i class="ti ti-bookmark bm-icon"></i>
                </div>
                <div class="saved-row">
                    <div class="saved-icon"><i class="ti ti-run"></i></div>
                    <div>
                        <div class="saved-title">HIIT Specialist</div>
                        <div class="saved-gym">PowerHouse Gym</div>
                    </div>
                    <div class="saved-salary">$1,000/mo</div>
                    <i class="ti ti-bookmark bm-icon"></i>
                </div>
                <div style="margin-top:10px;text-align:center">
                    <a class="view-all" href="#">Browse More Jobs →</a>
                </div>
            </div>

            <!-- PROFILE STRENGTH -->
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title"><i class="ti ti-user-check"></i> Profile Strength</div>
                </div>
                <div class="strength-center">
                    <div class="strength-ring">
                        <svg class="strength-svg" viewBox="0 0 72 72">
                            <circle class="ring-track" cx="36" cy="36" r="30" />
                            <circle class="ring-fill" cx="36" cy="36" r="30" />
                        </svg>
                        <div class="strength-pct">92%</div>
                    </div>
                </div>
                <div class="checklist">
                    <div class="check-row done"><i class="ti ti-circle-check"></i> Basic Info</div>
                    <div class="check-row done"><i class="ti ti-circle-check"></i> Photo Added</div>
                    <div class="check-row done"><i class="ti ti-circle-check"></i> Resume Uploaded</div>
                    <div class="check-row done"><i class="ti ti-circle-check"></i> Skills Added</div>
                    <div class="check-row pending"><i class="ti ti-circle"></i> Video Intro</div>
                </div>
                <div class="strength-bar-wrap">
                    <div class="strength-track">
                        <div class="strength-fill"></div>
                    </div>
                    <div class="strength-tip">Add a video intro to reach 100%</div>
                </div>
            </div>
        </div>

        <!-- RECOMMENDED JOBS -->
        <div>
            <div class="rec-head">
                <div class="rec-title">Recommended For You</div>
                <a class="view-all" href="#">See All →</a>
            </div>
            <div class="rec-grid">
                <div class="job-card">
                    <span class="new-badge">NEW</span>
                    <div class="jc-top">
                        <div class="jc-logo"><i class="ti ti-building"></i></div>
                        <div>
                            <div class="jc-title">Head Yoga Coach</div>
                            <div class="jc-gym">ZenFit Studio</div>
                        </div>
                    </div>
                    <div class="jc-salary">$1,200 / mo</div>
                    <div class="jc-loc"><i class="ti ti-map-pin"></i> Dhaka, BD</div>
                    <div class="jc-tags"><span class="jtag">Yoga</span><span class="jtag">Wellness</span>
                    </div>
                    <button class="btn-apply">QUICK APPLY</button>
                </div>
                <div class="job-card">
                    <div class="jc-top">
                        <div class="jc-logo"><i class="ti ti-building"></i></div>
                        <div>
                            <div class="jc-title">Wellness Trainer</div>
                            <div class="jc-gym">ActiveLife BD</div>
                        </div>
                    </div>
                    <div class="jc-salary">$900 / mo</div>
                    <div class="jc-loc"><i class="ti ti-map-pin"></i> Chittagong, BD</div>
                    <div class="jc-tags"><span class="jtag">Pilates</span><span class="jtag">Meditation</span></div>
                    <button class="btn-apply">QUICK APPLY</button>
                </div>
                <div class="job-card">
                    <div class="jc-top">
                        <div class="jc-logo"><i class="ti ti-building"></i></div>
                        <div>
                            <div class="jc-title">Pilates Expert</div>
                            <div class="jc-gym">BodyMind Studio</div>
                        </div>
                    </div>
                    <div class="jc-salary">$1,100 / mo</div>
                    <div class="jc-loc"><i class="ti ti-map-pin"></i> Dhaka, BD</div>
                    <div class="jc-tags"><span class="jtag">Pilates</span><span class="jtag">Yoga</span>
                    </div>
                    <button class="btn-apply">QUICK APPLY</button>
                </div>
                <div class="job-card">
                    <div class="jc-top">
                        <div class="jc-logo"><i class="ti ti-building"></i></div>
                        <div>
                            <div class="jc-title">HIIT Specialist</div>
                            <div class="jc-gym">PowerHouse Gym</div>
                        </div>
                    </div>
                    <div class="jc-salary">$1,000 / mo</div>
                    <div class="jc-loc"><i class="ti ti-map-pin"></i> Sylhet, BD</div>
                    <div class="jc-tags"><span class="jtag">HIIT</span><span class="jtag">Cardio</span></div>
                    <button class="btn-apply">QUICK APPLY</button>
                </div>
            </div>
        </div>

    </div><!-- /content -->
@endsection
