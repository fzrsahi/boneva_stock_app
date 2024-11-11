<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan kata kunci dari input pengguna
        $search = $request->input('search');
        if ($search) {
            # code...
            $outlets = Outlet::where('outlet_name', 'like', '%' . $search . '%')->orderBy('outlet_name', 'DESC')->paginate(2)->appends(['search' => $search]);
        } else {

            $outlets = Outlet::orderBy('outlet_name', 'DESC')->paginate(2); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }

        return view('pages.outlets.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = Outlet::all();
        return view('pages.outlets.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input lainnya
        $validator = Validator::make($request->all(), [
            'outlet_name' => 'required|string|max:255|min:3|unique:outlets',
            'owner_name' => 'required|string|max:255|min:5',
            'latitude' => 'required',
            'langtitude' => 'required',
            'desc' => 'required',
            'address' => 'required',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Outlet::create($request->all());
        return redirect()->back()->with("success", "Berhasil Menambah Data");
    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        $datas = Outlet::all();
        return view('pages.outlets.edit', compact('outlet', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        // Validasi input lainnya
        $validator = Validator::make($request->all(), [
            'outlet_name' => 'required|string|max:255|min:3|unique:outlets,outlet_name,' . $outlet->id,
            'owner_name' => 'required|string|max:255|min:5',
            'latitude' => 'required',
            'langtitude' => 'required',
            'desc' => 'required',
            'address' => 'required',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $outlet->update($request->all());
        return redirect()->back()->with("success", "Berhasil Menambah Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect()->back()->with('success', 'Data Transportasi berhasil dihapus!');
    }
}
