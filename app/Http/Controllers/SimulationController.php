<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sold;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("pages.simulation.index", compact("products"));
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
        $incomingProductId = $request->name;
        $currentProduct = Product::where("id", $incomingProductId)->first();
        $incomingProductAmount = intval($request->amount);

        if (!$currentProduct || $currentProduct->amount < $incomingProductAmount) {
            // Flash a failure message
            return redirect()->back()->with('error', 'Jumlah produk tidak cukup atau produk tidak ditemukan.');
        }

        $updateAmount = $currentProduct->amount - $incomingProductAmount;
        Product::where("id", $incomingProductId)->update(["amount" => $updateAmount]);

        Sold::create([
            'amount' => $incomingProductAmount,
            'products_id' => $incomingProductId,
            'date' => $request->date,
        ]);

        // Flash a success message
        return redirect()->back()->with('success', 'Produk berhasil dijual dan stok diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
