<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Models\Menu;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('admin.reviews.index');
    }

    public function data()
    {
        $reviews = Review::with('menu')->orderBy('created_at', 'desc')->get();
        return datatables()->of($reviews)
            ->addIndexColumn()
            ->addColumn('menu_nama', function ($review) {
                return $review->menu ? $review->menu->nama_menu : '-';
            })
            ->addColumn('rating_stars', function ($review) {
                $stars = '';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $review->rating) {
                        $stars .= '<i class="fas fa-star text-warning"></i> ';
                    } else {
                        $stars .= '<i class="far fa-star text-warning"></i> ';
                    }
                }
                return $stars;
            })
            ->addColumn('tanggal', function ($review) {
                return $review->created_at->format('d M Y H:i');
            })
            ->addColumn('action', function ($review) {
                return '
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $review->id . '" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['rating_stars', 'action'])
            ->make(true);
    }

    public function create()
    {
        $menus = Menu::orderBy('nama_menu')->get();
        return view('admin.reviews.create', compact('menus'));
    }

    public function store(StoreReviewRequest $request)
    {
        Review::create($request->validated());

        $this->updateMenuRating($request->menu_id);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review berhasil ditambahkan.');
    }

    public function destroy(Review $review)
    {
        $menuId = $review->menu_id;
        $review->delete();

        $this->updateMenuRating($menuId);

        return response()->json(['success' => true]);
    }

    private function updateMenuRating($menuId)
    {
        $menu = Menu::find($menuId);
        if ($menu) {
            $avg = $menu->reviews()->avg('rating');
            $menu->rating = round($avg ?? 0, 1);
            $menu->save();
        }
    }
}
