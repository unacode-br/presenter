<?php 

namespace App\Domains\Users\Providers;

use App\Domains\Users\Events\UserCreated;
use App\Domains\Users\Listeners\SendsUserMail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
* 
*/
class EventServiceProvider extends ServiceProvider
{
	protected $listen = [
		UserCreated::class=>[
			SendsUserMail::class,
		],
	];
}
