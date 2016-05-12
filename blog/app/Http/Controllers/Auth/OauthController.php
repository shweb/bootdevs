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
        return \Socialite::driver('bitbucket')->redirect(); //Bitbucket scope define in UI
    }

    /**
     * Obtain the user information from Bitbucket.
     *
     * @return Response
     */
    public function bitbucket_handleProviderCallback()
    {
        try {
            $user = \Socialite::driver('bitbucket')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/bitbucket');
        }

        // If the user is not logged in
        if ( \Auth::guest() )
            $authUser = $this->findOrCreateUser($user, 'bitbucket');
        else
            $authUser = $this->bindAccount($user, 'bitbucket');

        \Auth::login($authUser, true);

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
        $type = $type . "_id";
        \Auth::User()->$type = $git_User->id . ',' . $git_User->token;
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
