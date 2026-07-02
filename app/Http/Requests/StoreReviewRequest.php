<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'menu_id' => 'required|exists:menus,id',
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ];
    }
}
