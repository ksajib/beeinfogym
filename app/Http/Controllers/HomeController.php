<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'name' => 'Din Islam Dinu',
                'role' => 'Owner, Muscle Art Gym',
                'image' => 'images/client/din-islam.png',
                'text' => 'Beeinfo provides me with all the tools to manage and build my business. As a new owner, I find it incredibly intuitive and it\'s transformed how I run my gym.',
                'stars' => 5,
            ],
            [
                'name' => 'Bappy',
                'role' => 'Owner, Royal Fitness Studio',
                'image' => 'images/client/bappy.png',
                'text' => 'They worked with me non-stop prior to opening to ensure a great first day. Their support is always available whenever I need help — truly exceptional service.',
                'stars' => 5,
            ],
            [
                'name' => 'Mehedi Hasan',
                'role' => 'Owner, Fitness GYM Centre',
                'image' => 'images/client/mehedi-hasan.png',
                'text' => 'I love the member measurement tracking and the professional website integration. It makes our business look top-tier and our members absolutely love it.',
                'stars' => 5,
            ],
        ];

        return view('pages.home', [
            'testimonials' => $testimonials,
        ]);
    }
}
