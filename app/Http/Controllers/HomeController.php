<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function lang($locale)
    {
        if (! in_array($locale, ['en', 'ru', 'de'])) {
            return redirect()->back();
        }
    
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
