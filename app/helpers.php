<?php

use Illuminate\Support\Facades\Route;

/**
 * Custom function to check if the current route matches a given route.
 */
if (! function_exists('active_route')) {
    function active_route($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if (! function_exists('route_active')) {
    function route_active($route)
    {
        return Route::is($route) ? 'mm-active' : '';
    }
}

if (! function_exists('route_true')) {
    function route_true($route)
    {
        return Route::is($route) ? true : '';
    }
}
