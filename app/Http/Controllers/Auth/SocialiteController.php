<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialiteController extends Controller
{
    public function login(Request $request, string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }
 
    public function callback(Request $request, string $provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'socialite_id' => $socialUser->id,
        ], [
            'name' => ($socialUser->name ?? $socialUser->nickname),
            'email' => $socialUser->email,
            'password' => Str::password(),
            'socialite_provider' => $provider,
        ]);
    
        Auth::login($user, remember: true);
    
        return redirect()->intended(RouteServiceProvider::HOME);
    }

}
