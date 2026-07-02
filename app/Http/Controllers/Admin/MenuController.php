<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menus.index');
    }

    public function data()
    {
        $menus = Menu::withCount('reviews')->orderBy('created_at', 'desc')->get();
        return datatables()->of($menus)
            ->addIndexColumn()
            ->addColumn('foto', function ($menu) {
                $url = $menu->foto ? asset($menu->foto) : asset('images/menu/no-image.svg');
                return '<img src="' . $url . '" class="rounded" width="60" height="60">';
            })
            ->addColumn('harga_format', function ($menu) {
                return 'Rp ' . number_format($menu->harga, 0, ',', '.');
            })
            ->addColumn('status_badge', function ($menu) {
                if ($menu->status == 'Ready') {
                    return '<span class="badge-ready">Ready</span>';
                }
                return '<span class="badge-soldout">Sold Out</span>';
            })
            ->addColumn('rating_stars', function ($menu) {
                $stars = '';
                $rating = round($menu->rating);
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        $stars .= '<i class="fas fa-star text-warning"></i> ';
                    } else {
                        $stars .= '<i class="far fa-star text-warning"></i> ';
                    }
                }
                return $stars;
            })
            ->addColumn('action', function ($menu) {
                return '
                    <a href="' . route('admin.menus.show', $menu->id) . '" class="btn btn-sm btn-info" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="' . route('admin.menus.edit', $menu->id) . '" class="btn btn-sm btn-warning" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $menu->id . '" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['foto', 'status_badge', 'rating_stars', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(StoreMenuRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['nama_menu']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menu'), $filename);
            $data['foto'] = 'images/menu/' . $filename;
        }

        Menu::create($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        $menu->load('reviews');
        return view('admin.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['nama_menu']);

        if ($request->hasFile('foto')) {
            if ($menu->foto && file_exists(public_path($menu->foto))) {
                unlink(public_path($menu->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menu'), $filename);
            $data['foto'] = 'images/menu/' . $filename;
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->foto && file_exists(public_path($menu->foto))) {
            unlink(public_path($menu->foto));
        }
        $menu->reviews()->delete();
        $menu->delete();

        return response()->json(['success' => true]);
    }

    public function toggleStatus(Menu $menu)
    {
        $menu->status = $menu->status == 'Ready' ? 'Sold Out' : 'Ready';
        $menu->save();

        return response()->json(['success' => true, 'status' => $menu->status]);
    }
}
