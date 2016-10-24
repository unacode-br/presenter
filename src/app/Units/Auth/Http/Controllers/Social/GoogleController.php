<?php

namespace App\Units\Auth\Http\Controllers\Social;

use Auth;
use Socialite;
use App\Domains\Users\User;
use App\Domains\Users\Mails\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GoogleController extends SocialController
{
    /**
     * Redirect to Google auth provider.
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Catch the user information from Google.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect()->to('auth/google');
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
        if ($authUser = User::where('provider', 'google')->where('provider_id', $user->id)->first()) {
            return $authUser;
        }

        $user = User::create([
            'provider'    => 'google',
            'name'        => $user->name,
            'email'       => $user->email,
            'provider_id' => $user->id,
            'avatar'      => $user->avatar,
            'extras'      => [],
        ]);

        Mail::to($user)->send(new SendMail($user));
        return $user;
    }
}
