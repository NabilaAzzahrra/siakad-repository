<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $page = request()->input('page', 1);
            $entries = request()->input('entries', 10);
            $search = request()->input('search');

            $query = Informasi::query();

            if ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('informasi', 'like', '%' . $search . '%');
            }

            $informasi = $query->paginate($entries);

            return view('page.informasi.index', compact('informasi'))
                ->with('i', ($page - 1) * $entries);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: " . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
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
        try {
            $data = [
                'title' => $request->input('judul'),
                'informasi' => $request->input('informasi'),
                'kategori' => $request->input('kategori'),
            ];
            Informasi::create($data);
            return redirect()
                ->route('informasi.index')
                ->with('message_insert', 'Data Informasi Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->route('informasi.index')
                ->with('error_message', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
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
        try {
            $data = [
                'title' => $request->input('judul'),
                'informasi' => $request->input('informasi'),
                'kategori' => $request->input('kategoris'),
            ];

            $datas = Informasi::findOrFail($id);
            $datas->update($data);
            return redirect()
                ->route('informasi.index')
                ->with('message_update', 'Data Informasi Sudah diupdate');
        } catch (\Exception $e) {
            return redirect()
                ->route('informasi.index')
                ->with('error_message', 'Terjadi kesalahan saat melakukan update data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Informasi::findOrFail($id);
            $data->delete();
            return back()->with('message_delete', 'Data Informasi Sudah dihapus');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Terjadi kesalahan saat melakukan update data: ' . $e->getMessage());
        }
    }
}
