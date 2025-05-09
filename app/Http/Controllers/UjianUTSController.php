<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\KonfigurasiUjian;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Tahunakademik;
use App\Models\Uts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UjianUTSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $uts = Uts::all();
        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $tgl_ujian_susulan = $konfigurasi->tgl_susulan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);
        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id') // Alias untuk sesi pertama
            ->leftJoin('sesi as sesi2', 'jadwal_reguler.id_sesi2', '=', 'sesi2.id') // Alias untuk sesi kedua
            ->join('pukul as pukul1', 'sesi1.id_pukul', '=', 'pukul1.id')
            ->leftJoin('pukul as pukul2', 'sesi2.id_pukul', '=', 'pukul2.id') // Ganti join biasa dengan leftJoin untuk pukul2
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'jadwal_reguler.*',
                'jadwal_reguler.id as id_jadwal',
                'jadwal_reguler.id_sesi2 as sesi2',
                'jadwal_reguler.id_jadwal as kode_jadwal',
                'detail_kurikulum.*',
                'dosen.*',
                'hari.*',
                'sesi1.*',
                'sesi2.*',
                'sesi1.id as kode_sesi1',
                'sesi2.id as kode_sesi2',
                'sesi1.sesi as sesi1',
                'sesi2.sesi as sesi2',
                'pukul1.*',
                'pukul2.*',
                'pukul1.pukul as pukul1',
                'pukul2.pukul as pukul2',
                'ruang.*',
                'kelas.*',
                'materi_ajar.*',
                'semester.*',
                'jurusan.*'
            )
            ->where('jadwal_reguler.id_tahun_akademik', $tahun_akademik)
            ->where('jadwal_reguler.id_keterangan', $keterangan);

        if ($search) {
            $query->where('materi_ajar', 'like', '%' . $search . '%')
                ->orWhere('nama_dosen', 'like', '%' . $search . '%');
        }

        $jadwal_reguler = $query->paginate($entries);

        $tahunAkademik = Tahunakademik::all();

        if ($request->ajax()) {
            $nilai = Nilai::all();
            return view('partials.nilai', compact('jadwal_reguler', 'nilai'))->render(); // Update this partial view as needed
        }

        $nilai = Nilai::all();

        return view('page.uts.index', compact(['jadwal_reguler', 'tahunAkademik', 'nilai', 'tgl_ujian_susulan', 'uts']))
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

        try {


            $id_jadwal = $request->input('id_jadwal');
            $id_uts = date('YmdHis');

            if ($request->hasFile('file') && $request->hasFile('file_cadangan')) {
                dd('ini');
                // Handle the main UTS file upload
                $utsFile = $request->file('file');
                $utsFileName = $id_uts . '-' . $id_jadwal . '.' . $utsFile->extension();
                $utsFile->move(public_path('uts'), $utsFileName);

                // Handle the backup UTS file upload
                $utsFileCadangan = $request->file('file_cadangan');
                $utsFileNameCadangan = $id_uts . '-' . $id_jadwal . '.' . $utsFileCadangan->extension();
                $utsFileCadangan->move(public_path('uts/cadangan'), $utsFileNameCadangan);

                if (Auth::user()->role == 'A') {
                    $verifikasi = 1;
                } else {
                    $verifikasi = 0;
                }

                // Prepare data for insertion
                $data = [
                    'id_jadwal' => $id_jadwal,
                    'id_uts' => $id_uts,
                    'tgl_ujian' => $request->input('tgl_ujian'),
                    'waktu_ujian' => $request->input('waktu_ujian'),
                    'tgl_ujian_susulan' => $request->input('tgl_ujian_susulan'),
                    'file' => $utsFileName,
                    'file_cadangan' => $utsFileNameCadangan,
                    'verifikasi' => $verifikasi,
                ];

                Uts::create($data);

                // Redirect based on user role
                if (Auth::user()->role == 'A') {
                    return redirect()
                        ->route('ujian_uts.index')
                        ->with('message', 'Data UTS Sudah ditambahkan');
                } else {
                    return redirect()
                        ->route('ujian_uts.ujian_uts_dosen', Auth::user()->email)
                        ->with('message', 'Data UTS Sudah ditambahkan');
                }
            } else {
                dd('error');
                // Redirect back if files are missing
                return redirect()->back()->with('error', 'Soal tidak ditemukan');
            }
        } catch (\Exception $e) {
            dd('salah');
            // Handle any errors that occur during the process
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
        $uts = Uts::where('id', $id)->first();
        return view('page.uts.edit')->with([
            'uts' => $uts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uts = Uts::find($id);

        if (!$uts) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $uts->tgl_ujian = $request->input('tgl_ujian');
        $uts->tgl_ujian_susulan = $request->input('tgl_ujian_susulan');
        $uts->waktu_ujian = $request->input('waktu_ujian');

        // Simpan nama file ebook lama untuk referensi
        $oldUts = $uts->file;
        $oldUtsCadangan = $uts->file_cadangan;

        $ko = $request->input('id_jadwal');
        $id_uts = $request->input('id_uts');
        // Jika ada file ebook yang diunggah
        if ($request->hasFile('file')) {
            // Hapus ebook lama jika ada
            if ($oldUts && file_exists(public_path('uts/' . $oldUts))) {
                unlink(public_path('uts/' . $oldUts));
            }

            $file = $request->file('file');
            $filename = $ko . '-' . $id_uts . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uts'), $filename);

            $uts->file = $filename;
        }

        if ($request->hasFile('file_cadangan')) {
            // Hapus ebook lama jika ada
            if ($oldUtsCadangan && file_exists(public_path('uts/cadangan/' . $oldUtsCadangan))) {
                unlink(public_path('uts/cadangan/' . $oldUtsCadangan));
            }

            $file_cadangan = $request->file('file_cadangan');
            $filename_cadangan = $ko . '-' . $id_uts . '.' . $file_cadangan->getClientOriginalExtension();
            $file_cadangan->move(public_path('uts/cadangan'), $filename_cadangan);

            $uts->file_cadangan = $filename_cadangan;
        }

        // Simpan perubahan ke database
        $uts->save();

        if (Auth::user()->role == 'A') {
            return redirect()
                ->route('ujian_uts.index')
                ->with('message', 'Data UTS Sudah diupdate');
        } else {
            return redirect()
                ->route('ujian_uts.ujian_uts_dosen', Auth::user()->email)
                ->with('message', 'Data UTS Sudah diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ujian_uts_dosen(Request $request)
    {
        /*$konfigurasi = Konfigurasi::first();
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

        $uts = Uts::all();
        return view('page.uts_dosen.index')->with([
            'jadwal' => $jadwal,
            'uts' => $uts,
        ]);*/

        //=============================

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $uts = Uts::all();
        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;
        $tgl_ujian_susulan = $konfigurasi->tgl_susulan;

        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);
        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('hari', 'jadwal_reguler.id_hari', '=', 'hari.id')
            ->join('sesi as sesi1', 'jadwal_reguler.id_sesi', '=', 'sesi1.id') // Alias untuk sesi pertama
            ->leftJoin('sesi as sesi2', 'jadwal_reguler.id_sesi2', '=', 'sesi2.id') // Alias untuk sesi kedua
            ->join('pukul as pukul1', 'sesi1.id_pukul', '=', 'pukul1.id')
            ->leftJoin('pukul as pukul2', 'sesi2.id_pukul', '=', 'pukul2.id') // Ganti join biasa dengan leftJoin untuk pukul2
            ->join('ruang', 'jadwal_reguler.id_ruang', '=', 'ruang.id')
            ->join('kelas', 'jadwal_reguler.id_kelas', '=', 'kelas.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->join('semester', 'materi_ajar.id_semester', '=', 'semester.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select(
                'jadwal_reguler.*',
                'jadwal_reguler.id as id_jadwal',
                'jadwal_reguler.id_sesi2 as sesi2',
                'jadwal_reguler.id_jadwal as kode_jadwal',
                'detail_kurikulum.*',
                'dosen.*',
                'hari.*',
                'sesi1.*',
                'sesi2.*',
                'sesi1.id as kode_sesi1',
                'sesi2.id as kode_sesi2',
                'sesi1.sesi as sesi1',
                'sesi2.sesi as sesi2',
                'pukul1.*',
                'pukul2.*',
                'pukul1.pukul as pukul1',
                'pukul2.pukul as pukul2',
                'ruang.*',
                'kelas.*',
                'materi_ajar.*',
                'semester.*',
                'jurusan.*'
            )
            ->where('jadwal_reguler.id_tahun_akademik', $tahun_akademik)
            ->where('jadwal_reguler.id_keterangan', $keterangan)
            ->where('dosen.kode_dosen', Auth::user()->email);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('materi_ajar', 'like', '%' . $search . '%')
                    ->orWhere('nama_dosen', 'like', '%' . $search . '%');
            })->where('dosen.kode_dosen', Auth::user()->email);
        }

        $jadwal = $query->paginate($entries);

        $tahunAkademik = Tahunakademik::all();

        if ($request->ajax()) {
            $nilai = Nilai::all();
            return view('partials.nilai', compact('jadwal_reguler', 'nilai'))->render(); // Update this partial view as needed
        }

        $nilai = Nilai::all();

        return view('page.uts_dosen.index', compact(['jadwal', 'tahunAkademik', 'nilai', 'tgl_ujian_susulan', 'uts']))
            ->with('i', ($page - 1) * $entries);
    }

    public function daftar_print_uts(Request $request)
    {
        $page = $request->input('page', 1);
        $entries = $request->input('entries', 30);
        $search = $request->input('search');

        $kelas = Kelas::all();
        $tahun_angkatan = DB::table('mahasiswa')
            ->select('tahun_angkatan')
            ->groupBy('tahun_angkatan')
            ->get();
        $konfigurasi = Konfigurasi::first();
        $default_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $tahun_akademik = $request->input('id_tahun_akademiks', $default_tahun_akademik);

        // Inisialisasi query
        $query = Mahasiswa::query()
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->orderBy('nama', 'ASC')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan', 'kelas.id_jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->whereNotNull('mahasiswa.tingkat');

        // Cek apakah filter diterapkan
        $filtered = false;

        if ($request->filled('tahun_angkatan')) {
            $query->where('mahasiswa.tahun_angkatan', $request->tahun_angkatan);
            $filtered = true;
        }

        if ($request->filled('kelas')) {
            $query->where('mahasiswa.id_kelas', $request->kelas);
            $filtered = true;
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kelas.kelas', 'like', '%' . $search . '%');
            });
            $filtered = true;
        }

        // Hanya ambil data jika ada filter
        $mahasiswa = $filtered ? $query->paginate($entries) : null;

        return view('page.uts.daftar_print_uts', compact('mahasiswa', 'kelas', 'tahun_angkatan'))
            ->with('i', ($page - 1) * $entries);
    }


    public function print_kartu_uts(Request $request)
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

        $uts = Uts::all();

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

        return view('page.uts.print')->with([
            'stu_data' => $result,
            // 'kelas' => Kelas::all(),
            'jadwal_reguler' => $jadwal_reguler,
            'uts' => $uts
        ]);
    }
}
