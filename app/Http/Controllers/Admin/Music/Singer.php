<?php

namespace App\Http\Controllers\Admin\Music;

use App\Http\Controllers\Controller;
use App\Models\Music\Singer as MusicSinger;
use App\Models\Music\Song;
use Illuminate\Http\Request;

class Singer extends Controller
{
    public function index(Request $request)
    {
        $data = $request->get('search');
        $singers = MusicSinger::when($data, function ($query, $data) {
            $query->where('name', 'like', '%' . $data . '%');
        })
            ->withCount('songs')
            ->paginate(20);

        return view('admin.pages.music.singer.index', compact('singers', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:max:40',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:512'
        ]);

        $singer = MusicSinger::where('name', $request->name)->first();

        if ($singer) {
            return redirect()->back()->with('error', config('messages.music.singer.nameDublicate'));
        }

        $data = $request->all();
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/singer');
            $images->move($destinationPath, $image);
            $data['image'] = 'public/image/singer/' . $image;
        }

        $singer = new MusicSinger();
        $singer = MusicSinger::create($data);

        return redirect()->back()->with('success', config('messages.music.singer.added'));
    }

    public function update(Request $request, string $id)
    {
        $singer = MusicSinger::find(decrypt($id));

        $exist = Song::where('singer', decrypt($id))->first();

        // if ($exist && $request == 2) {
        //     return redirect()->back()->with('error', config('messages.music.singer.inactiveError'));
        // }

        $request->validate([
            'name' => 'required:max:40',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:512',
            'status' => 'nullable|in:1,2'
        ]);

        $singer = MusicSinger::where('name', $request->name)->where('id', '!=', decrypt($id))->first();

        if ($singer) {
            return redirect()->back()->with('error', config('messages.music.singer.nameDublicate'));
        }

        $data = $request->all();
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/singer');
            $images->move($destinationPath, $image);
            $data['image'] = 'public/image/singer/' . $image;
            unlink(url($singer->image));
        }

        $singer->update($data);

        return redirect()->back()->with('success', config('messages.music.singer.updated'));
    }

    public function destroy(string $id)
    {
        $exist = Song::where('singer', decrypt($id))->first();

        if ($exist) {
            return redirect()->back()->with('error', config('messages.music.singer.deleteError'));
        }

        $singer = MusicSinger::find(decrypt($id));
        unlink(url($singer->image));
        $singer->delete();

        return redirect()->back()->with('success', config('messages.music.singer.delete'));
    }
}
