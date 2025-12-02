<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PosisiPanitia;
use Illuminate\Http\Request;

class PosisiPanitiaController extends Controller
{
    public function index()
    {
        $posisiPanitias = PosisiPanitia::paginate(10);
        return view('posisiPanitia.index', compact('posisiPanitias'));
    }

    public function create()
    {
        return view('posisiPanitia.createPosisiPanitia');
    }

    public function edit(PosisiPanitia $posisiPanitia)
    {
        return view('posisiPanitia.editPosisiPanitia', compact('posisiPanitia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name_position" => "required|string"
        ]);

        PosisiPanitia::create([
            "name_position" => $request->name_position,
        ]);

        return redirect()->route("admin.posisiPanitia.index")->with("success", "Posisi / Role Panitia Berhasil ditambahkan");
    }

    public function update(Request $request, PosisiPanitia $posisiPanitia)
    {
        $request->validate([
            "name_position" => "required|string"
        ]);

        $posisiPanitia->update([
            "name_position" => $request->name_position,
        ]);

        return redirect()->route("admin.posisiPanitia.index")->with("success", "Posisi / Role Panitia Berhasil diedit");
    }

    public function destroy(PosisiPanitia $posisiPanitia)
    {
        $posisiPanitia->delete();
        return redirect()->route("admin.posisiPanitia.index")->with("success", "Posisi / Role Panitia Berhasil dihapus");
    }
}
