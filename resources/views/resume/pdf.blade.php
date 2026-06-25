<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Resume - Classic Elegant</title>
    <style>
        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-size: 12px;
            line-height: 1.5;
            background: white !important;
            color: #222222;
            margin: 13px 35px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0 0 5px 0;
            font-weight: normal;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .contact-info {
            font-size: 11px;
            color: #555555;
            margin-bottom: 10px;
        }

        .profile-table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }

        .profile-img-td {
            width: 110px;
            vertical-align: top;
            text-align: left;
        }

        .profile-thumb {
            width: 95px;
            height: 115px;
            border: 1px solid #cccccc;
            padding: 2px;
        }

        .profile-text-td {
            vertical-align: top;
        }

        .section-heading {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #222222;
            margin-top: 25px;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
            padding-bottom: 2px;
        }

        .summary-text {
            font-size: 12px;
            color: #333333;
            text-align: justify;
        }

        .entry-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .entry-left {
            width: 20%;
            vertical-align: top;
            font-size: 11px;
            color: #666666;
            font-family: 'Helvetica', 'Arial', sans-serif;
        }

        .entry-right {
            width: 80%;
            vertical-align: top;
            padding-bottom: 5px;
        }

        .entry-title {
            font-weight: bold;
            font-size: 13px;
        }

        .entry-subtitle {
            font-style: italic;
            color: #444444;
            margin-bottom: 4px;
        }

        .entry-desc {
            color: #444444;
            margin: 0;
            font-size: 12px;
        }

        /* Personal Details Meta Table */
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .details-table td {
            padding: 4px 0;
            width: 50%;
            font-size: 12px;
            vertical-align: top;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>{{ $user->profile->first_name ?? 'First' }} {{ $user->profile->last_name ?? 'Last' }}</h1>
        <div class="contact-info">
            {{ $user->profile->email ?? $user->email }} &nbsp;|&nbsp;
            {{ $user->profile->primary_mobile ?? '' }} &nbsp;|&nbsp;
            @if ($user->profile->address)
                @php $addr = json_decode($user->profile->address, true); @endphp
                {{ $addr['street'] ?? '' }}, {{ $addr['city'] ?? '' }}
            @endif
        </div>
    </div>

    <table class="profile-table">
        <tr>
            @if ($user->profile && $user->profile->profile_photo)
                <td class="profile-img-td">
                    <img src="{{ public_path('storage/' . $user->profile->profile_photo) }}" class="profile-thumb"
                        alt="Photo">
                </td>
            @endif
            <td class="profile-text-td">
                <div class="section-heading" style="margin-top: 0;">Profile Summary</div>
                <div class="summary-text">
                    {{ $user->profile->bio ?? 'Highly analytical and detail-oriented professional with comprehensive training and structural foundation. Experienced in establishing scalable strategies and processing configurations. Proven capacity to manage complex data tracks and execute deliverables within structured timelines.' }}
                </div>
            </td>
        </tr>
    </table>

    <div class="section-heading">Professional Experience</div>
    @forelse($user->experiences as $exp)
        <table class="entry-table">
            <tr>
                <td class="entry-left">
                    {{ $exp->start_date ? \Carbon\Carbon::parse($exp->start_date)->format('M Y') : '' }} — <br>
                    {{ $exp->is_current ? 'Present' : ($exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : '') }}
                </td>
                <td class="entry-right">
                    <div class="entry-title">{{ $exp->job_title }}</div>
                    <div class="entry-subtitle">{{ $exp->company_name }} — <i>{{ $exp->location }}</i></div>
                    <p class="entry-desc">{{ $exp->description }}</p>
                </td>
            </tr>
        </table>
    @empty
        <p>No career experience recorded.</p>
    @endforelse

    <div class="section-heading">Education</div>
    @forelse($user->educations as $edu)
        <table class="entry-table">
            <tr>
                <td class="entry-left">
                    {{ $edu->start_date ? \Carbon\Carbon::parse($edu->start_date)->format('Y') : '' }} —
                    {{ $edu->is_current ? 'Present' : ($edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('Y') : '') }}
                </td>
                <td class="entry-right">
                    <div class="entry-title">{{ $edu->degree }} in {{ $edu->field }}</div>
                    <div class="entry-subtitle">{{ $edu->institution }}</div>
                    <p class="entry-desc">Result Status: {{ $edu->result }} ({{ $edu->grade_system }})</p>
                </td>
            </tr>
        </table>
    @empty
        <p>No higher education background registered.</p>
    @endforelse

    <div class="section-heading">Technical Training & Specialization</div>
    @forelse($user->trainings as $training)
        <table class="entry-table">
            <tr>
                <td class="entry-left">
                    {{ $training->duration }} {{ $training->duration_type }}
                </td>
                <td class="entry-right">
                    <div class="entry-title">{{ $training->training_title }}</div>
                    <div class="entry-subtitle">{{ $training->institution_name }} ({{ $training->location }})</div>
                    @if ($training->description)
                        <p class="entry-desc">{{ $training->description }}</p>
                    @endif
                </td>
            </tr>
        </table>
    @empty
        <p>No vocational or additional training fields specified.</p>
    @endforelse

    <div class="section-heading">Honors & Achievements</div>
    @forelse($user->achievements as $ach)
        <table class="entry-table">
            <tr>
                <td class="entry-left">
                    {{ $ach->date ? \Carbon\Carbon::parse($ach->date)->format('Y') : '' }}
                </td>
                <td class="entry-right">
                    <div class="entry-title">{{ $ach->title }}</div>
                    <div class="entry-subtitle">Awarded by: {{ $ach->issuer }}</div>
                    <p class="entry-desc">{{ $ach->description }}</p>
                </td>
            </tr>
        </table>
    @empty
        <p>No explicit structural accolades populated.</p>
    @endforelse

    <div class="section-heading">Personal Credentials</div>
    <table class="details-table">
        <tr>
            <td><strong>Father's Name:</strong> {{ $user->profile->fathers_name ?? 'N/A' }}</td>
            <td><strong>Mother's Name:</strong> {{ $user->profile->mothers_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Date of Birth:</strong>
                {{ $user->profile->dob ? \Carbon\Carbon::parse($user->profile->dob)->format('d F Y') : 'N/A' }}</td>
            <td><strong>Gender / Marital Status:</strong> {{ $user->profile->gender ?? 'N/A' }} /
                {{ $user->profile->marital_status ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Nationality:</strong> {{ $user->profile->nationality ?? 'N/A' }}</td>
            <td><strong>National Identity Number (NID):</strong> {{ $user->profile->nid ?? 'N/A' }}</td>
        </tr>
        @if ($user->profile->passport_no)
            <tr>
                <td><strong>Passport No:</strong> {{ $user->profile->passport_no }}</td>
                <td><strong>Passport Issue Date:</strong> {{ $user->profile->passport_issue_date ?? 'N/A' }}</td>
            </tr>
        @endif
    </table>

</body>

</html>
