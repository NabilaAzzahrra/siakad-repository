<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\Kurikulum;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Perhitungan;
use App\Models\TranskripCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranskripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahunAngkatan = Mahasiswa::select('tahun_angkatan')->distinct()->orderBy('tahun_angkatan', 'asc')->pluck('tahun_angkatan');
        $kelas = Kelas::all();
        $kurikulum = Kurikulum::all();

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $filterTahunAngkatan = request()->input('tahun_angkatan');
        $filterKelas = request()->input('kelas');
        $bulanTahun = request()->input('bulan');

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

        return view('page.transkrip.index', compact(['mahasiswa', 'tahunAngkatan', 'kelas', 'kurikulum']))
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
        $user_ids = $request->input('user_id');
        $id_jurusans = $request->input('id_jurusan');
        $bulan_tahuns = $request->input('codeBulan');

        //dd($bulan_tahuns);

        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
        }

        // Ambil no_mahasiswa terakhir dari transkrip_code
        $last = DB::table('transkrip_code')
            ->where('id_kelas', $request->kelas)
            ->orderByDesc('no_mahasiswa')
            ->first();

        $nextNo = 1;

        if ($last && is_numeric($last->no_mahasiswa)) {
            $nextNo = (int) $last->no_mahasiswa + 1;
        }

        // Buat array pasangan nim, jurusan, dan no_mahasiswa baru
        $userTranskripData = [];

        foreach ($user_ids as $index => $user_id) {
            $no_mahasiswa = str_pad($nextNo++, 3, '0', STR_PAD_LEFT);

            $userTranskripData[] = [
                'nim' => $user_id,
                'id_jurusan' => $id_jurusans[$index],
                'no_mahasiswa' => $no_mahasiswa,
            ];
        }

        $kelas = Kelas::all();
        $result = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->whereIn('mahasiswa.nim', $user_ids)
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->orderBy('nama', 'ASC')
            ->get();

        return view('page.transkrip.show')->with([
            'stu_data' => $result,
            'kelas' => $kelas,
            'bulan_tahuns' => $bulan_tahuns,
            'userTranskripData' => $userTranskripData,
        ]);
    }

    public function storeTranskrip(Request $request)
    {
        $user_ids = $request->input('user_id');
        $id_jurusans = $request->input('id_jurusan');
        $bulan_tahuns = $request->input('bulan_tahun');
        $noMhs = $request->input('noMhs');
        $noTranskrip = $request->input('noTranskrip');
        $id_kelas = $request->input('id_kelas');

        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
        }

        $userJurusanPairs = [];

        foreach ($user_ids as $index => $user_id) {

            $userJurusanPairs[] = [
                'nim' => $user_id,
                'id_jurusan' => $id_jurusans[$index],
            ];

            TranskripCode::create([
                'nim' => $user_id,
                'no_mahasiswa' => $noMhs[$index],
                'no_transkrip' => $noTranskrip[$index],
                'id_kelas' => $id_kelas[$index],
            ]);
        }

        return redirect()->route('transkrip.index')->with('success', 'Data transkrip berhasil disimpan.');
    }

    /*public function store(Request $request)
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
        $nilaiAplikasiProject = Nilai::whereIn('nilai.nim', $user_ids)->get();

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
            'nilaiAplikasiProject' => $nilaiAplikasiProject
        ]);
    }*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Mahasiswa::where('nim', $id)->first();
        //$kurikulum = $request->input('kurikulum');

        $prestasi1 = DB::table('vw_data_prestasi')
            ->where('semester', 1)
            //->where('id_kurikulum', $kurikulum)
            ->groupBy('materi_ajar')
            ->get();

        $prestasi2 = DB::table('vw_data_prestasi')
            ->where('semester', 2)
            //->where('id_kurikulum', $kurikulum)
            ->groupBy('materi_ajar')
            ->get();

        $prestasi3 = DB::table('vw_data_prestasi')
            ->where('semester', 3)
            //->where('id_kurikulum', $kurikulum)
            ->groupBy('materi_ajar')
            ->get();

        $prestasi4 = DB::table('vw_data_prestasi')
            ->where('semester', 4)
            //->where('id_kurikulum', $kurikulum)
            ->groupBy('materi_ajar')
            ->get();

        return view('page.data_prestasi.print')->with([
            'students' => $students,
            'prestasi1' => $prestasi1,
            'prestasi2' => $prestasi2,
            'prestasi3' => $prestasi3,
            'prestasi4' => $prestasi4,
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
