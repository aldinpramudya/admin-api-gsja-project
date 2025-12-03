<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SusunanPanitia;
use Illuminate\Http\Request;

class SusunanApiPanitiaController extends Controller
{
    public function index()
    {
        $panitia = SusunanPanitia::with('posisiPanitia')->orderBy('name_position_id', 'asc')->get();
        // Transform image URL
        $panitia->transform(function ($item) {
            $item->image_panitia = $item->image_panitia
                ? url('storage/' . $item->image_panitia)
                : null;
            return $item;
        });

        return response()->json([
            "message" => "Data Susunan Panitia Shown",
            "data" => $panitia,
        ], 200);
    }
}
