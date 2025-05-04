<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportNilaiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$mahasiswa_lengkap = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->whereNotNull('mahasiswa.tingkat')
            ->orderBy('nama', 'ASC')
            ->paginate(30);
        return view('page.report_nilai_permahasiswa.index')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
        ]);*/

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

        return view('page.report_nilai_permahasiswa.index', compact(['mahasiswa_lengkap', 'jurusan', 'tahunAngkatan', 'semester']))
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
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $id_kelas = $mahasiswa->id_kelas;
        $jadwal = Jadwalreguler::where('id_kelas', $id_kelas)->get();

        // Ambil data nilai yang terkait dengan mahasiswa tersebut
        $nilai = Nilai::where('nim', $id)->where('verifikasi', 1)->get();

        // Susun data nilai per mata pelajaran
        $nilaiPerMahasiswa = [];
        foreach ($jadwal as $jadwalItem) {
            $itemNilai = $nilai->firstWhere('id_jadwal', $jadwalItem->id_jadwal);
            $nilaiPerMahasiswa[$jadwalItem->id_jadwal] = $itemNilai;
        }

        return view('page.report_nilai_permahasiswa.print')->with([
            'mahasiswa' => $mahasiswa,
            'jadwal' => $jadwal,
            'nilaiPerMahasiswa' => $nilaiPerMahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $id_kelas = $mahasiswa->id_kelas;
        $jadwal = Jadwalreguler::where('id_kelas', $id_kelas)->get();

        // Ambil data nilai yang terkait dengan mahasiswa tersebut
        $nilai = Nilai::where('nim', $id)->get();

        // Susun data nilai per mata pelajaran
        $nilaiPerMahasiswa = [];
        foreach ($jadwal as $jadwalItem) {
            $itemNilai = $nilai->firstWhere('id_jadwal', $jadwalItem->id_jadwal);
            $nilaiPerMahasiswa[$jadwalItem->id_jadwal] = $itemNilai;
        }

        return view('page.report_nilai_permahasiswa.hasil')->with([
            'mahasiswa' => $mahasiswa,
            'jadwal' => $jadwal,
            'nilaiPerMahasiswa' => $nilaiPerMahasiswa
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
