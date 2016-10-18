<?php

namespace App\Units\Home\Http\Controllers;

use Codecasts\Support\Http\Controller;

/**
 * Class GraphicsController.
 */
class GraphicsController extends Controller
{

	public function showGraphicsStars()
	{
		return view('home::Graphics.Trends.stars');
	}

	public function showGraphicsForks()
	{
		return view('home::Graphics.Trends.forks');
		
	}

}