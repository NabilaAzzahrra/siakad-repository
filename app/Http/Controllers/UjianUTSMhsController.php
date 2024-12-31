<?php

namespace App\Http\Controllers;

use App\Models\DetailUts;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\KonfigurasiUjian;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Uts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UjianUTSMhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->email;
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $ga = $konfigurasi->keterangan;

        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $kelas = $mahasiswa->id_kelas;
        $uts = Uts::all();
        $detail_uts = DetailUts::where('nim', $id)->get();

        $konfigurasiUjian = KonfigurasiUjian::first();

        if ($mahasiswa) {
            $tingkat = $mahasiswa->tingkat;
            if ($tingkat === 2) {
                $semester = $ga ? 3 : 4;
            } elseif ($tingkat === 4) {
                $semester = $ga ? 5 : 6;
            } else {
                $semester = $ga ? 1 : 2;
            }

            $jadwal_reguler = Jadwalreguler::with([
                'detail_kurikulum',
                'detail_kurikulum.materi_ajar',
                'detail_kurikulum.materi_ajar.semester'
            ])
                ->where('id_kelas', $kelas)
                ->where('id_keterangan', $keterangan)
                ->where('id_tahun_akademik', $tahun_akademik)
                ->whereHas('detail_kurikulum.materi_ajar.semester', function ($query) use ($semester) {
                    $query->where('semester', $semester);
                })
                ->get();
            // dd($jadwal_reguler);
        } else {
            $jadwal_reguler = collect();
        }

        // KEBUTUHAN INTEGRASI
            $nik = $mahasiswa->nik;
            $tingkat  = $mahasiswa->tingkat;
            $bulan  = date('m', strtotime($konfigurasiUjian->tgl_mulai));
            $tahun  = date('Y', strtotime($konfigurasiUjian->tgl_mulai));

            $url = "https://backend-misilv4.politekniklp3i-tasikmalaya.ac.id/service/keuangan/detail-rencana/{$nik}/{$tingkat}/{$bulan}/{$tahun}";
        // ===================

        try {
            $response = Http::withHeaders([
                'X-Auth-Token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJzdWdpYW50aSJ9.a_xOEdZgwSr8JTqp7ZqEGvyGrlHNzhPutOiAu5_zLC5wQxtiEwSic6lq-IOq3ztVQRe-jZPF1NzrDpHIwYEKHw',
            ])->get($url);

            if ($response->successful()) {
                $data = $response->json();

                if (!empty($data)) {
                    return view('page.uts_mhs.index')->with([
                        'mahasiswa' => $mahasiswa,
                        'konfigurasiUjian' => $konfigurasiUjian,
                        'jadwal_reguler' => $jadwal_reguler,
                        'uts' => $uts,
                        'detail_uts' => $detail_uts,
                    ]);
                } else {
                    return view('page.uts_mhs.pembayaran')->with([
                        'mahasiswa' => $mahasiswa,
                        'konfigurasiUjian' => $konfigurasiUjian,
                        // 'jadwal_reguler' => $jadwal_reguler,
                        // 'uts' => $uts,
                        // 'detail_uts' => $detail_uts,
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal mendapatkan data.',
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }

    }

    public function print_uts_mhs()
    {
        $id = Auth::user()->email;
        $konfigurasi = Konfigurasi::first();
        $tahun_akademik = $konfigurasi->id_tahun_akademik;
        $keterangan = $konfigurasi->id_keterangan;

        $ga = $konfigurasi->keterangan;

        $mahasiswa = Mahasiswa::where('nim', $id)->first();
        $uts = Uts::all();
        $detail_uts = DetailUts::where('nim', $id)->get();

        if ($mahasiswa) {
            $tingkat = $mahasiswa->tingkat;

            $jadwal_reguler = Nilai::with(['mahasiswa', 'jadwal', 'jadwal.detail_kurikulum.materi_ajar.semester'])
                ->where('nim', $id)
                ->whereHas('jadwal.detail_kurikulum.materi_ajar.semester', function ($query) use ($tahun_akademik, $keterangan, $ga, $tingkat) {
                    $query->where('id_tahun_akademik', $tahun_akademik)
                        ->where('id_keterangan', $keterangan);
                    if ($tingkat === 2) {
                        $semester = $ga ? 3 : 4;
                    } elseif ($tingkat === 4) {
                        $semester = $ga ? 5 : 6;
                    } else {
                        $semester = $ga ? 1 : 2;
                    }
                    $query->where('semester', $semester);
                })
                ->get();
        } else {
            $jadwal_reguler = collect();
        }

        return view('page.uts_mhs.print')->with([
            'mahasiswa' => $mahasiswa,
            'jadwal_reguler' => $jadwal_reguler,
            'uts' => $uts,
            'detail_uts' => $detail_uts,
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
