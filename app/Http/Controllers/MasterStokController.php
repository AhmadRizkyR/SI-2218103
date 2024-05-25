<?php

namespace App\Http\Controllers;

use App\Models\MasterStok;
use Illuminate\Http\Request;

class MasterStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masterStok = MasterStok::paginate(20);
        return view('master-stok.index', compact('masterStok'));
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
    public function show(MasterStok $masterStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterStok $masterStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterStok $masterStok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterStok $masterStok)
    {
        //
    }
}
