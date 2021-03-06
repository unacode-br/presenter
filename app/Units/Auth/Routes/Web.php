<?php

namespace App\Units\Auth\Routes;

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
        // Authentication routes.
        $this->authenticationRoutes();

        // Authentication Socialite
        $this->socialAuthRoutes();
    }


    protected function authenticationRoutes()
    {
        $this->router->get('login', 'LoginController@showLoginForm')
            ->name('login');
        $this->router->post('logout', 'LoginController@logout');
    }

    protected function socialAuthRoutes()
    {
      $this->router->get('/auth/github', 'Social\GithubController@redirectToProvider');
      $this->router->get('/auth/github/redirect', 'Social\GithubController@handleProviderCallback');

      $this->router->get('/auth/facebook', 'Social\FacebookController@redirectToProvider');
      $this->router->get('/auth/facebook/redirect', 'Social\FacebookController@handleProviderCallback');

      $this->router->get('/auth/google', 'Social\GoogleController@redirectToProvider');
      $this->router->get('/auth/google/redirect', 'Social\GoogleController@handleProviderCallback');

    }

}
