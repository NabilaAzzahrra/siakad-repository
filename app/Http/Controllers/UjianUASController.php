<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\KonfigurasiUjian;
use App\Models\Uas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UjianUASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwalreguler::all();
        $uas = Uas::all();
        $konfigurasi = KonfigurasiUjian::first();
        $tgl_ujian = $konfigurasi->tgl_ujian;
        $tgl_ujian_susulan = $konfigurasi->tgl_susulan;
        return view('page.uas.index')->with([
            'jadwal' => $jadwal,
            'uas' => $uas,
            'konfigurasi' => $konfigurasi,
            'tgl_ujian' => $tgl_ujian,
            'tgl_ujian_susulan' => $tgl_ujian_susulan,
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
        // dd('inii');
        try {
            $id_jadwal = $request->input('id_jadwal');
            $id_uas = date('YmdHis');

            if ($request->hasFile('file') && $request->hasFile('file_cadangan')) {
                $uasFile = $request->file('file');
                $uasFileName = $id_uas . '-' . $id_jadwal . '.' . $uasFile->extension();
                $uasFile->move(public_path('uas'), $uasFileName);

                // Handle the backup UAS file upload
                $uasFileCadangan = $request->file('file_cadangan');
                $uasFileNameCadangan = $id_uas . '-' . $id_jadwal . '.' . $uasFileCadangan->extension();
                $uasFileCadangan->move(public_path('uas/cadangan'), $uasFileNameCadangan);

                $data = [
                    'id_jadwal' => $id_jadwal,
                    'id_uas' => $id_uas,
                    'tgl_ujian' => $request->input('tgl_ujian'),
                    'waktu_ujian' => $request->input('waktu_ujian'),
                    'tgl_ujian_susulan' => $request->input('tgl_ujian_susulan'),
                    'file' => $uasFileName,
                    'file_cadangan' => $uasFileNameCadangan,
                ];
                // dd($data);

                Uas::create($data);

                if (Auth::user()->role == 'A') {
                    return redirect()
                        ->route('ujian_uas.index')
                        ->with('message', 'Data UAS Sudah ditambahkan');
                } else {
                    return redirect()
                        ->route('ujian_uas.ujian_uas_dosen', Auth::user()->email)
                        ->with('message', 'Data UAS Sudah diupdate');
                }
            } else {
                dd('iniii lah');
                return redirect()->back()->with('error', 'Soal tidak ditemukan');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
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
        $uas = Uas::where('id', $id)->first();
        return view('page.uas.edit')->with([
            'uas' => $uas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uas = Uas::find($id);

        if (!$uas) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $uas->tgl_ujian = $request->input('tgl_ujian');
        $uas->tgl_ujian_susulan = $request->input('tgl_ujian_susulan');
        $uas->waktu_ujian = $request->input('waktu_ujian');

        // Simpan nama file ebook lama untuk referensi
        $oldUas = $uas->file;
        $oldUasCadangan = $uas->file_cadangan;

        $ko = $request->input('id_jadwal');
        $id_uas = $request->input('id_uas');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('file')) {
            // Hapus ebook lama jika ada
            if ($oldUas && file_exists(public_path('uas/' . $oldUas))) {
                unlink(public_path('uas/' . $oldUas));
            }

            $file = $request->file('file');
            $filename = $ko . '-' . $id_uas . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uas'), $filename);

            $uas->file = $filename;
        }

        if ($request->hasFile('file_cadangan')) {
            // Hapus ebook lama jika ada
            if ($oldUasCadangan && file_exists(public_path('uas/cadangan/' . $oldUasCadangan))) {
                unlink(public_path('uas/cadangan/' . $oldUasCadangan));
            }

            $file_cadangan = $request->file('file_cadangan');
            $filename_cadangan = $ko . '-' . $id_uas . '.' . $file_cadangan->getClientOriginalExtension();
            $file_cadangan->move(public_path('uas/cadangan'), $filename_cadangan);

            $uas->file_cadangan = $filename_cadangan;
        }

        // Simpan perubahan ke database
        $uas->save();

        if (Auth::user()->role == 'A') {
            return redirect()
                ->route('ujian_uas.index')
                ->with('message', 'Data UAS Sudah diupdate');
        } else {
            return redirect()
                ->route('ujian_uas.ujian_uas_dosen', Auth::user()->email)
                ->with('message', 'Data UAS Sudah diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ujian_uas_dosen()
    {
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $kode_dosen = Auth::user()->email;

        $jadwal = Jadwalreguler::with([
            'perhitungan',
            'sesi',
            'sesi.pukul',
            'hari',
            'ruang',
            'tahun_akademik',
            'dosen',
            'kelas',
            'kelas.jurusan',
            'detail_kurikulum',
            'detail_kurikulum.materi_ajar',
            'detail_kurikulum.materi_ajar.semester',
            'detail_kurikulum.materi_ajar.semester.keterangan'
        ])
            ->whereHas('tahun_akademik', function ($query) use ($tahun_akademik) {
                $query->where('id_tahun_akademik', $tahun_akademik);
            })
            ->whereHas('detail_kurikulum.materi_ajar.semester.keterangan', function ($query) use ($keterangan) {
                $query->where('id_keterangan', $keterangan);
            })
            ->whereHas('dosen', function ($query) use ($kode_dosen) {
                $query->where('kode_dosen', $kode_dosen);
            })
            ->paginate(10);

        $uas = Uas::all();
        return view('page.uas_dosen.index')->with([
            'jadwal' => $jadwal,
            'uas' => $uas,
        ]);
    }

    public function daftar_print_uas(Request $request)
    {
        $kelas = Kelas::all();
        $tahun_angkatan = DB::table('mahasiswa')
            ->select('tahun_angkatan')
            ->groupBy('tahun_angkatan')
            ->get();

        $mahasiswa_lengkap = null;

        if ($request->filled('tahun_angkatan') || $request->filled('kelas')) {
            $query = DB::table('mahasiswa')
                ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
                ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
                ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'kelas.id_jurusan')
                ->whereNotNull('mahasiswa.id_kelas')
                ->whereNotNull('mahasiswa.tingkat');

            if ($request->filled('tahun_angkatan')) {
                $query->where('mahasiswa.tahun_angkatan', $request->tahun_angkatan);
            }

            if ($request->filled('kelas')) {
                $query->where('mahasiswa.id_kelas', $request->kelas);
            }

            $mahasiswa_lengkap = $query->orderBy('nama', 'ASC')->paginate(30);
        }

        return view('page.uas.daftar_print_uas')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
            'kelas' => $kelas,
            'tahun_angkatan' => $tahun_angkatan,
        ]);
    }

    public function print_kartu_uas(Request $request)
    {
        $user_ids = $request->input('user_id');
        $kelas = $request->input('kelas');

        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
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

        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $uas = Uas::all();

        $jadwal_reguler = Jadwalreguler::with([
            'perhitungan',
            'sesi',
            'sesi.pukul',
            'hari',
            'ruang',
            'tahun_akademik',
            'dosen',
            'kelas',
            'kelas.jurusan',
            'detail_kurikulum',
            'detail_kurikulum.materi_ajar',
            'detail_kurikulum.materi_ajar.semester',
            'detail_kurikulum.materi_ajar.semester.keterangan'
        ])
            ->whereHas('tahun_akademik', function ($query) use ($tahun_akademik) {
                $query->where('id_tahun_akademik', $tahun_akademik);
            })
            ->whereHas('detail_kurikulum.materi_ajar.semester.keterangan', function ($query) use ($keterangan) {
                $query->where('id_keterangan', $keterangan);
            })
            ->whereHas('kelas', function ($query) use ($kelas) {
                $query->where('id_kelas', $kelas);
            })
            ->get();
        // dd($jadwal_reguler);

        return view('page.uas.print')->with([
            'stu_data' => $result,
            // 'kelas' => Kelas::all(),
            'jadwal_reguler' => $jadwal_reguler,
            'uas' => $uas
        ]);
    }
}
