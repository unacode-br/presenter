<?php

namespace App\Units\Home\Http\Controllers;

use App\Domains\Graphics\LearningCurve;
use Codecasts\Support\Http\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $random = mt_rand(0, LearningCurve::count() - 1);

        $language = LearningCurve::skip($random)->first();

        return view('home::home', compact(['random', 'language']));
    }
}
