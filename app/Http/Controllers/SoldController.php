<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sold;
use Illuminate\Http\Request;

class SoldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Product::with(['sold' => function ($query) {
            $query->orderBy('date', 'asc');
        }])
            ->get()
            ->map(function ($product) {
                $totalSold = $product->sold->sum('amount');
                $totalProfit = $totalSold * $product->price;
                $dateRange = '';

                if ($product->sold->isNotEmpty()) {
                    $startDate = $product->sold->min('date');
                    $endDate = $product->sold->max('date');
                    $dateRange = $startDate . ' - ' . $endDate;
                }

                return [
                    'name' => $product->name,
                    'total_sold' => $totalSold,
                    'date_range' => $dateRange,
                    'price' => $product->price,
                    'total_profit' => $totalProfit,
                ];
            });

        return view('pages.sold.index', compact('datas'));
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
        //
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
