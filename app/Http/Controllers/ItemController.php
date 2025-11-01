<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $items = Item::where('name', 'like', "%$query%")
            ->orWhere('type', 'like', "%$query%")
            ->orWhere('location', 'like', "%$query%")
            ->get();

        return response()->json($items);
    }
}
