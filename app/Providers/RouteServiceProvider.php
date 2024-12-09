<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;


class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/dashboard';

    public const ADMIN = '/admin';
    // public const WELCOME = '/';

    public const WELCOME = '/admin/login-form';

}