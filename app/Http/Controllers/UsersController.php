<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
    public function __construct(){}

    public function getGithubUsers()
    {
        $token = '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'; // Replace with your GitHub token

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];
        $response = \Http::withHeaders($headers)->get('https://api.github.com/search/users', [
            'q' => 'followers:>1000',
            'per_page' => 10 // per page - number of users we want to get
        ]);

        $users = $response->json('items');

        $usersWithFollowers = [];
        foreach ($users as $user) {
            $userResponse = \Http::withHeaders($headers)->get($user["url"]);

            $userData = $userResponse->json();

            $user['followers_count'] = $userData["followers"];
            $usersWithFollowers[] = $user;
        }
        return view('index')->with('usersData',$usersWithFollowers);
    }
}
