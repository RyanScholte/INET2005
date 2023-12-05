<?php
// File: app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
{
    $items = Item::with('category')->get();
    return view('items.index', compact('items'));
}

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'SKU' => 'required|string|max:255',
            'picture' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Item::create($request->all());

        return redirect('/items')->with('success', 'Item added successfully!');
    }

    public function show($id)
{
    $item = Item::with('category')->findOrFail($id);
    return view('items.show', compact('item'));
}

public function edit($id)
{
    $item = Item::with('category')->findOrFail($id);
    $categories = Category::all();
    return view('items.edit', compact('item', 'categories'));
}

public function update(Request $request, $id)
{
    $item = Item::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'SKU' => 'required|string|max:255',
        'picture' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    $item->update($request->all());

    return redirect('/items')->with('success', 'Item updated successfully!');
}

    public function destroy($id)
{
    $item = Item::findOrFail($id);
    $item->delete();

    return redirect('/items')->with('success', 'Item deleted successfully!');
}
}
