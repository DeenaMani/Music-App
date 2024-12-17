<?php

namespace App\Http\Controllers\Admin\Music;

use App\Http\Controllers\Controller;
use App\Models\Music\Category;
use App\Models\Music\Singer;
use App\Models\Music\Song as MusicSong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Song extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $songs = MusicSong::all();

        $songs = $songs->map(function ($song) {
            $song->category = Category::where('id', $song->category)->first()->name;
            $song->singer = Singer::where('id', $song->singer)->first()->name;
            return $song;
        });

        return view('admin.pages.music.song.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $singers = Singer::where('status', 1)->get();
        return view('admin.pages.music.song.create', compact('singers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'singer' => 'required',
            'title' => 'required:max:60',
            // 'song' => 'required|mimes:mp3,wav,flac,aac,ogg',
            'song' => 'required|mimes:mp3',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:512',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:512',
            'status' => 'nullable|in:[1,2]'
        ]);

        $category = MusicSong::where('title', $request->title)
            ->where('category', $request->category)
            ->where('singer', $request->singer)
            ->first();

        if ($category) {
            return redirect()->back()->with('error', config('messages.music.song.nameDublicate'));
        }

        $data = $request->all();
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/song/image');
            $images->move($destinationPath, $image);
            $data['image'] = 'public/image/song/image/' . $image;
        }

        if ($request->hasfile('cover_image')) {
            $images = $request->file('cover_image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/cover_image');
            $images->move($destinationPath, $image);
            $data['cover_image'] = 'public/image/cover_image/' . $image;
        }

        if ($request->hasfile('song')) {
            $images = $request->file('song');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/media/song');
            $images->move($destinationPath, $image);
            $data['song'] = 'public/media/song/' . $image;
        }

        $data['song_id'] = (intval(MusicSong::orderBy('id', 'desc')->first()->song_id) ?? 0) + 1;

        $category = new MusicSong();
        $category = MusicSong::create($data);

        return redirect()->route('music.song.index')->with('success', config('messages.music.song.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where('status', 1)->get();
        $singers = Singer::where('status', 1)->get();
        $song = MusicSong::find(decrypt($id));
        return view('admin.pages.music.song.edit', compact('singers', 'categories', 'song'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = MusicSong::find(decrypt($id));

        $request->validate([
            'category' => 'required',
            'singer' => 'required',
            'title' => 'required:max:60',
            // 'song' => 'required|mimes:mp3,wav,flac,aac,ogg',
            'song' => 'nullable|mimes:mp3',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:512',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:512',
            'status' => 'nullable|in:[1,2]'
        ]);

        $category = MusicSong::where('title', $request->title)
            ->where('category', $request->category)
            ->where('singer', $request->singer)
            ->where('id', '!=', decrypt($id))->first();

        if ($category) {
            return redirect()->back()->with('error', config('messages.music.song.nameDublicate'));
        }

        $data = $request->all();
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/song/image');
            $images->move($destinationPath, $image);
            $data['image'] = 'public/image/song/image/' . $image;

            Storage::disk('public')->delete($song->image);
        }

        if ($request->hasfile('cover_image')) {
            $images = $request->file('cover_image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/cover_image');
            $images->move($destinationPath, $image);
            $data['cover_image'] = 'public/image/cover_image/' . $image;

            if ($song->cover_image) {
                Storage::disk('public')->delete($song->cover_image);
            }
        }

        if ($request->hasfile('song')) {
            $images = $request->file('song');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/media/song');
            $images->move($destinationPath, $image);
            $data['song'] = 'public/media/song/' . $image;
            Storage::disk('public')->delete($song->song);
        }

        $song->update($data);

        return redirect()->route('music.song.index')->with('success', config('messages.music.song.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = MusicSong::find(decrypt($id));

        unlink(url($song->image));
        if ($song->cover_image) {
            unlink(url($song->cover_image));
        }
        unlink(url($song->song));
        $song->delete();

        return redirect()->back()->with('success', config('messages.music.song.delete'));
    }
}
