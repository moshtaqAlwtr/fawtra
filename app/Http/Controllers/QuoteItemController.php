<?php

namespace App\Http\Controllers;

use App\Models\QuoteItem;
use Illuminate\Http\Request;

class QuoteItemController extends Controller
{
    public function index()
    {
        $quoteItems = QuoteItem::with(['quote', 'product'])->get();
        return response()->json($quoteItems);
    }

    public function store(Request $request)
    {
        $quoteItem = QuoteItem::create($request->all());
        return response()->json($quoteItem, 201);
    }

    public function show($id)
    {
        $quoteItem = QuoteItem::with(['quote', 'product'])->findOrFail($id);
        return response()->json($quoteItem);
    }

    public function update(Request $request, $id)
    {
        $quoteItem = QuoteItem::findOrFail($id);
        $quoteItem->update($request->all());
        return response()->json($quoteItem);
    }

    public function destroy($id)
    {
        QuoteItem::destroy($id);
        return response()->json(null, 204);
    }
}
