<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpPostController extends Controller
{
    public function index() {
      // list topstories on the website (500 posts)
      $response = Http::get('https://hacker-news.firebaseio.com/v0/topstories.json');

      //array_slice -> take the first 10 posts
      $postIds = array_slice($response->json(), 0, 10);

      // initialize post number to 1
      $postCount = 1;

      // empty array to fill with each first 10 posts
      $posts = [];

      foreach ($postIds as $postId) {
        $url = "https://hacker-news.firebaseio.com/v0/item/{$postId}.json";
        $postResponse = Http::get($url);
        $postJson = $postResponse->json();

        $postTitle = isset($postJson['title']) ? $postTitle = $postJson['title'] : 'N/A';
        $postUrl = isset($postJson['url']) ? $postUrl = $postJson['url'] : 'N/A';

        $posts[] = [
          'Post number' => $postCount,
          'Title' => $postTitle,
          'URL' => $postUrl,
        ];

        $postCount ++;
      }

        return response()->json($posts);

    }
}


        // if (isset($postJson['title'])) {
          //   $title = $postJson['title'];
          // } else {
            //   $title = 'N/A';
            // }

        // if (isset($postJson['url'])) {
              //   $postUrl = $postJson['url'];
              // } else {
                //   $url = 'N/A';
                // }

        // echo "Article: ", $articleCount . "<br>";
        // "<br>";
        // echo "Title: ", $title . "<br>";
        // "<br";
        // echo "URL: ", $postUrl . "<br>";
        // "<br";
