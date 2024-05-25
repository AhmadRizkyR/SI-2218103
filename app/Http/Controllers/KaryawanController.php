<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::paginate(20);

        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();

        return view('karyawan.create', compact('outlet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:karyawan',
            'telp' => 'required|unique:karyawan',
        ],[
            'nama' => [
                'required' => 'Harap isi nama karyawan'
            ],
            'email' => [
                'required' => 'Harap isi email karyawan',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ],
            'telp' => [
                'required' => 'Harap isi no. telepon karyawan',
                'unique' => 'No.Telp sudah digunakan oleh pengguna lain'
            ]
        ]);

        $data = $request->except(['_token']);
        $data['kode_karyawan'] = 'KRY-'.date('ymdhis');

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);

        $data['user_id'] = $user->id;

        Karyawan::create($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('karyawan.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.detail', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $outlet = Outlet::all();

        return view('karyawan.edit', compact('karyawan', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'email' => ['required', Rule::unique('karyawan')->ignore($karyawan->id), Rule::unique('users')->ignore($karyawan->user_id)]
        ],[
            'nama' => [
                'required' => 'Harap isi nama karyawan'
            ],
            'email' => [
                'required' => 'Harap isi email karyawan',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ]
        ]);

        $data = $request->except(['_token', '_method']);

        $karyawan->update($data);

        $user = User::find($karyawan->user_id)->update([
            'name' => $request->nama,
            'email' => $request->email,
        ]);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('karyawan.index');
    }
}
