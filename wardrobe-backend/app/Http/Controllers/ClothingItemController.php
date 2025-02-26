<?php

namespace App\Http\Controllers;

use App\Models\ClothingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClothingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ClothingITem::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|string',
        ]);

        return ClothingItem::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $request->image,
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = ClothingItem::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|string',
        ]);

        $item->update($request->all());
        return response()->json(['message' => 'Item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = ClothingItem::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $item->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
