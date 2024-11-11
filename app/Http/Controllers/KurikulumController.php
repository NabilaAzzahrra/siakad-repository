<?php

namespace App\Http\Controllers;

use App\Models\Detailkurikulum;
use App\Models\Kurikulum;
use App\Models\Materiajar;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.kurikulum.index');
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
            'kurikulum' => $request->input('kurikulum'),
            'tahun' => $request->input('tahun')
        ];

        Kurikulum::create($data);

        return redirect()
            ->route('kurikulum.index')
            ->with('message', 'Data Kurikulum Sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum_det = Detailkurikulum::where('id_kurikulum', $id)->get();
        return view('page.kurikulum.detail')->with([
            'kurikulum' => $kurikulum,
            'kurikulum_det' => $kurikulum_det,
        ]);
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
            'kurikulum' => $request->input('kurikulum'),
            'tahun' => $request->input('tahun')
        ];

        $datas = Kurikulum::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('kurikulum.index')
            ->with('message', 'Data Kurikulum Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Detailkurikulum::where('id_kurikulum', $id)->delete();
        $data = Kurikulum::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Kurikulum Sudah dihapus');
    }

    public function detail(Request $request)
    {
        $id_kurikulum = $request->input('id_kurikulum');
        $id_materi_ajar = $request->input('user_id');

        if ($id_materi_ajar && is_array($id_materi_ajar)) {
            $data = array_map(function ($materi_ajar_id) use ($id_kurikulum) {
                return [
                    'id_kurikulum' => $id_kurikulum,
                    'id_materi_ajar' => $materi_ajar_id
                ];
            }, $id_materi_ajar);

            Detailkurikulum::insert($data);

            return back()->with('message_delete', 'Data Materi Ajar Kurikulum Sudah ditambahkan');
        } else {
            return back()->with('message_delete', 'Data Materi Ajar Kurikulum Gagal ditambahkan');

        }
    }
}
