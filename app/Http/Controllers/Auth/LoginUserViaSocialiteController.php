<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginUserViaSocialiteController extends Controller
{
    public function create($provider)
    {
        // Redirect the user to the Google/Microsoft login page
        return Socialite::driver($provider)->redirect();
    }

    public function redirectToMicrosoft()
    {
        return Socialite::driver('microsoft')
            ->with([
                'tenant' => config('services.microsoft.tenant', 'frt.utn.edu.ar')
            ])
            ->redirect();
    }

    public function store($provider)
    {
        // Get the user from the Google/Microsoft callback
        $socialiteUser = Socialite::driver($provider)->user();

        // Check if the user exists
        $user = User::where($provider.'_id', $socialiteUser->id)->first();

        // If the user does not exist, do not log them in and redirect them to the login page
        if ($user) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            $user = User::where('email', $socialiteUser->email)->first();

                if($user){
                    // Si existe el usuario, actualiza los datos del provider.
                    $user[$provider.'_id'] = $socialiteUser->id;
                    $user[$provider.'_token'] = $socialiteUser->token;
                    $user->profile_photo_path = $socialiteUser->avatar;
                    $user->save();
                    Auth::login($user);
                } else {
                    // Si no existe el usuario, hay que crearlo
                    $newUser = User::create([
                        'name' => $socialiteUser->name,
                        'email' => $socialiteUser->email,
                        $provider.'_id'=> $socialiteUser->id,
                        $provider.'_token' => $socialiteUser->token,
                        'username' => $socialiteUser->email,
                        'profile_photo_path' => $socialiteUser->avatar,
                        'password' => encrypt('password'.Str::random(8))
                    ]);

                    Auth::login($newUser);
                }
        }

        return redirect()->route('home');
    }
}