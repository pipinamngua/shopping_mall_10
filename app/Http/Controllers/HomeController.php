<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function changeLanguage($language)
    {
        Session::put('website_language', $language);
        
        return redirect()->back();
    }
}
