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
        } else
        {
            return view('Admin.dashboard');
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
}
