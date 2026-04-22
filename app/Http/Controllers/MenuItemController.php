<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\CreateProduitRequest as RequestsCreateProduitRequest;
use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as FacadesRoute;
use App\Http\Requests\CreateProduitRequest;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnArgument;

class MenuItemController extends Controller
{
    public function show()
    {
        $items = MenuItem::with('category')->get();
        $route = FacadesRoute::currentRouteName();
        if ($route === 'home') {
            return view('CLient.home', compact('items'));
        } else if ($route === 'menu') {
            return view('CLient.Menu', compact('items'));
        } else {
            return view('Shered.Menu', compact('items'));
        }
    }

    public function create(CreateProduitRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();

        $category = MenuCategory::firstOrCreate([
            'name' => $validatedData['category']
        ]);

        $validatedData['category_id'] = $category->id;

        unset($validatedData['category']);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('menu', 'public');
        }

        try {
            MenuItem::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('Dashboard')
            ->with('success', 'Item ajouté avec succès.');
    }

    public function delete($id)
    {
        $item = MenuItem::find($id);
        if ($item) {
            $item->delete();
            return redirect()->route('dashboard')->with('success, Item Mark As Deleted');
        } else
            return redirect()->route('dashboard')->with('error, elete Failed Try Again');
    }

    public function handleStock($id)
    {
        $item = MenuItem::find($id);
        if ($item->status == 'Temporairement indisponible') {
            $item->update('status, Disponible');
        } else
            $item->update('status, Temporairement indisponible');
    }



    public function edit($id)
    {
        $item       = MenuItem::with('category', 'user')->findOrFail($id);
        $categories = MenuCategory::orderBy('name')->get(); // FIX 3 : all categories

        return view('Admin.Edit_Produit', compact('item', 'categories'));
    }
 
    public function update(Request $request, int $id)
    {
        $item = MenuItem::findOrFail($id);
 
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:MenuCategory,id',
            'description' => 'required|string|max:200',
            'prix'        => 'required|numeric|min:0',
            'temp_prepa'  => 'nullable|integer|min:0|max:600',
            'status'      => 'nullable|string|in:disponible,Temporairement indisponible',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
 
        // Replace image if a new file was uploaded
        if ($request->hasFile('image')) {
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $item->image = $request->file('image')->store('menu_items', 'public');
        }
 
        $item->name        = $validated['name'];
        $item->category_id = $validated['category_id'];
        $item->description = $validated['description'];
        $item->prix        = $validated['prix'];
        $item->temp_prepa  = $validated['temp_prepa'] ?? null;
        $item->status      = $validated['status'] ?? 'disponible';
        $item->save();
 
        return redirect()
            ->route('show_items')
            ->with('success', 'Modifications enregistrées avec succès.');
    }

    public function destroy($id)
    {
        $item = MenuItem::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted.');
    }

    public function toggle($id)
    {
        $item = MenuItem::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->save();
        return redirect()->back()->with('success', 'Item status updated.');
    }
}
