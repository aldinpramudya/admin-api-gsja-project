<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendeta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PendetaController extends Controller
{
    public function index()
    {
        $pendetas = Pendeta::paginate(10);
        return view('pendeta.index', compact('pendetas'));
    }

    public function create()
    {
        return view('pendeta.createPendeta');
    }

    public function edit($id)
    {
        $pendeta = Pendeta::findOrFail($id);
        return view('pendeta.editPendeta', compact('pendeta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_pendeta' => 'required|string|max:255',
            'image_pendeta' => 'nullable|image|max:2048',
            'salary' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image_pendeta')) {
            $imagePath = $request->file('image_pendeta')->store('pendetas', 'public');
        } else {
            $imagePath = "default";
        }

        Pendeta::create([
            'name_pendeta' => $request->name_pendeta,
            'image_pendeta' => $imagePath,
            'salary' => $request->salary,
        ]);

        return redirect()->route('admin.pendeta.index')->with('success', 'Data Pendeta Baru Sudah Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pendeta = Pendeta::findOrFail($id);

        $request->validate([
            'name_pendeta' => 'required|string|max:255',
            'image_pendeta' => 'nullable|image|max:2048',
            'salary' => 'required|string|max:255',
        ]);

        $imagePath = $pendeta->image_pendeta;

        if ($request->hasFile('image_pendeta')) {
            if ($pendeta->image_pendeta && str_starts_with($pendeta->image_pendeta, 'pendetas/')) {
                $imagePath = $request->file('image_pendeta')->store('pendetas', 'public');
            }
        }

        $pendeta->update([
            'name_pendeta' => $request->name_pendeta,
            'image_pendeta' => $imagePath,
            'salary' => $request->salary,
        ]);

        return redirect()->route('admin.pendeta.index')->with('success', 'Data Pendeta sudah diupdate');
    }

    public function destroy($id)
    {
        $pendeta = Pendeta::findOrFail($id);

        if ($pendeta->iamge_pendeta) {
            Storage::disk('public')->delete($pendeta->image_pendeta);
        }

        $pendeta->delete();
        return redirect()->route('admin.pendeta.index')->with('success', 'Data Pendeta Sudah dihapuskan');
    }
}
