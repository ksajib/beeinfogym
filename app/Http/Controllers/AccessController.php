<?php

namespace App\Http\Controllers;

class AccessController extends Controller
{
    public function index()
    {
        $advantages = [
            [
                'number' => '01',
                'title' => 'Extended Open Hours',
                'image' => 'images/hours.png',
                'description' => 'Make your club irresistible by staying open 24 hours. Members love the flexibility and you gain a key competitive advantage.',
                'class' => '',
            ],
            [
                'number' => '02',
                'title' => 'Reduce Staffing Costs',
                'image' => 'images/costs.png',
                'description' => "Offer more value with fewer staff hours. Automation handles late-night and early-morning access so your team doesn't have to.",
                'class' => 'd1',
            ],
            [
                'number' => '03',
                'title' => 'Tiered Memberships',
                'image' => 'images/memberships.png',
                'description' => 'Offer peak vs. off-peak access tiers to maximise revenue. Charge more for all-hours access and fill every slot in your schedule.',
                'class' => 'd2',
            ],
            [
                'number' => '04',
                'title' => 'Zone Restrictions',
                'image' => 'images/restricted-zones.png',
                'description' => 'Restrict access to specific areas — women-only zones, VIP areas, or staff corridors — with pinpoint precision and full audit logs.',
                'class' => 'd3',
            ],
        ];

        $metrics = [
            [
                'icon' => 'images/staff.png',
                'alt' => 'Staff Required',
                'label' => 'Staff Required',
                'value' => '↓ Reduce Costs',
                'value_class' => 'down',
                'desc' => 'Automate late-night access — no staff needed after hours',
            ],
            [
                'icon' => 'images/time.png',
                'alt' => 'Admin Hours',
                'label' => 'Admin Hours',
                'value' => '↑ Save Time',
                'value_class' => 'up',
                'desc' => 'Spend hours on growth, not manual check-in management',
            ],
            [
                'icon' => 'images/hardware.png',
                'alt' => 'Hardware Cost',
                'label' => 'Hardware Cost',
                'value' => 'Low Cost',
                'value_class' => '',
                'style' => 'color:var(--gold)',
                'desc' => 'Affordable controllers compatible with existing doors',
            ],
            [
                'icon' => 'images/member-revenue.png',
                'alt' => 'Membership Revenue',
                'label' => 'Membership Revenue',
                'value' => '↑ Tiered Plans',
                'value_class' => 'up',
                'desc' => 'Unlock additional income streams with peak/off-peak tiers',
            ],
        ];

        return view('pages.access', [
            'advantages' => $advantages,
            'metrics' => $metrics,
        ]);
    }
}
