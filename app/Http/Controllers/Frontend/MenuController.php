<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_menu', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $menus = $query->orderBy('created_at', 'desc')->paginate(12);

        if ($request->ajax()) {
            return view('frontend.partials.menu_cards', compact('menus'))->render();
        }

        $kategoris = ['Food', 'Beverage', 'Dessert'];

        return view('frontend.menus.index', compact('menus', 'kategoris'));
    }

    public function show($slug)
    {
        $menu = Menu::with('reviews')->where('slug', $slug)->firstOrFail();
        $related = Menu::where('kategori', $menu->kategori)
            ->where('id', '!=', $menu->id)
            ->where('status', 'Ready')
            ->take(4)
            ->get();
        return view('frontend.menus.show', compact('menu', 'related'));
    }
}
