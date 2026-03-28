<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use CreateProduitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\Routing\Route;

class MenuItemController extends Controller
{
    public function show()
    {
        $items = MenuItem::with('category')->get();
        if (route('home'))
            return View('CLient.home', compact('items'));
        else
            return View('Admin.Items', compact('items'));
    }

    public function create(Request $request)
    {
        $validatedData = CreateProduitRequest::handle($request);

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
        }
        else
            $item->update('status, Temporairement indisponible');
    }
}
