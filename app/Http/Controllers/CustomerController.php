<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::paginate(20);

        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required|unique:customer',
            'telp' => 'required|unique:customer',
        ],[
            'nama' => [
                'required' => 'Harap isi nama customer'
            ],
            'alamat' => [
                'required' => 'Harap isi alamat customer',
                'unique' => 'Email sudah digunakan oleh pengguna lain'
            ],
            'telp' => [
                'required' => 'Harap isi no. telepon customer',
                'unique' => 'No.Telp sudah digunakan oleh pengguna lain'
            ]
        ]);

        $data = $request->except(['_token']);
        $data['kode_customer'] = 'CUST-'.date('ymdhis');

        Customer::create($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('customer.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => ['required', Rule::unique('customer')->ignore($customer->id)]
        ],[
            'nama' => [
                'required' => 'Harap isi nama customer'
            ],
            'tep' => [
                'required' => 'Harap isi telp customer',
                'unique' => 'Telp sudah digunakan oleh pelanggan lain'
            ]
        ]);

        $data = $request->except(['_token', '_method']);

        $customer->update($data);

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('customer.index');
    }
}
