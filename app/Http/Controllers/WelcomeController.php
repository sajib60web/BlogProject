<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data['page_name'] = 'Home';
        return view('frontend.index', $data);
    }

    public function about()
    {
        $data['page_name'] = 'About';
        return view('frontend.about', $data);
    }

    public function contact()
    {
        $data['page_name'] = 'Contact';
        return view('frontend.contact', $data);
    }
}
