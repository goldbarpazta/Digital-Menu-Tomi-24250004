<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('status', 'Ready')->orderBy('created_at', 'desc')->take(6)->get();
        $totalMenu = Menu::count();
        $totalFood = Menu::where('kategori', 'Food')->count();
        $totalBeverage = Menu::where('kategori', 'Beverage')->count();
        $totalDessert = Menu::where('kategori', 'Dessert')->count();
        return view('frontend.home', compact('menus', 'totalMenu', 'totalFood', 'totalBeverage', 'totalDessert'));
    }
}
