<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /*Load our Home page*/
    public function index()
    {
        $currencies = Currency::orderBy('code')->get();
        return view('register')->with('currencies', $currencies);
    }
}
