<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommissionPrice;
use Illuminate\Http\Request;

class CommissionPriceController extends Controller
{
    public function index()
    {
        return view('admin.prices.index', [
            'prices' => CommissionPrice::orderBy('sort_order')->get()
        ]);
    }

    public function create()
    {
        return view('admin.prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required',
            'price_from' => 'required|integer',
            'price_to'   => 'nullable|integer',
        ]);

        CommissionPrice::create($request->all());

        return redirect()->route('admin.prices.index')
            ->with('success', 'Price added');
    }

    public function edit(CommissionPrice $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    public function update(Request $request, CommissionPrice $price)
    {
        $price->update($request->all());

        return redirect()->route('admin.prices.index')
            ->with('success', 'Price updated');
    }

    public function destroy(CommissionPrice $price)
    {
        $price->delete();

        return back()->with('success', 'Price deleted');
    }
}
