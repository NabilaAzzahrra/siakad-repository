<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\Mahasiswa;
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

        return view('page.khs.index', compact(['mahasiswa', 'tahunAngkatan', 'kelas', 'semester', 'kurikulum']))
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

    /*public function store(Request $request)
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

            // dd($jadwal);
        if (!$jadwal->isEmpty()) {
            $id_perhitungan = $jadwal->first()->id_perhitungan;

            $perhitungan_1 = Perhitungan::where('id', $id_perhitungan)->first();
        } else {
            $id_perhitungan = 0;

            $perhitungan_1 = 0;
            //dd($perhitungan_1);
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
    }*/

    public function store(Request $request)
    {
        $user_ids = $request->input('user_id');
        $id_jurusan = $request->input('id_jurusan');
        $semesters = $request->input('semester');
        $kurikulum = $request->input('kurikulum');
        //dd($semesters);
        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
        }

        // Ambil data mahasiswa
        $students = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->whereIn('mahasiswa.nim', $user_ids)
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'jurusan.id AS id_jurusan')
            ->get();

        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $prestasi = DB::table('vw_data_prestasi')
            ->whereIn('jurusan', $id_jurusan)
            ->where('semester', $semesters)
            ->where('id_kurikulum', $kurikulum)
            ->groupBy('materi_ajar')
            ->get();

        //dd($id_jurusan);

        $firstPrestasi = $prestasi->first();

        if ($firstPrestasi) {
            $id_perhitungan = $firstPrestasi->id_perhitungan;
            $perhitungan = Perhitungan::where('id', $id_perhitungan)->first();
        } else {
            $perhitungan = 0;
        }
        return view('page.khs.print')->with([
            'students' => $students,
            'prestasi' => $prestasi,
            'perhitungan' => $perhitungan,
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
