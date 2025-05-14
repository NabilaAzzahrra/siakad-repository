<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Jadwalreguler;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportPresensiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAngkatan = Mahasiswa::select('tahun_angkatan')->distinct()->orderBy('tahun_angkatan', 'asc')->pluck('tahun_angkatan');
        $jurusan = Jurusan::all();
        $semester = Semester::all();

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $filterTahunAngkatan = request()->input('tahun_angkatan');
        $filterJurusan = request()->input('jurusan');

        $query = Mahasiswa::query()
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'mahasiswa.*',
                'kelas.*',
                'jurusan.*'
            )
            ->whereNotNull('mahasiswa.id_kelas')
            ->whereNotNull('mahasiswa.tingkat')
            ->orderBy('nama', 'ASC');

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%');
        }

        if ($filterTahunAngkatan) {
            $query->where('mahasiswa.tahun_angkatan', $filterTahunAngkatan);
        }

        if ($filterJurusan) {
            $query->where('jurusan.id', $filterJurusan);
        }

        $mahasiswa_lengkap = $query->paginate($entries);

        return view('page.report_presensi_mahasiswa.index', compact(['mahasiswa_lengkap', 'jurusan', 'tahunAngkatan', 'semester']))
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        // Ambil data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $id_kelas = $mahasiswa->id_kelas;

        // Ambil data jadwal berdasarkan id_kelas
        $semester = $request->input('semester');
        $jadwal = Jadwalreguler::join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->where('id_kelas', $id_kelas)
            ->where('semester', $semester)
            ->get();

        // Ambil data presensi yang terkait dengan mahasiswa tersebut
        // Join ke tabel presensi untuk mendapatkan id_jadwal dari presensi
        $presensi = DetailPresensi::join('presensi', 'detail_presensi.id_presensi', '=', 'presensi.id_presensi')
            ->join('jadwal_reguler', 'presensi.id_jadwal', '=', 'jadwal_reguler.id_jadwal')
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->where('detail_presensi.nim', $id)
            ->where('semester.semester', $semester)
            ->select('detail_presensi.*', 'presensi.id_jadwal', 'presensi.pertemuan', 'semester.semester')
            ->get();

        //dd($jadwal);
        // Susun data presensi per pertemuan P1-P14
        $presensiPerPertemuan = [];
        foreach ($jadwal as $jadwalItem) {
            $itemPresensi = [];
            for ($i = 1; $i <= 14; $i++) {
                $p = 'P' . $i;
                $itemPresensi[$p] = $presensi->where('id_jadwal', $jadwalItem->id_jadwal)
                    ->where('pertemuan', $i)
                    ->first();
            }
            $presensiPerPertemuan[$jadwalItem->id_jadwal] = $itemPresensi;
        }

        // Debugging untuk memastikan data presensi
        // dd($presensiPerPertemuan);

        return view('page.report_presensi_mahasiswa.print')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'presensiPerPertemuan' => $presensiPerPertemuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $semester = Semester::all();

    //     // Ambil data mahasiswa berdasarkan NIM
    //     $mahasiswa = Mahasiswa::where('nim', $id)->first();
    //     $id_kelas = $mahasiswa->id_kelas;

    //     // Ambil data jadwal berdasarkan id_kelas
    //     $jadwal = Jadwalreguler::with('detail_kurikulum.materi_ajar.semester')
    //         ->where('id_kelas', $id_kelas)
    //         ->whereHas('detail_kurikulum.materi_ajar.semester', function ($query) {
    //             $query->where('semester', 1);
    //         })
    //         ->get();


    //     // Ambil data presensi yang terkait dengan mahasiswa tersebut
    //     // Join ke tabel presensi untuk mendapatkan id_jadwal dari presensi
    //     $presensi = DetailPresensi::join('presensi', 'detail_presensi.id_presensi', '=', 'presensi.id_presensi')
    //         ->where('detail_presensi.nim', $id)
    //         ->select('detail_presensi.*', 'presensi.id_jadwal', 'presensi.pertemuan')
    //         ->get();

    //     // Susun data presensi per pertemuan P1-P14
    //     $presensiPerPertemuan = [];
    //     foreach ($jadwal as $jadwalItem) {
    //         $itemPresensi = [];
    //         for ($i = 1; $i <= 14; $i++) {
    //             $p = 'P' . $i;
    //             $itemPresensi[$p] = $presensi->where('id_jadwal', $jadwalItem->id_jadwal)
    //                 ->where('pertemuan', $i)
    //                 ->first();
    //         }
    //         $presensiPerPertemuan[$jadwalItem->id_jadwal] = $itemPresensi;
    //     }

    //     // Debugging untuk memastikan data presensi
    //     // dd($presensiPerPertemuan);

    //     return view('page.report_presensi_mahasiswa.jadwal')->with([
    //         'jadwal' => $jadwal,
    //         'mahasiswa' => $mahasiswa,
    //         'presensiPerPertemuan' => $presensiPerPertemuan,
    //         'semester' => $semester,
    //     ]);
    // }

    public function edit(string $id, Request $request)
    {
        $semester = Semester::all();

        // Fetch the mahasiswa based on the NIM
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $id_kelas = $mahasiswa->id_kelas;

        $jadwal = [];

        // Only run the query if a semester filter is applied
        if ($request->filled('id_semester')) {
            $jadwal = Jadwalreguler::with('detail_kurikulum.materi_ajar.semester', 'dosen')
                ->where('id_kelas', $id_kelas)
                ->whereHas('detail_kurikulum.materi_ajar.semester', function ($query) use ($request) {
                    $query->where('semester', $request->id_semester);
                })
                ->get();
        }

        // Fetch presensi only if jadwal is loaded
        $presensiPerPertemuan = [];
        if (!empty($jadwal)) {
            $presensi = DetailPresensi::join('presensi', 'detail_presensi.id_presensi', '=', 'presensi.id_presensi')
                ->where('detail_presensi.nim', $id)
                ->select('detail_presensi.*', 'presensi.id_jadwal', 'presensi.pertemuan')
                ->get();

            foreach ($jadwal as $jadwalItem) {
                $itemPresensi = [];
                for ($i = 1; $i <= 14; $i++) {
                    $p = 'P' . $i;
                    $itemPresensi[$p] = $presensi->where('id_jadwal', $jadwalItem->id_jadwal)
                        ->where('pertemuan', $i)
                        ->first();
                }
                $presensiPerPertemuan[$jadwalItem->id_jadwal] = $itemPresensi;
            }
        }

        return view('page.report_presensi_mahasiswa.jadwal')->with([
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'presensiPerPertemuan' => $presensiPerPertemuan,
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
