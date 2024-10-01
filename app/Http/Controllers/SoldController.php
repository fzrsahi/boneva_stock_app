<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sold;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SoldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $period = $request->input('period', 'month'); // default to month
        $date = $request->input('date', now()->format('Y-m-d'));

        $query = Product::query()->with(['sold' => function ($query) use ($period, $date) {
            $startDate = $this->getStartDate($date, $period);
            $endDate = $this->getEndDate($date, $period);

            $query->whereBetween('date', [$startDate, $endDate])
                ->orderBy('date', 'asc');
        }]);

        $profitData = $query->get()->map(function ($product) {
            $totalSold = $product->sold->sum('amount');
            $totalProfit = $totalSold * $product->price;

            $dateRange = $product->sold->isNotEmpty()
                ? $product->sold->min('date') . ' - ' . $product->sold->max('date')
                : '-';

            return [
                'name' => $product->name,
                'total_sold' => $totalSold,
                'date_range' => $dateRange,
                'price' => $product->price,
                'total_profit' => $totalProfit,
            ];
        });

        $currentPeriod = $this->getCurrentPeriodLabel($date, $period);

        return view('pages.sold.index', compact('profitData', 'period', 'date', 'currentPeriod'));
    }

    private function getStartDate($date, $period)
    {
        $carbon = Carbon::parse($date);

        return match ($period) {
            'day' => $carbon->startOfDay(),
            'week' => $carbon->startOfWeek(),
            'month' => $carbon->startOfMonth(),
            default => $carbon->startOfMonth(),
        };
    }

    private function getEndDate($date, $period)
    {
        $carbon = Carbon::parse($date);

        return match ($period) {
            'day' => $carbon->endOfDay(),
            'week' => $carbon->endOfWeek(),
            'month' => $carbon->endOfMonth(),
            default => $carbon->endOfMonth(),
        };
    }

    private function getCurrentPeriodLabel($date, $period)
    {
        $carbon = Carbon::parse($date);

        return match ($period) {
            'day' => $carbon->format('d F Y'),
            'week' => $carbon->startOfWeek()->format('d F') . ' - ' . $carbon->endOfWeek()->format('d F Y'),
            'month' => $carbon->format('F Y'),
            default => $carbon->format('F Y'),
        };
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
