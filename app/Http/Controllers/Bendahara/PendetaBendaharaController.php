<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Pendeta;
use Illuminate\Http\Request;

class PendetaBendaharaController extends Controller
{
    public function index()
    {
        $pendetas = Pendeta::paginate(10);
        return view('bendahara.index', compact('pendetas'));
    }

    public function edit($id)
    {
        $pendeta = Pendeta::findOrFail($id);
        return view('bendahara.editSalaryPendeta', compact('pendeta'));
    }

    public function update(Request $request, $id)
    {
        $pendeta = Pendeta::findOrFail($id);
        $request->validate([
            'name_pendeta' => 'required|string|max:255',
            'image_pendeta' => 'nullable|image|max:2048',
            'salary' => 'required|string',
        ]);

        $imagePath = $pendeta->image_pendeta;
        if ($request->hasFile('image_pendeta')) {
            if ($pendeta->image_pendeta && str_starts_with($pendeta->image_pendeta, 'pendetas/')) {
                $imagePath = $request->file('image_pendeta')->store('pendetas', 'public');
            }
        }

        $salary = preg_replace('/[^0-9]/', '', $request->salary);

        $pendeta->update([
            'name_pendeta' => $request->name_pendeta,
            'image_pendeta' => $imagePath,
            'salary' => $salary,
        ]);

        return redirect()->route('bendahara.pendeta.index')->with('success', 'Data Salary Pendeta Sudah Diperbarui');
    }
}
