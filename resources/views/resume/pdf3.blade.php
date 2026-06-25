<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Resume - Modern Template</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 13px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* MAIN WRAPPER */
        .resume-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 30%;
            background-color: #1e2530;
            color: #ffffff;
            padding: 40px 20px;
        }

        /* MAIN CONTENT */
        .content {
            width: 70%;
            padding: 40px 30px;
            background-color: #ffffff;
        }

        /* SIDEBAR STYLES */
        .profile-photo-container {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile-photo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 3px solid #ffffff;
        }

        .name-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .name-title h1 {
            font-size: 22px;
            margin: 0 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .name-title p {
            font-size: 14px;
            color: #a0aec0;
            margin: 0;
        }

        .sidebar-section {
            margin-bottom: 30px;
        }

        .sidebar-heading {
            font-size: 14px;
            text-transform: uppercase;
            border-bottom: 1px solid #4a5568;
            padding-bottom: 5px;
            margin-bottom: 12px;
            letter-spacing: 1px;
        }

        .sidebar-item {
            margin-bottom: 10px;
            font-size: 12px;
        }

        .sidebar-item strong {
            display: block;
            color: #cbd5e0;
        }

        /* CONTENT STYLES */
        .section-title {
            font-size: 16px;
            text-transform: uppercase;
            color: #1e2530;
            border-bottom: 2px solid #1e2530;
            padding-bottom: 4px;
            margin-bottom: 15px;
            margin-top: 0;
        }

        .summary-box {
            margin-bottom: 25px;
            font-style: italic;
            color: #4a5568;
        }

        .item-row {
            margin-bottom: 20px;
        }

        .item-header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .item-title {
            font-weight: bold;
            font-size: 14px;
        }

        .item-meta {
            text-align: right;
            font-size: 12px;
            color: #718096;
        }

        .item-sub {
            font-size: 12px;
            color: #4a5568;
            margin-bottom: 5px;
        }

        .item-desc {
            font-size: 12px;
            color: #4a5568;
        }
    </style>
</head>

<body>
    <div class="resume-wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="profile-photo-container">
                @if ($user->profile && $user->profile->image_url)
                    <img src="{{ public_path('storage/avatars/' . $user->profile->image_url) }}" class="profile-photo"
                        alt="Profile Photo">
                @else
                    <div
                        style="width: 140px; height: 140px; border-radius: 50%; background: #4a5568; margin: 0 auto; line-height: 140px; text-align: center; color: #fff;">
                        No Photo
                    </div>
                @endif
            </div>

            <div class="name-title">
                <h1>{{ $user->profile->first_name ?? 'Your' }} {{ $user->profile->last_name ?? 'Name' }}</h1>
                <p>{{ $user->experiences->first()->job_title ?? 'Professional Title' }}</p>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-heading">Contact</div>
                <div class="sidebar-item"><strong>Mobile:</strong> {{ $user->profile->primary_mobile ?? 'N/A' }}</div>
                @if ($user->profile->secondary_mobile)
                    <div class="sidebar-item"><strong>Alt Mobile:</strong> {{ $user->profile->secondary_mobile }}</div>
                @endif
                <div class="sidebar-item"><strong>Email:</strong> {{ $user->profile->email ?? $user->email }}</div>
                @if ($user->profile->address)
                    <div class="sidebar-item">
                        <strong>Address:</strong>
                        @php $addr = json_decode($user->profile->address, true); @endphp
                        {{ $addr['street'] ?? '' }}, {{ $addr['city'] ?? '' }}
                    </div>
                @endif
            </div>

            <div class="sidebar-section">
                <div class="sidebar-heading">Personal Details</div>
                <div class="sidebar-item"><strong>DOB:</strong>
                    {{ $user->profile->dob ? \Carbon\Carbon::parse($user->profile->dob)->format('d M, Y') : 'N/A' }}
                </div>
                <div class="sidebar-item"><strong>Gender:</strong> {{ $user->profile->gender ?? 'N/A' }}</div>
                <div class="sidebar-item"><strong>Nationality:</strong> {{ $user->profile->nationality ?? 'N/A' }}
                </div>
                <div class="sidebar-item"><strong>Religion:</strong> {{ $user->profile->religion ?? 'N/A' }}</div>
                @if ($user->profile->nid)
                    <div class="sidebar-item"><strong>NID:</strong> {{ $user->profile->nid }}</div>
                @endif
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="content">
            <div class="section-title">Profile Summary</div>
            <div class="summary-box">
                {{ $user->profile->bio ?? 'Dedicated professional with a proven track record of delivering high-quality work and collaborating effectively across cross-functional infrastructure.' }}
            </div>

            <div class="section-title">Work Experience</div>
            @forelse($user->experiences as $exp)
                <div class="item-row">
                    <table class="item-header-table">
                        <tr>
                            <td class="item-title">{{ $exp->job_title }}</td>
                            <td class="item-meta">
                                {{ $exp->start_date ? \Carbon\Carbon::parse($exp->start_date)->format('M Y') : '' }} -
                                {{ $exp->is_current ? 'Present' : ($exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : '') }}
                            </td>
                        </tr>
                    </table>
                    <div class="item-sub">{{ $exp->company_name }} | {{ $exp->employment_type }} -
                        {{ $exp->location }}
                    </div>
                    <p class="item-desc">{{ $exp->description }}</p>
                </div>
            @empty
                <p class="item-desc">No work experience listed.</p>
            @endforelse

            <div class="section-title" style="margin-top: 25px;">Education</div>
            @forelse($user->educations as $edu)
                <div class="item-row">
                    <table class="item-header-table">
                        <tr>
                            <td class="item-title">{{ $edu->degree }} in {{ $edu->field }}</td>
                            <td class="item-meta">
                                {{ $edu->start_date ? \Carbon\Carbon::parse($edu->start_date)->format('Y') : '' }} -
                                {{ $edu->is_current ? 'Present' : ($edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y') : '') }}
                            </td>
                        </tr>
                    </table>
                    <div class="item-sub">{{ $edu->institution }}</div>
                    <p class="item-desc">Result: {{ $edu->result }} (Grade System: {{ $edu->grade_system }})</p>
                </div>
            @empty
                <p class="item-desc">No education records listed.</p>
            @endforelse

            <div class="section-title" style="margin-top: 25px;">Trainings & Certifications</div>
            @forelse($user->trainings as $training)
                <div class="item-row">
                    <table class="item-header-table">
                        <tr>
                            <td class="item-title">{{ $training->training_title }}</td>
                            <td class="item-meta">{{ $training->duration }} {{ $training->duration_type }}</td>
                        </tr>
                    </table>
                    <div class="item-sub">{{ $training->institution_name }} | {{ $training->location }}</div>
                    <p class="item-desc">{{ $training->description }}</p>
                </div>
            @empty
                <p class="item-desc">No training records listed.</p>
            @endforelse

            <div class="section-title" style="margin-top: 25px;">Achievements</div>
            @forelse($user->achievements as $ach)
                <div class="item-row">
                    <table class="item-header-table">
                        <tr>
                            <td class="item-title">{{ $ach->title }}</td>
                            <td class="item-meta">
                                {{ $ach->date ? \Carbon\Carbon::parse($ach->date)->format('M Y') : '' }}
                            </td>
                        </tr>
                    </table>
                    <div class="item-sub">Issued by: {{ $ach->issuer }}</div>
                    <p class="item-desc">{{ $ach->description }}</p>
                </div>
            @empty
                <p class="item-desc">No achievements listed.</p>
            @endforelse
        </div>
    </div>
</body>

</html>
