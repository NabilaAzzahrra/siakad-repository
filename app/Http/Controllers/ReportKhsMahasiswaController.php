<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportKhsMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch the options for filters
        $tahun_angkatan = DB::table('mahasiswa')
            ->select('tahun_angkatan')
            ->groupBy('tahun_angkatan')
            ->get();

        $kelas = Kelas::all();
        $semester = Semester::all();

        // Initialize $mahasiswa_lengkap as an empty collection or null
        $mahasiswa_lengkap = null;

        // Check if any filters are applied
        if ($request->filled('tahun_angkatan') || $request->filled('kelas')) {
            // Build the query for mahasiswa_lengkap only if filters are applied
            $query = DB::table('mahasiswa')
                ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
                ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
                ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'kelas.id_jurusan')
                ->whereNotNull('mahasiswa.id_kelas')
                ->where('nim', Auth::user()->email)
                ->whereNotNull('mahasiswa.tingkat');

            // Apply filters
            if ($request->filled('tahun_angkatan')) {
                $query->where('mahasiswa.tahun_angkatan', $request->tahun_angkatan);
            }

            if ($request->filled('kelas')) {
                $query->where('mahasiswa.id_kelas', $request->kelas);
            }

            // Get the filtered data
            $mahasiswa_lengkap = $query->orderBy('nama', 'ASC')->paginate(30);
        }

        // Return the view with the data
        return view('page.report_khs_mahasiswa.index')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
            'tahun_angkatan' => $tahun_angkatan,
            'kelas' => $kelas,
            'semester' => $semester,
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
    public function edit(string $id, Request $request)
    {
        $semester = Semester::all();
        $nim = Auth::user()->role === 'M'
            ? Auth::user()->email
            : str_replace('ortu', '', Auth::user()->email);
        $query = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'kelas.id_jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->where('nim', $nim)
            ->whereNotNull('mahasiswa.tingkat');
        $mahasiswa_lengkap = $query->orderBy('nama', 'ASC')->paginate(30);
        return view('page.report_khs_mahasiswa.index')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
            'semester' => $semester,
        ]);
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
