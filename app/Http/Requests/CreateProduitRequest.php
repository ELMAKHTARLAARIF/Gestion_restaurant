<?php
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateProduitRequest extends FormRequest
{
    public static function handle($request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required',
            'description' => 'required|string|max:200',
            'prix'        => 'required|numeric|min:0',
            'temp_prepa'  => 'nullable|integer|min:0|max:600',
            'status'      => 'required|in:Disponible,Temporairement indisponible',
            'image'       => 'nullable|image|mimes:jpeg,png,webp|max:5120',
        ]);
        return $validatedData;
    }
}
