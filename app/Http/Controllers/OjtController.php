<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\Mahasiswa;
use App\Models\Ojt;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OjtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAngkatan = Mahasiswa::select('tahun_angkatan')->distinct()->orderBy('tahun_angkatan', 'asc')->pluck('tahun_angkatan');
        $kelas = Kelas::all();
        $semester = Semester::all();
        $kurikulum = Kurikulum::all();

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $filterTahunAngkatan = request()->input('tahun_angkatan');
        $filterKelas = request()->input('kelas');

        $mahasiswa = collect(); // Default: kosong

        // Jalankan query HANYA jika ada filter yang dikirim
        if ($filterTahunAngkatan || $filterKelas || $search) {
            $query = Mahasiswa::query()
                ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
                ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
                ->select('mahasiswa.*', 'kelas.*', 'jurusan.*')
                ->whereNotNull('mahasiswa.id_kelas')
                ->whereNotNull('mahasiswa.tingkat');

            if ($filterTahunAngkatan) {
                $query->where('mahasiswa.tahun_angkatan', $filterTahunAngkatan);
            }

            if ($filterKelas) {
                $query->where('kelas.id', $filterKelas);
            }

            if ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            }

            $mahasiswa = $query->orderBy('nama', 'ASC')->get();
        }

        return view('page.ojt.index', compact(['mahasiswa', 'tahunAngkatan', 'kelas', 'semester', 'kurikulum']))
            ->with('i', ($page - 1) * $entries);
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
        $kelas = $request->input('kelas');
        Ojt::where('id_kelas', $kelas)->delete();

        $request->validate([
            'user_id' => 'required|array',
            'kelas' => 'required',
            'nilai' => 'required|array',
        ]);

        foreach ($request->user_id as $index => $userId) {
            DB::table('ojt')->insert([
                'nim' => $userId,
                'id_kelas' => $request->kelas,
                'nilai' => $request->nilai[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Nilai berhasil disimpan!');
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
