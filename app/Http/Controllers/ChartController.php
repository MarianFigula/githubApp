<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTimeZone;
use GuzzleHttp\Client;
use Throwable;

class ChartController extends Controller
{
    public function __construct(){}

    public function getNumberOfFollowers($username)
    {
        $token = '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';

        $client = new Client();
        $response = $client->post('https://api.github.com/graphql', [
            'headers' => [
                'Authorization' => "Bearer {$token}",
            ],
            'json' => [
                'query' => '
                   query ($login: String!) {
                       user(login: $login) {
                           followers(first: 100) {
                               nodes {
                                   createdAt
                               }
                           }
                       }
                   }
                ',
                'variables' => [
                    'login' => $username,
                ],
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $followerCount = [];
        $hours = [];

        try {
            $followers = $data['data']['user']['followers']['nodes'];
        }catch (Throwable $e){
            report($e);
            return view('chart', compact('hours', 'followerCount', 'username'));
        }


        $endTime = Carbon::now(new DateTimeZone('UTC'));
        for ($i = 24; $i >= 0; $i--) {
            $startTime = $endTime->copy()->subHour();
            $date = $startTime->format('d.m - H:i');
            $hours[] = $date;
            $count = 0;
            foreach ($followers as $follower) {

                $createdAt = Carbon::parse($follower['createdAt'])->setTimezone('UTC');
                if ($createdAt >= $startTime && $createdAt < $endTime) {
                    $count++;
                }
            }
            $followerCount[] = $count;
            $endTime = $startTime;
        }

        return view('chart', compact('hours', 'followerCount', 'username'));
    }
}
