<?php

namespace App\Units\Auth\Http\Controllers\Social;

use Auth;
use Socialite;
use App\Domains\Users\User;

class GoogleController extends SocialController
{
    /**
     * Redireciona à pagina de autenticação
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Pega as informações do Google
     */
    public function handleProviderCallback()
    {
      try {
          $user = Socialite::driver('google')->user();
      } catch (Exception $e) {
          return Redirect::to('auth/google');
      }

      $authUser = $this->findOrCreateUser($user);

      Auth::login($authUser, true);

      return view('home::home');
    }

    /**
     *Se existir retorna o Usuario.
     *Se não existir cria usuario
     */
    private function findOrCreateUser($googleUser)
    {
        if ($authUser = User::where('google_id', $googleUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
        ]);
    }
}
