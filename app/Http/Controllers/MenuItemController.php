<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\Routing\Route;

class MenuItemController extends Controller
{
    public function show(){
        $items = MenuItem::with('category')->get();
        if(route('home'))
            return View('CLient.home',compact('items'));
        else
            return View('Admin.Items',compact('items'));
    }
public function create(Request $request)
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

    $validatedData['user_id'] = 1; // or Auth::id();

    $category = MenuCategory::firstOrCreate([
        'name' => $validatedData['category']
    ]);

    $validatedData['category_id'] = $category->id;

    unset($validatedData['category']);

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('menu', 'public');
    }

    try {
        $item = MenuItem::create($validatedData);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }

    return redirect()->route('Dashboard')->with('success', 'Item ajouté avec succès.');
}
}