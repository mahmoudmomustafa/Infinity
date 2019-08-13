<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use League\OAuth1\Client\Server\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // github
    // public function redirectToProvider()
    // {
    //     return Socialite::driver('github')->redirect();
    // }
    // public function handleProviderCallback()
    // {
    //     $user = Socialite::driver('github')->user();
    //     // $authUser = User::firstOrNew(['github_id'=>$user->id]);
    //     dd($user);
    //     // $authUser->name=$user->name;
    //     // $authUser->email=$user->email;

    //     // $authUser->save();

    //     // auth()->login($authUser);
        
    //     // return redirect('/');
    // }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    // private function findOrCreateUser($githubUser)
    // {
    //     if ($authUser = User::where('github_id', $githubUser->id)->first()) {
    //         return $authUser;
    //     }

    //     return User::create([
    //         'name' => $githubUser->name,
    //         'email' => $githubUser->email,
    //         'github_id' => $githubUser->id,
    //         'avatar' => $githubUser->avatar
    //     ]);
    // }
}
