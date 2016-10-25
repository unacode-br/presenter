<?php

namespace App\Units\Auth\Http\Controllers\Social;

class GithubController extends SocialController
{
    public function __construct()
    {
        $this->provider = 'github';
    }
}
