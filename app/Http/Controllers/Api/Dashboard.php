<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Music\Category;
use App\Models\Music\Singer;
use App\Models\Music\Song;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function category()
    {
        $result = Category::select('name', 'image', 'id')->where('status', 1)->get();

        if ($result) {
            $result = $result->map(function ($result) {
                $result->image =  url($result->image);
                // $result->id =  encrypt($result->id);
                return $result;
            });
        }


        return response()->json($result, 200);
    }

    public function mostPlayed()
    {
        $result = Song::select('title', 'image', 'id', 'song', 'category', 'singer')->where('status', 1)->orderby('count', 'desc')->get();

        if ($result) {
            $result = $result->map(function ($result) {
                $result->image =  url($result->image);
                $result->song =  url($result->song);
                $result->category =  Category::where('id', $result->category)->first()->name;
                $result->singer =  Singer::where('id', $result->singer)->first()->name;
                // $result->id =  encrypt($result->id);

                return $result;
            });
        }

        return response()->json($result, 200);
    }

    public function categorySong(string $id)
    {
        $result = Song::select('title', 'image', 'id', 'url as song', 'category', 'singer')->where('category', $id)->where('status', 1)->get();

        if ($result) {
            $result = $result->map(function ($result) {
                $result->image =  url($result->image);
                // $result->song =  url($result->song);
                $result->category =  Category::where('id', $result->category)->first()->name;
                $result->singer =  Singer::where('id', $result->singer)->first()->name;
                // $result->id = encrypt($result->id);

                return $result;
            });
        }


        return response()->json($result, 200);
    }

    public function song(string $id)
    {

        $result = Song::select('title', 'image', 'cover_image', 'id', 'song', 'category', 'singer', 'count')->where('id', $id)->where('status', 1)->first();
        $result->update(["count" => $result->count + 1]);

        if ($result) {
            $result->image =  url($result->image);
            $result->cover_image =  url($result->cover_image);
            $result->song =  url($result->song);
            // $result->id = encrypt($result->id);
            $result->category =  Category::where('id', $result->category)->first()->name;
            $result->singer =  Singer::where('id', $result->singer)->first()->name;
            $prev = Song::where('id', '>', $id)->where('status', 1)->first();
            $result->prev = $prev ? $prev->id : null;
            $next = Song::where('id', '<', $id)->where('status', 1)->first();
            $result->next = $next ? $next->id : null;
        }




        return response()->json($result, 200);
    }
}
