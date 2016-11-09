<?php

namespace App\Units\Home\Http\Controllers;

use App\Domains\Graphics\LearningCurve;
use App\Domains\Graphics\LearningCurveAll;
use App\Domains\Graphics\Trend;
use Codecasts\Support\Http\Controller;

/**
 * Class GraphicsController.
 */
class GraphicsController extends Controller
{
    public function showGraphicsLcLang()
    {
        $languages = LearningCurveAll::getTopLanguages();

        return view('home::Graphics.learning_curve.languages', compact(['languages']));
    }

    public function showGraphicsLearningCurve($language = 'actionscript')
    {
        $language = LearningCurve::where('language.slug', strtolower($language))->first();
        $languages = LearningCurve::orderBy('language.slug', 'asc')->get(['language.slug', 'language.name']);

        if ($language) {
            $proportion = $language->points[0]['value'] / $language->points[1]['value'];

            return view('home::Graphics.learning_curve.language', compact(['language', 'languages', 'proportion']));
        }

        abort(404);
    }

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
