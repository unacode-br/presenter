<?php

namespace App\Units\Auth\Http\Controllers\Social;

use Auth;
use Socialite;
use App\Domains\Users\User;

class FacebookController extends SocialController
{
    /**
     * Redireciona à pagina de autenticação
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Pega as informações do Facebook
     */
    public function handleProviderCallback()
    {
      try {
          $user = Socialite::driver('facebook')->user();
      } catch (Exception $e) {
          return Redirect::to('auth/facebook');
      }

      $authUser = $this->findOrCreateUser($user);

      Auth::login($authUser, true);

      return view('home::home');
    }

    /**
     *Se existir retorna o Usuario.
     *Se não existir cria usuario
     */
    private function findOrCreateUser($facebookUser)
    {
        if ($authUser = User::where('facebook_id', $facebookUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
        ]);
    }
}
