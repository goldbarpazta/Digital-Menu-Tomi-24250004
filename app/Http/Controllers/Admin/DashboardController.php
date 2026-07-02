<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();
        $totalFood = Menu::where('kategori', 'Food')->count();
        $totalBeverage = Menu::where('kategori', 'Beverage')->count();
        $totalDessert = Menu::where('kategori', 'Dessert')->count();
        $ready = Menu::where('status', 'Ready')->count();
        $soldOut = Menu::where('status', 'Sold Out')->count();
        $avgRating = Menu::avg('rating');
        $menuTerbaik = Menu::orderBy('rating', 'desc')->first();

        $kategoriData = Menu::selectRaw('kategori, count(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        $statusData = Menu::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('admin.dashboard', compact(
            'totalMenu', 'totalFood', 'totalBeverage', 'totalDessert',
            'ready', 'soldOut', 'avgRating', 'menuTerbaik',
            'kategoriData', 'statusData'
        ));
    }
}
