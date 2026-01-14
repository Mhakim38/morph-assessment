<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->get();
        return response()->json($items);
    }

    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        try {
            // Create and save the new Item
            $item = Item::create([
                'name' => $data['name'],
                'price_per_item' => $data['price'],
                'quantity' => $data['amount'],
            ]);
            return response()->json([
                'status' => 'ok',
                'title' => 'Success',
                'message' => 'Item created successfully',
                'data' => $item,
            ]);

        } catch (\Exception $e) {

            // Return error response
            return response()->json([
                'status' => 'ko',
                'title' => 'Error',
                'message' => 'Failed to create item: ' . $e->getMessage(),
            ], 500);
        }
    }
}
