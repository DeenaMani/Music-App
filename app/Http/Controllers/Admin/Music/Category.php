<?php

namespace App\Http\Controllers\Admin\Music;

use App\Http\Controllers\Controller;
use App\Models\Music\Category as MusicCategory;
use App\Models\Music\Song;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function index(Request $request)
    {
        $data = $request->get('search');
        $query = MusicCategory::query();
        if ($data) {
            $query->where('name', 'like', '%' . $data . '%');
        }
        $categories = $query->withCount('songs')->paginate(20);

        return view('admin.pages.music.category.index', compact('categories', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:max:40',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:512'
        ]);

        $category = MusicCategory::where('name', $request->name)->first();

        if ($category) {
            return redirect()->back()->with('error', config('messages.music.category.nameDublicate'));
        }

        $data = $request->all();
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/category');
            $images->move($destinationPath, $image);
            $data['image'] = 'public//image/category/' . $image;
        }

        $category = new MusicCategory();
        $category = MusicCategory::create($data);

        return redirect()->back()->with('success', config('messages.music.category.added'));
    }

    public function update(Request $request, string $id)
    {
        $category = MusicCategory::find(decrypt($id));

        $request->validate([
            'name' => 'required:max:40',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:512',
            'status' => 'nullable|in:1,2'
        ]);

        $exist = MusicCategory::where('name', $request->name)->where('id', '!=', decrypt($id))->first();

        if ($exist) {
            return redirect()->back()->with('error', config('messages.music.category.nameDublicate'));
        }

        $data = $request->all();
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            $image = time() . '.' . $images->getClientOriginalExtension();
            $destinationPath = public_path('/image/category');
            $images->move($destinationPath, $image);
            $data['image'] = 'public/image/category/' . $image;
            unlink(base_path($category->image));
        }

        $category->update($data);

        return redirect()->back()->with('success', config('messages.music.category.updated'));
    }

    public function destroy(string $id)
    {
        $exist = Song::where('category', decrypt($id))->first();

        if ($exist) {
            return redirect()->back()->with('error', config('messages.music.category.deleteError'));
        }

        $category = MusicCategory::find(decrypt($id));
        $category->delete();

        return redirect()->back()->with('success', config('messages.music.category.delete'));
    }
}
