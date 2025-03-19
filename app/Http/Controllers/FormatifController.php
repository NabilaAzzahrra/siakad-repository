<?php

namespace App\Http\Controllers;

use App\Models\DetailFormatif;
use App\Models\Formatif;
use Illuminate\Http\Request;

class FormatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formatif = Formatif::find($id);

        if ($formatif) {
            $idFormatif = $formatif->id_formatif;
            $details = DetailFormatif::where('id_formatif', $idFormatif)->get();

            foreach ($details as $detail) {
                if ($detail->jawaban && file_exists(public_path('formatif/jawaban/' . $detail->jawaban))) {
                    unlink(public_path('formatif/jawaban/' . $detail->jawaban));
                }
                // Hapus data dari database
                $detail->delete();
            }

            if ($formatif->formatif && file_exists(public_path('formatif/' . $formatif->formatif))) {
                unlink(public_path('formatif/' . $formatif->formatif));
            }

            // Hapus formatif utama
            $formatif->delete();

            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } else {
            return back()->with('message_error', 'Tidak dapat menghapus data');
        }
    }
}
