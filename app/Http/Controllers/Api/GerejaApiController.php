<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gereja;
use Illuminate\Http\Request;

class GerejaApiController extends Controller
{
    // Get AlL Data
    public function index()
    {
        $gerejas = Gereja::with('pendeta')->latest()->paginate(10);
        // Transform image URL
        $gerejas->getCollection()->transform(function ($gereja) {
            $gereja->image_gereja = $gereja->image_gereja
                ? url('storage/' . $gereja->image_gereja)
                : null;
            return $gereja;
        });

        return response()->json([
            "message" => "Data Gereja Shown",
            "data" => $gerejas,
        ], 200);
    }

    // Show One Church
    public function show($slug)
    {
        $gereja = Gereja::with('pendeta')
            ->where('slugs_gereja', $slug)
            ->first();

        if (!$gereja) {
            return response()->json([
                "message" => "Gereja not found",
                "data" => null,
            ], 404);
        }
        $gereja->image_gereja = $gereja->image_gereja
            ? url('storage/' . $gereja->image_gereja)
            : null;

        return response()->json([
            "message" => "Gereja Detail Shown",
            "data" => $gereja,
        ], 200);
    }
}
