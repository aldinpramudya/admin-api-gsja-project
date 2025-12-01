<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    // Halaman Index Tag
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tag.index', compact('tags'));
    }

    // Halaman Create Tag
    public function create()
    {
        return view('tag.createTag');
    }

    // Halaman Edit Tag
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.editTag', compact('tag'));
    }

    // Menyimpan Tag Baru
    public function store(Request $request)
    {
        $request->validate([
            'tags_name' => 'required|string|max:255'
        ]);

        Tag::create([
            'tags_name' => $request->tags_name,
            'slugs' => Str::slug($request->tags_name)
        ]);

        return redirect()->route('admin.tag.index')->with('success', 'Tag Berhasil Dibuat');
    }

    // Update Tag 
    public function update(Request $request, $id)
    {
        $request->validate([
            'tags_name' => 'required|string|max:255',
        ]);
        $tag = Tag::findOrFail($id);
        $tag->update([
            'tags_name' => $request->tags_name,
            'slugs' => Str::slug($request->tags_name)
        ]);

        return redirect()->route('admin.tag.index')->with('success', 'Tag Berhasil Diedit');
    }

    // Delete Tag
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tag.index')->with('success', 'Tag Berhasil Didelete');
    }
}
