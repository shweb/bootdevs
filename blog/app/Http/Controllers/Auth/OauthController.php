<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class OauthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function github_redirectToProvider()
    {
        return \Socialite::driver('github')->scopes(['repo', 'user'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function github_handleProviderCallback()
    {
        try {
            $user = \Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/github');
        }

        // If the user is not logged in
        if ( \Auth::guest() )
            $authUser = $this->findOrCreateUser($user, 'github');
        else
            $authUser = $this->bindAccount($user, 'github');

        \Auth::login($authUser, true);

        return Redirect::to('git-manager');
    }

    /**
     * Redirect the user to the Bitbucket authentication page.
     *
     * @return Response
     */
    public function bitbucket_redirectToProvider()
    {
        return Redirect::to('https://bitbucket.org/site/oauth2/authorize?client_id=' . config('services.bitbucket.client_id') . '&response_type=code');
        //return \Socialite::driver('bitbucket')->redirect(); //Bitbucket scope define in UI
    }

    /**
     * Obtain the user information from Bitbucket.
     * Bitbucket is in Oauth1 which cannot do direct code pull
     *
     * @return Response
     */
    public function bitbucket_handleProviderCallback(Request $request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://bitbucket.org/site/oauth2/access_token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, config('services.bitbucket.client_id') . ':' . config('services.bitbucket.client_secret'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=authorization_code&code=" . $request->input('code'));
        curl_setopt($ch, CURLOPT_URL, 'https://bitbucket.org/site/oauth2/access_token');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        $access_token = json_decode($server_output)->access_token;

        \Auth::User()->bitbucket_id = $access_token;
        \Auth::User()->save();

        return Redirect::to('git-manager');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($git_User, $type)
    {
        $binded_value = $git_User->id . ',' . $git_User->token;

        if ($authUser = \User::where($type . "_id", $binded_value)->first() ) {
            return $authUser;
        }

        return \User::create([
            'name' => $git_User->name,
            'email' => $git_User->email,
            $type . "_id" => $git_User,
            'avatar_path' => $git_User->avatar,
        ]);
    }

    /**
     * Bind this github account to BootDev for git pull
     *
     * @param $githubUser
     * @return User
     */
    private function bindAccount($git_User, $type)
    {
        //Store OAuth 1 token, work on OAuth 2 later
        $type = $type . "_id";
        \Auth::User()->$type = $git_User->id . ',' . $git_User->token . ',' . $git_User->tokenSecret;
        \Auth::User()->save();

        return \Auth::User();
    }

    /**
     * Remove the access token from DB.
     *
     * @return Response
     */
    public function unbind(Request $request)
    {
        $type = $request->input('type') . "_id";
        \Auth::User()->$type = "";
        \Auth::User()->save();

        return Redirect::to('git-manager');
    }

}
