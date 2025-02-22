<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Perhitungan;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KHSController extends Controller
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
        return view('page.khs.index')->with([
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
    // public function store(Request $request)
    // {

    //     $user_ids = $request->input('user_id');
    //     $id_jurusans = $request->input('id_jurusan');
    //     $semesters = $request->input('semester');

    //     if (empty($user_ids)) {
    //         return redirect()->back()->with('error', 'Pilih dulu');
    //     }

    //     $userJurusanPairs = [];

    //     foreach ($user_ids as $index => $user_id) {
    //         $userJurusanPairs[] = [
    //             'nim' => $user_id,
    //             'id_jurusan' => $id_jurusans[$index],
    //         ];
    //     }

    //     $result = DB::table('mahasiswa')
    //         ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
    //         ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
    //         ->whereIn('mahasiswa.nim', $user_ids)
    //         ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'jurusan.id AS id_jurusan')
    //         ->paginate(15);

    //     if ($result->isEmpty()) {
    //         return redirect()->back()->with('error', 'Data tidak ditemukan');
    //     }

    //     $id_jurusan = array_unique($id_jurusans);

    //     $jadwal = DB::table('vw_data_prestasi')
    //         ->where('semester', $semesters)
    //         ->whereIn('id_jurusan', $id_jurusan)
    //         ->select('id_materi_ajar', 'materi_ajar', DB::raw('MAX(id) as max_id'), DB::raw('GROUP_CONCAT(nim) as nims'), DB::raw('MAX(sks) as sks'))
    //         ->groupBy('id_materi_ajar')
    //         ->get();

    //     $nilai = Nilai::where('verifikasi', 1)
    //         ->whereIn('nim', $user_ids)
    //         ->get();

    //     $nilaiPerMahasiswa = [];
    //     foreach ($nilai as $itemNilai) {
    //         $nilaiPerMahasiswa[$itemNilai->nim][$itemNilai->id_jadwal] = $itemNilai;
    //     }

    //     return view('page.khs.print')->with([
    //         'stu_data' => $result,
    //         'kelas' => Kelas::all(),
    //         'jadwal' => $jadwal,
    //         'nilaiPerMahasiswa' => $nilaiPerMahasiswa,
    //         'userJurusanPairs' => $userJurusanPairs,
    //     ]);
    // }

    public function store(Request $request)
    {
        $user_ids = $request->input('user_id');
        $id_jurusans = $request->input('id_jurusan');
        $semesters = $request->input('semester');

        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
        }

        $userJurusanPairs = [];

        foreach ($user_ids as $index => $user_id) {
            $userJurusanPairs[] = [
                'nim' => $user_id,
                'id_jurusan' => $id_jurusans[$index],
            ];
        }

        $result = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->whereIn('mahasiswa.nim', $user_ids)
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'jurusan.id AS id_jurusan')
            ->paginate(15);

        if ($result->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $id_jurusan = array_unique($id_jurusans);

        $jadwal = DB::table('vw_data_prestasi')
            ->where('semester', $semesters)
            ->whereIn('id_jurusan', $id_jurusan)
            ->select('id_materi_ajar', 'materi_ajar', DB::raw('MAX(id) as max_id'), DB::raw('GROUP_CONCAT(nim) as nims'), DB::raw('MAX(sks) as sks'), DB::raw('MAX(id_jadwal) as id_jadwal'), DB::raw('MAX(id_perhitungan) as id_perhitungan'))
            ->groupBy('id_materi_ajar')
            ->get();

            if (!$jadwal->isEmpty()) {
                $id_perhitungan = $jadwal->first()->id_perhitungan;

                $perhitungan_1 = Perhitungan::where('id', $id_perhitungan)->first();
            } else {
                $id_perhitungan = 0;

                $perhitungan_1 = 0;
            }

        $nilai = Nilai::where('verifikasi', 1)
            ->whereIn('nim', $user_ids)
            ->get();

        // Menyusun nilai per mahasiswa berdasarkan id jadwal
        $nilaiPerMahasiswa = [];
        foreach ($nilai as $itemNilai) {
            $nilaiPerMahasiswa[$itemNilai->nim][$itemNilai->id_jadwal] = $itemNilai;
        }

        $nilaiAplikasiProject = Nilai::whereIn('nim', $user_ids)->get();

        return view('page.khs.print')->with([
            'stu_data' => $result,
            'kelas' => Kelas::all(),
            'jadwal' => $jadwal,
            'perhitungan_1' => $perhitungan_1,
            'nilaiPerMahasiswa' => $nilaiPerMahasiswa,
            'userJurusanPairs' => $userJurusanPairs,
            'nilaiAplikasiProject' => $nilaiAplikasiProject
        ]);
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
