<?php

namespace App\Units\Auth\Http\Controllers\Social;

use Auth;
use Socialite;
use App\Domains\Users\User;
use App\Domains\Users\Mails\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Codecasts\Support\Http\Controller;

abstract class SocialController extends Controller
{
    protected $provider;

    /**
     * Redirect to social network auth provider.
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver($this->provider)->redirect();
    }

    /**
     * Catch the user information from the social network.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver($this->provider)->user();
        } catch (Exception $e) {
            return redirect()->to('auth/' . $this->provider);
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
    protected function findOrCreateUser($user)
    {
        if ($authUser = User::where('provider', $this->provider)->where('provider_id', $user->id)->first()) {
            return $authUser;
        }

        $user = User::create([
            'provider'    => $this->provider,
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
