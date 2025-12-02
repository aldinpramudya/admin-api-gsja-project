<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PosisiPanitia;
use App\Models\SusunanPanitia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SusunanPanitiaController extends Controller
{
    public function index()
    {
        $panitia = SusunanPanitia::with('posisiPanitia')->paginate(10);
        return view('susunanPanitia.index', compact('panitia'));
    }

    public function create()
    {
        $posisi = PosisiPanitia::all();
        return view('susunanPanitia.createSusunanPanitia', compact('posisi'));
    }

    public function edit(SusunanPanitia $susunanPanitia)
    {
        $posisi = PosisiPanitia::all();
        return view('susunanPanitia.editSusunanPanitia', compact('posisi', 'susunanPanitia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name_position_id" => 'required|exists:posisi_panitia,id',
            "name_panitia" => 'required|string',
            "image_panitia" => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image_panitia')) {
            $imagePath = $request->file('image_panitia')->store('susunanPanitia', 'public');
        } else {
            $imagePath = "Default";
        }

        SusunanPanitia::create([
            "name_position_id" => $request->name_position_id,
            "name_panitia" => $request->name_panitia,
            "image_panitia" => $imagePath,
        ]);

        return redirect()->route('admin.susunanPanitia.index')->with('success', "Data Panitia berhasil dimasukkan");
    }

    public function update(Request $request, SusunanPanitia $susunanPanitia)
    {
        $request->validate([
            "name_position_id" => 'required|exists:posisi_panitia,id',
            "name_panitia" => 'required|string',
            "image_panitia" => 'nullable|image|max:2048'
        ]);

        $imagePath = $susunanPanitia->image_panitia;

        if ($request->hasFile('image_panitia')) {
            if ($susunanPanitia->image_panitia && str_starts_with($susunanPanitia->image_panitia, 'susunanPanitia')) {
                $imagePath = $request->file('image_panitia')->store('susunanPanitia', 'public');
            }
        }

        $susunanPanitia->update([
            "name_position_id" => $request->name_position_id,
            "name_panitia" => $request->name_panitia,
            "image_panitia" => $imagePath,
        ]);

        return redirect()->route('admin.susunanPanitia.index')->with('success', "Data Panitia berhasil diedit");
    }

    public function destroy(SusunanPanitia $susunanPanitia)
    {
        if($susunanPanitia->image_panitia){
            Storage::disk('public')->delete($susunanPanitia->image_panitia);
        }
        $susunanPanitia->delete();
        return redirect()->route('admin.susunanPanitia.index')->with('success', "Data Panitia berhasil dihapuskan");
    }
}
