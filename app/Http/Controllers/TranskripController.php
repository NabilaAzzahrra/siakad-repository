<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\Nilai;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranskripController extends Controller
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
        return view('page.transkrip.index')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
            'tahun_angkatan' => $tahun_angkatan,
            'kelas' => $kelas,
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
        $user_ids = $request->input('user_id');
        $id_jurusans = $request->input('id_jurusan');
        $bulan_tahuns = $request->input('bulan_tahun');

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

        $kelas = Kelas::all();
        $result = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->whereIn('mahasiswa.nim', $user_ids)
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->orderBy('nama', 'ASC')
            ->paginate(15);

        if ($result->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $id_jurusan = array_unique($id_jurusans);

        $konfigurasi = Konfigurasi::all();
        $nilaiPerMahasiswa = [];
        $nilaiPerMahasiswa2 = [];
        $nilaiPerMahasiswa3 = [];
        $nilaiPerMahasiswa4 = [];
        $id_perhitungan1 = 0;
        $id_perhitungan2 = 0;
        $id_perhitungan3 = 0;
        $id_perhitungan4 = 0;

        foreach ($konfigurasi as $config) {
            $id_kurikulum = $config->id_kurikulum;

            $detail_kurikulum_1 = DB::table('vw_data_prestasi')
                ->where('semester', 1)
                ->where('id_jurusan', $id_jurusan)
                ->select('id_materi_ajar', 'materi_ajar', DB::raw('MAX(id) as max_id'), DB::raw('GROUP_CONCAT(nim) as nims'), DB::raw('MAX(sks) as sks'), DB::raw('MAX(id_jadwal) as id_jadwal'), DB::raw('MAX(id_perhitungan) as id_perhitungan'))
                ->groupBy('id_materi_ajar')
                ->get();

            if (!$detail_kurikulum_1->isEmpty()) {
                $id_perhitungan1 = $detail_kurikulum_1->first()->id_perhitungan;

                $perhitungan_1 = Perhitungan::where('id', $id_perhitungan1)->first();
            } else {
                $id_perhitungan1 = 0;

                $perhitungan_1 = 0;
            }
            $nilai = Nilai::join('jadwal_reguler', 'jadwal_reguler.id_jadwal', '=', 'nilai.id_jadwal')
                ->join('detail_kurikulum', 'detail_kurikulum.id', '=', 'jadwal_reguler.id_detail_kurikulum')
                ->join('materi_ajar', 'materi_ajar.id', '=', 'detail_kurikulum.id_materi_ajar')
                ->join('semester', 'semester.id', '=', 'materi_ajar.id_semester')
                ->where('nilai.verifikasi', 1)
                ->whereIn('nilai.nim', $user_ids)
                ->where('semester.semester', 1)
                ->select('nilai.*')
                ->get();

            foreach ($nilai as $itemNilai) {
                $nilaiPerMahasiswa[$itemNilai->nim][$itemNilai->id_jadwal] = $itemNilai;
            }

            $detail_kurikulum_2 = DB::table('vw_data_prestasi')
                ->where('semester', 2)
                ->where('id_jurusan', $id_jurusan)
                ->select('id_materi_ajar', 'materi_ajar', DB::raw('MAX(id) as max_id'), DB::raw('GROUP_CONCAT(nim) as nims'), DB::raw('MAX(sks) as sks'), DB::raw('MAX(id_jadwal) as id_jadwal'), DB::raw('MAX(id_perhitungan) as id_perhitungan'))
                ->groupBy('id_materi_ajar')
                ->get();

            if (!$detail_kurikulum_2->isEmpty()) {
                $id_perhitungan2 = $detail_kurikulum_2->first()->id_perhitungan;

                $perhitungan_2 = Perhitungan::where('id', $id_perhitungan2)->first();
            } else {
                $id_perhitungan2 = 0;

                $perhitungan_2 = 0;
            }

            $nilai2 = Nilai::join('jadwal_reguler', 'jadwal_reguler.id_jadwal', '=', 'nilai.id_jadwal')
                ->join('detail_kurikulum', 'detail_kurikulum.id', '=', 'jadwal_reguler.id_detail_kurikulum')
                ->join('materi_ajar', 'materi_ajar.id', '=', 'detail_kurikulum.id_materi_ajar')
                ->join('semester', 'semester.id', '=', 'materi_ajar.id_semester')
                ->where('nilai.verifikasi', 1)
                ->whereIn('nilai.nim', $user_ids)
                ->where('semester.semester', 2)
                ->select('nilai.*')
                ->get();

            foreach ($nilai2 as $itemNilai2) {
                $nilaiPerMahasiswa2[$itemNilai2->nim][$itemNilai2->id_jadwal] = $itemNilai2;
            }

            $detail_kurikulum_3 = DB::table('vw_data_prestasi')
                ->where('semester', 3)
                ->where('id_jurusan', $id_jurusan)
                ->select('id_materi_ajar', 'materi_ajar', DB::raw('MAX(id) as max_id'), DB::raw('GROUP_CONCAT(nim) as nims'), DB::raw('MAX(sks) as sks'), DB::raw('MAX(id_jadwal) as id_jadwal'), DB::raw('MAX(id_perhitungan) as id_perhitungan'))
                ->groupBy('id_materi_ajar')
                ->get();

            if (!$detail_kurikulum_3->isEmpty()) {
                $id_perhitungan3 = $detail_kurikulum_3->first()->id_perhitungan;

                $perhitungan_3 = Perhitungan::where('id', $id_perhitungan3)->first();
            } else {
                $id_perhitungan3 = 0;

                $perhitungan_3 = 0;
            }

            $nilai3 = Nilai::join('jadwal_reguler', 'jadwal_reguler.id_jadwal', '=', 'nilai.id_jadwal')
                ->join('detail_kurikulum', 'detail_kurikulum.id', '=', 'jadwal_reguler.id_detail_kurikulum')
                ->join('materi_ajar', 'materi_ajar.id', '=', 'detail_kurikulum.id_materi_ajar')
                ->join('semester', 'semester.id', '=', 'materi_ajar.id_semester')
                ->where('nilai.verifikasi', 1)
                ->whereIn('nilai.nim', $user_ids)
                ->where('semester.semester', 3)
                ->select('nilai.*')
                ->get();

            foreach ($nilai3 as $itemNilai3) {
                $nilaiPerMahasiswa3[$itemNilai3->nim][$itemNilai3->id_jadwal] = $itemNilai3;
            }

            $detail_kurikulum_4 = DB::table('vw_data_prestasi')
                ->where('semester', 4)
                ->where('id_jurusan', $id_jurusan)
                ->select('id_materi_ajar', 'materi_ajar', DB::raw('MAX(id) as max_id'), DB::raw('GROUP_CONCAT(nim) as nims'), DB::raw('MAX(sks) as sks'), DB::raw('MAX(id_jadwal) as id_jadwal'), DB::raw('MAX(id_perhitungan) as id_perhitungan'))
                ->groupBy('id_materi_ajar')
                ->get();

            if (!$detail_kurikulum_4->isEmpty()) {
                $id_perhitungan4 = $detail_kurikulum_4->first()->id_perhitungan;

                $perhitungan_4 = Perhitungan::where('id', $id_perhitungan4)->first();
            } else {
                $id_perhitungan4 = 0;

                $perhitungan_4 = 0;
            }

            $nilai4 = Nilai::join('jadwal_reguler', 'jadwal_reguler.id_jadwal', '=', 'nilai.id_jadwal')
                ->join('detail_kurikulum', 'detail_kurikulum.id', '=', 'jadwal_reguler.id_detail_kurikulum')
                ->join('materi_ajar', 'materi_ajar.id', '=', 'detail_kurikulum.id_materi_ajar')
                ->join('semester', 'semester.id', '=', 'materi_ajar.id_semester')
                ->where('nilai.verifikasi', 1)
                ->whereIn('nilai.nim', $user_ids)
                ->where('semester.semester', 4)
                ->select('nilai.*')
                ->get();

            foreach ($nilai4 as $itemNilai4) {
                $nilaiPerMahasiswa4[$itemNilai4->nim][$itemNilai4->id_jadwal] = $itemNilai4;
            }
        }

        return view('page.transkrip.print')->with([
            'stu_data' => $result,
            'kelas' => $kelas,
            'nilaiPerMahasiswa' => $nilaiPerMahasiswa,
            'nilaiPerMahasiswa2' => $nilaiPerMahasiswa2,
            'nilaiPerMahasiswa3' => $nilaiPerMahasiswa3,
            'nilaiPerMahasiswa4' => $nilaiPerMahasiswa4,
            'perhitungan_1' => $perhitungan_1,
            'perhitungan_2' => $perhitungan_2,
            'perhitungan_3' => $perhitungan_3,
            'perhitungan_4' => $perhitungan_4,
            'detail_kurikulum_1' => $detail_kurikulum_1,
            'detail_kurikulum_2' => $detail_kurikulum_2,
            'detail_kurikulum_3' => $detail_kurikulum_3,
            'detail_kurikulum_4' => $detail_kurikulum_4,
            'bulan_tahuns' => $bulan_tahuns,
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
