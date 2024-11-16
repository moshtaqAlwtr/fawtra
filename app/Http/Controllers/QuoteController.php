<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::with('quoteItems')->get();
        return response()->json($quotes);
    }

    public function store(Request $request)
    {
        $quote = Quote::create($request->all());
        return response()->json($quote, 201);
    }

    public function show($id)
    {
        $quote = Quote::with('quoteItems')->findOrFail($id);
        return response()->json($quote);
    }

    public function update(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($request->all());
        return response()->json($quote);
    }

    public function destroy($id)
    {
        Quote::destroy($id);
        return response()->json(null, 204);
    }
}
