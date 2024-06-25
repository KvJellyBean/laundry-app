<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
{
    $servicePackages = ServicePackage::where('status', 'active')->get();
    return view('home', [
        'about' => $this->aboutData(),
        'services' => $this->servicesData(),
        'contact' => $this->contactData(),
        'signup' => $this->signupData(),
        'signin' => $this->signinData(),
        'servicePackages' => $servicePackages,
    ]);
}

    public function about() {
        return view('about', [
            'data' => $this->aboutData()
        ]);
    }

    public function services() {
        return view('services', [
            'data' => $this->servicesData()
        ]);
    }

    public function contact() {
        return view('contact', [
            'data' => $this->contactData()
        ]);
    }

    public function signin() {
        return view('signin');
    }
    private function aboutData() {
        // Fetch or prepare data for the about section
        return [
            'title' => 'About Us',
            'description' => 'Information about the laundry service.'
        ];
    }

    private function servicesData() {
        // Fetch or prepare data for the services section
        return [
            [
                'title' => 'Cuci',
                'description' => 'This is our most basic service.',
                'logo' => 'service1.jpg',
                'price' => '10',
                'pros' => ['Affordable', 'Fast'],
                'cons' => ['Basic features only'],
                'link' => 'services'
            ],
            [
                'title' => 'Setrika',
                'description' => 'This is our intermediate service.',
                'logo' => 'service2.jpg',
                'price' => '20',
                'pros' => ['More features', 'Priority support'],
                'cons' => ['More expensive'],
                'link' => 'services'
            ],
            [
                'title' => 'Cuci Komplit',
                'description' => 'This is our premium service.',
                'logo' => 'service3.jpg',
                'price' => '30',
                'pros' => ['All features', '24/7 support'],
                'cons' => ['Most expensive'],
                'link' => 'services'
            ]
        ];
    }

    // private function servicesData() {
    //     // Fetch or prepare data for the services section
    //     return [
    //         'title' => 'Our Services',
    //         'description' => 'Details of the services offered.'
    //     ];
    // }

    private function contactData() {
        // Fetch or prepare data for the contact section
        return [
            'title' => 'Contact Us',
            'description' => 'Contact details and form.'
        ];
    }

    private function signupData() {
        // Fetch or prepare data for the signup section
        return [];
    }

    private function signinData() {
        // Fetch or prepare data for the signin section
        return [];
    }
}
