<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;

class MenuCategoryController extends Controller
{
    public function AddItem()
    {
        $categories = MenuCategory::all();

        return view('Admin.addProduit', compact('categories'));
    }
}
