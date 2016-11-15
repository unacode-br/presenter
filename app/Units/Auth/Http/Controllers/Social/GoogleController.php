<?php

namespace App\Units\Auth\Http\Controllers\Social;

class GoogleController extends SocialController
{
    public function __construct()
    {
        $this->provider = 'google';
    }
}
