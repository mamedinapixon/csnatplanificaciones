<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\Docente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            //@csnat.unt.edu.ar
            //dd(substr($user->email,-17)." - ".config('services.google.restrict_domain'));
            /*if(strcmp(substr($user->email,-16), config('services.google.restrict_domain')) != 0)
            {
                session()->flash('message', 'Debes iniciar sesión con una cuenta '.config('services.google.restrict_domain'));
                return redirect()->route('login');
            }*/

            $finduser = User::where('google_id', $user->id)->first();
            //dd($user);

            if($finduser){

                Auth::login($finduser);

                return redirect()->route("home");

            }else{
                $finduser = User::where('email', $user->email)->first();

                if($finduser){
                    // Si existe el usuario, actualiza los datos de google.
                    $finduser->google_id = $user->id;
                    $finduser->google_token = $user->token;
                    $finduser->profile_photo_path = $user->avatar;
                    $finduser->save();
                    Auth::login($finduser);
                } else {
                    // Si no existe el usuario, hay que verificar si el mail se encuentra en la lista de docentes.
                    //$finddocente = Docente::where('email', $user->email)->first();

                    //if($finddocente)
                    //{
                        $newUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'google_id'=> $user->id,
                            'google_token' => $user->token,
                            'username' => $user->email,
                            'profile_photo_path' => $user->avatar,
                            'password' => encrypt('password'.Str::random(8))
                        ]);
                        //$finddocente->user_id = $newUser->id;
                        //$finddocente->save();
                        Auth::login($newUser);
                    /*} else {
                        session()->flash('message', 'El mail '.$user->email.' no se encuentra asociado a un docente. Contacte con académica.');
                        return redirect()->route('login');
                    }*/
                }

                return redirect()->route("home");
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
