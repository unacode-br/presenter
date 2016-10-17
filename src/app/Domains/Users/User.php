<?php

namespace App\Domains\Users;

use App\Domains\Users\Presenters\UserPresenter;
use Codecasts\Presenter\Presentable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Presentable, Notifiable;

    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'users';

    /**
     * @var string User Presenter class
     */
    protected $presenter = UserPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'email', 'provider', 'provider_id', 'avatar', 'extras'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
