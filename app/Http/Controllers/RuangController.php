<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang = DB::table('ruang')->paginate(5);
        return view('page.ruang.index')->with([
            'ruang' => $ruang,
        ]);
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
        $data = [
            'ruang' => $request->input('ruang')
        ];

        Ruang::create($data);

        return redirect()
            ->route('ruang.index')
            ->with('message', 'Data Ruang Sudah ditambahkan');
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
        $data = [
            'ruang' => $request->input('ruang')
        ];

        $datas = Ruang::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('ruang.index')
            ->with('message', 'Data Ruang Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ruang::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Ruang Sudah dihapus');
    }
}
