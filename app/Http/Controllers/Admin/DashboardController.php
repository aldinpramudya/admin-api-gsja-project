<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Event;
use App\Models\Gereja;
use App\Models\Pendeta;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $dashboardData = $this->getDashboardDataByRole($user);
        return view('dashboard', [
            'user' => $user,
            'cards' => $dashboardData,
        ]);
    }

    // Get Dashboard Data
    private function getDashboardDataByRole($user)
    {

        $cards = [];

        if ($user->isSuperAdmin()) {
            $cards = [
                [
                    "title" => "Total Artikel",
                    "count" => Article::count(),
                    "icon" => "newspaper",
                    "route" => route('admin.article.index')
                ],
                [
                    "title" => "Total Data Pendeta",
                    "count" => Pendeta::count(),
                    "icon" => "square-user",
                    "route" => route('admin.pendeta.index')
                ],
                [
                    "title" => "Total Data Gereja",
                    "count" => Gereja::count(),
                    "icon" => "church",
                    "route" => route('admin.gereja.index')
                ],
                [
                    "title" => "Total Data Event yang Ditampilkan",
                    "count" => Event::where('is_visible', 1)->count(),
                    "icon" => "calendar",
                    "route" => route('admin.event.index')
                ]
            ];
        } elseif ($user->isAdmin()) {
            $cards = [
                [
                    "title" => "Total Artikel",
                    "count" => Article::count(),
                    "icon" => "newspaper",
                    "route" => route('admin.article.index')
                ],
                [
                    "title" => "Total Data Pendeta",
                    "count" => Pendeta::count(),
                    "icon" => "square-user",
                    "route" => route('admin.pendeta.index')
                ],
                [
                    "title" => "Total Data Gereja",
                    "count" => Gereja::count(),
                    "icon" => "church",
                    "route" => route('admin.gereja.index')
                ],
                [
                    "title" => "Total Data Event yang Ditampilkan",
                    "count" => Event::where('is_visible', 1)->count(),
                    "icon" => "calendar",
                    "route" => route('admin.event.index')
                ]
            ];
        } elseif ($user->isBendahara()) {
            $cards = [
                [
                    "title" => "Total Data Pendeta",
                    "count" => Pendeta::count(),
                    "icon" => "square-user",
                    "route" => route('bendahara.pendeta.index')
                ],
            ];
        } elseif ($user->isPendeta()) {
            $cards = [];
        }
        return $cards;
    }
}
