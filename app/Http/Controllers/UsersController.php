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
