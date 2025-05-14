<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * The callback that should be used to generate the authentication redirect path.
     *
     * @var callable|null
     */
    protected static $redirectToCallback;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectTo($request, $guard));
            }
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are authenticated.
     */
    protected function redirectTo(Request $request, ?string $guard): ?string
    {
        return static::$redirectToCallback
            ? call_user_func(static::$redirectToCallback, $request)
            : $this->defaultRedirectUri($request, $guard);
    }

    /**
     * Get the default URI the user should be redirected to when they are authenticated.
     */
    protected function defaultRedirectUri(Request $request, ?string $guard): string
    {

        if ($guard == 'admin') {
            $routeName = 'admin.dashboard';
        }else if ($guard == 'web') {
            if ($request->user()->role == 'student') {
                $routeName = 'student.dashboard';
            } else {
                $routeName = 'instructor.dashboard';
            }
        }

        if (Route::has($routeName)) {
            return route($routeName);
        }

        return '/';

        /** ------------------------------------------- */
        /** Initial */
        /** ------------------------------------------- */

        // $routes = [
        //     'admin' => 'admin.dashboard',
        //     'web' => 'dashboard'
        // ];

        // if(array_key_exists($guard, $routes)){
        //     $routeName = $routes[$guard];
        //     if(Route::has($routeName)){
        //         return route($routeName);
        //     }
        // }

        /** ------------------------------------------- */
        /** Default */
        /** ------------------------------------------- */

        // foreach (['dashboard', 'home'] as $uri) {
        //     if (Route::has($uri)) {
        //         return route($uri);
        //     }
        // }

        // $routes = Route::getRoutes()->get('GET');

        // foreach (['dashboard', 'home'] as $uri) {
        //     if (isset($routes[$uri])) {
        //         return '/'.$uri;
        //     }
        // }
    }

    /**
     * Specify the callback that should be used to generate the redirect path.
     *
     * @param  callable  $redirectToCallback
     * @return void
     */
    public static function redirectUsing(callable $redirectToCallback)
    {
        static::$redirectToCallback = $redirectToCallback;
    }
}
