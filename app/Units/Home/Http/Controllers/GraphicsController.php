<?php

namespace App\Units\Home\Http\Controllers;

use App\Domains\Graphics\FrameworkRadar;
use App\Domains\Graphics\LanguagesIndex;
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

    public function showGraphicsLearningCurve($language = 'python')
    {
        $learning = LearningCurve::getLearningCurveByLanguage($language);

        if (!$learning) {
            abort(404);
        }

        return view('home::Graphics.learning_curve.language', compact(['learning']));
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

    public function showGraphicsFrameworks()
    {
        $radar = FrameworkRadar::getTrendingFrameworks();

        return view('home::Graphics.radar', compact(['radar']));
    }

    public function showGraphicsLanguages()
    {
        $languages = LanguagesIndex::getIndexedLanguages();

        return view('home::Graphics.tiobe', compact(['languages']));
    }
}
