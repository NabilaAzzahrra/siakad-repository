<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Revisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class verifikasiPembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembimbing = Dosen::where('kode_dosen', Auth::user()->email)->first();
        $idPembimbing = $pembimbing->id;
        $data = Revisi::where('id_pembimbing', $idPembimbing)->paginate(10);
        return view('page.verifikasi.index')->with([
            'data' => $data
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
        try {
            // Update data
            $data = [
                'verifikasi_pembimbing' => 'SUDAH',
            ];

            $datas = Revisi::findOrFail($id);
            $datas->update($data);

            // Redirect kembali dengan pesan sukses
            return response()->json([
                'success' => true,
                'message' => 'Data Sudah di verifikasi',
                'redirect' => url()->previous() // Redirect ke halaman sebelumnya
            ]);
        } catch (\Exception $e) {
            // Tangani error dan kembalikan pesan error
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
