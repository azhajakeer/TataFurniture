<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyListController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'item' => 'required|string|max:255',
            'note' => 'nullable|string|max:500',
        ]);

        // Store the data in the session
        $buyListItem = [
            'item' => $request->input('item'),
            'note' => $request->input('note'),
        ];

        // Store it in the session (optional: store as an array if multiple items)
        session()->push('buy_list', $buyListItem);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Item added to your Buy List!');
    }
}
