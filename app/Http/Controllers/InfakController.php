<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Infak;
use Illuminate\Http\Request;

class InfakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Admin.Infaq.index", [
            'infaqs' => Infak::orderByDesc('tanggal')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.Infaq.crate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:250',
            'tanggal' => 'required|date',
            'jenis_infak' => 'required|max:250',
            'jumlah' => 'required'
        ]);

        Infak::create($validated);

        return redirect('infaq')->with('success', "Berhasil menambahkan data infaq");
    }

    /**
     * Display the specified resource.
     */
    public function show(Infak $infak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infak $infaq)
    {

        return view("Admin.Infaq.edit", [
            'infaq' => $infaq
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infak $infaq)
    {
        $validated = $request->validate([
            'nama' => 'required|max:250',
            'tanggal' => 'required|date',
            'jenis_infak' => 'required|max:250',
            'jumlah' => 'required'
        ]);

        $infaq->update($validated);

        return redirect('infaq')->with('success', "Berhasil mengupdate data infaq");
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infak $infaq)
    {
        $infaq->delete();

        return back()->with('success', "Berashil menghapus data");
    }
}
