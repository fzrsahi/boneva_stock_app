<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            # code...
            $employees = Employee::where('fullname', 'like', '%' . $search . '%')->orderBy('fullname', 'DESC')->paginate(2)->appends(['search' => $search]);
        } else {

            $employees = Employee::orderBy('fullname', 'DESC')->paginate(2); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }

        return view('pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi input
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255|min:6',
            'nik' => 'required|numeric|digits:16|unique:employees,nik',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required',
            'job_title' => 'required|string',
            'hire_date' => 'required|date',
            'department' => 'required|string',
            'profilephoto' => 'required|image|mimes:jpeg,jpg,png|max:2048', // Mendukung 3 tipe file
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = $this->saveImage($file = $request->file('profilephoto'), $path = 'profilephoto');
        Employee::create([
            'fullname' => $request->fullname,
            'uuid' => Str::uuid(),
            'nik' => $request->nik,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'job_title' => $request->job_title,
            'hire_date' => $request->hire_date,
            'department' => $request->department,
            'profilephoto' => $imageName,
        ]);

        return redirect()->back()->with('success', "Data Karyawan Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $employee = Employee::where('uuid', $uuid)->first();
        return view('pages.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $employee = Employee::where('uuid', $uuid)->first();
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255|min:6',
            'nik' => 'required|numeric|digits:16|unique:employees,nik,' . $employee->id,
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone_number' => 'required',
            'job_title' => 'required|string',
            'hire_date' => 'required|date',
            'department' => 'required|string',
            'profilephoto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // Mendukung 3 tipe file
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah ada file gambar baru
        $imageName = $employee->profilephoto; // Set default photo name to current photo

        if ($file = $request->file('profilephoto')) {
            // Jika ada gambar baru, hapus gambar lama terlebih dahulu
            if (file_exists(public_path('profilephoto/' . $employee->profilephoto))) {
                unlink(public_path('profilephoto/' . $employee->profilephoto)); // Menghapus gambar lama
            }

            // Simpan gambar baru dan dapatkan nama file baru
            $imageName = $this->saveImage($file = $request->file('profilephoto'), $path = 'profilephoto');
        }

        $employee->update([
            'fullname' => $request->fullname,
            'nik' => $request->nik,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'job_title' => $request->job_title,
            'hire_date' => $request->hire_date,
            'department' => $request->department,
            'profilephoto' => $imageName,
        ]);

        return redirect()->back()->with('success', "Data Karyawan Berhasil DiUbah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $employee = Employee::where('uuid', $uuid)->first();
        if (file_exists(public_path('profilephoto/' . $employee->profilephoto))) {
            unlink(public_path('profilephoto/' . $employee->profilephoto)); // Menghapus gambar lama
        }
        $employee->delete();
        return redirect()->back()->with('success', "Data Karyawan Berhasil Dihapus");
    }
}
