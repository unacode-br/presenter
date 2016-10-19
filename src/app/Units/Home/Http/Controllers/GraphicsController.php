<?php

namespace App\Units\Home\Http\Controllers;

use App\Domains\Trends\Trend;
use Codecasts\Support\Http\Controller;

/**
 * Class GraphicsController.
 */
class GraphicsController extends Controller
{

    public function showGraphicsStars()
    {
        $repositories = Trend::getMostStaredRepositories();

        return view('home::Graphics.Trends.stars', compact(['repositories']));
    }

    public function showGraphicsForks()
    {
        $repositories = Trend::getMostForkedRepositories();

        return view('home::Graphics.Trends.forks', compact(['repositories']));
    }

}
