<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        // dd('ok');
        $user = Socialite::driver('facebook')->stateless()->user();
        // dd($user);

        $findUser = User::where('facebook_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('blog.index');
        } else {
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                // L'utilisateur existe déjà, effectuez les opérations nécessaires (par exemple, authentification)
                Auth::login($existingUser);
                return redirect()->route('blog.index');
            } else {
                // L'utilisateur n'existe pas, créez un nouvel utilisateur
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('Test123456')
                ]);

                Auth::login($newUser);
                return redirect()->route('blog.index');
            }
        }
    }
}
