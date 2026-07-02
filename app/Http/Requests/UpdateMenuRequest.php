<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|in:Food,Beverage,Dessert',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:Ready,Sold Out',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'komposisi' => 'nullable|string',
            'kalori' => 'nullable|integer|min:0',
            'protein' => 'nullable|numeric|min:0',
            'lemak' => 'nullable|numeric|min:0',
            'karbohidrat' => 'nullable|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ];
    }
}
