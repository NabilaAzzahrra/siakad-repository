<?php

namespace App\Http\Controllers;

use App\Models\Jadwalreguler;
use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\KonfigurasiUjian;
use App\Models\Uts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UjianUTSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwalreguler::all();
        $uts = Uts::all();
        $konfigurasi = KonfigurasiUjian::first();
        $tgl_ujian = $konfigurasi->tgl_ujian;
        $tgl_ujian_susulan = $konfigurasi->tgl_susulan;
        // dd($tgl_ujian_susulan);
        return view('page.uts.index')->with([
            'jadwal' => $jadwal,
            'uts' => $uts,
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
        try {
            $id_jadwal = $request->input('id_jadwal');
            $id_uts = date('YmdHis');
            
            if ($request->hasFile('file') && $request->hasFile('file_cadangan')) {
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
                // Redirect back if files are missing
                return redirect()->back()->with('error', 'Soal tidak ditemukan');
            }
        } catch (\Exception $e) {
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

    public function ujian_uts_dosen()
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

        $uts = Uts::all();
        return view('page.uts_dosen.index')->with([
            'jadwal' => $jadwal,
            'uts' => $uts,
        ]);
    }

    public function daftar_print_uts(Request $request)
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

        return view('page.uts.daftar_print_uts')->with([
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
            'kelas' => $kelas,
            'tahun_angkatan' => $tahun_angkatan,
        ]);
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
