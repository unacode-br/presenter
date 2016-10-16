<?php

namespace App\Units\Auth\Http\Controllers;

use Codecasts\Support\Http\Controller;
use Socialite;
use App\Domains\Users\User;
use Auth;

class SocialAuthController extends Controller
{
    /**
     * Redireciona à pagina de autenticação
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Pega as informações do Github
     */
    public function handleProviderCallback()
    {
      try {
          $user = Socialite::driver('github')->user();
      } catch (Exception $e) {
          return Redirect::to('auth/github');
      }

      $authUser = $this->findOrCreateUser($user);

      Auth::login($authUser, true);

      return view('home::home');
    }

    /**
     *Se existir retorna o Usuario.
     *Se não existir cria usuario
     */
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
    }
}
