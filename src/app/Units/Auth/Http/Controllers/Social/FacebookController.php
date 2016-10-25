<?php

namespace App\Units\Auth\Http\Controllers\Social;

class FacebookController extends SocialController
{
    public function __construct()
    {
        $this->provider = 'facebook';
    }
}
