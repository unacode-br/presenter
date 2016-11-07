<?php

namespace App\Units\Home\Routes;

use Codecasts\Support\Http\Routing\RouteFile;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */
class Web extends RouteFile
{
    /**
     * Declare Web Routes.
     */
    public function routes()
    {
        $this->router->get('/', function () {
            return view('home::welcome');
        });

        $this->router->get('/home', 'HomeController@index')->name('dashboard');
        $this->router->get('/graphics/stars', 'GraphicsController@showGraphicsStars')->name('trends.stars');
        $this->router->get('/graphics/forks', 'GraphicsController@showGraphicsForks')->name('trends.forks');
        $this->router->get('/graphics/trends-lang', 'GraphicsController@showGraphicsLcLang')->name('lc.lang');
        $this->router->get('/graphics/learning/{language}', 'GraphicsController@showGraphicsLearningCurve')->name('learning');
    }

}
