<?php

namespace App\Units\Auth\Http\Controllers\Social;

use Auth;
use Socialite;
use App\Domains\Users\User;

class FacebookController extends SocialController
{
    /**
     * Redirect to Facebook auth provider.
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Catch the user information from Facebook.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect()->to('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->to('/home');
    }

    /**
     * Find an existing user or create one.
     * @param $user
     * @return static
     */
    private function findOrCreateUser($user)
    {
        if ($authUser = User::where('facebook_id', $user->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name'        => $user->name,
            'email'       => $user->email,
            'facebook_id' => $user->id,
        ]);
    }
}
