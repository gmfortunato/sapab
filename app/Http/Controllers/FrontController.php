<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Place;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front(){
        $faqs = Faq::all();
        $places = Place::all();

        return view('index', compact(['faqs', 'places']));
    }
}
