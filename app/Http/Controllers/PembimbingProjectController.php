<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pembimbing;
use App\Models\PembimbingProject;
use Illuminate\Http\Request;

class PembimbingProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataDosen = Dosen::all();
        $data = PembimbingProject::with(['dosen'])->get();
        return view('page.pembimbing.index')->with([
            'dataDosen' => $dataDosen,
            'data' => $data,
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
        $id_dosen = $request->input('user_id');

        if ($id_dosen && is_array($id_dosen)) {
            $data = array_map(function ($id_dosen){
                return [
                    'id_dosen' => $id_dosen,
                ];
            }, $id_dosen);

            PembimbingProject::insert($data);

            return back()->with('message_delete', 'Data ditambahkan');
        } else {
            return back()->with('message_delete', 'Data Materi Ajar Kurikulum Gagal ditambahkan');
        }
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
