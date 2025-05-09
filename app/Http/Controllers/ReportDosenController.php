<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwalreguler;
use App\Models\Konfigurasi;
use App\Models\Presensi;
use App\Models\Tahunakademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*$dosen = Dosen::query()  // Gunakan model Eloquent
            ->when($request->input('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where('nama_dosen', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%');
            })
            ->paginate(30);

        if ($request->ajax()) {
            return view('partials.reportDosen', compact('dosen'))->render();
        }

        return view('page.report.dosen', compact('dosen'));*/

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = Dosen::query();

        if ($search) {
            $query->where('nama_dosen', 'like', '%' . $search . '%');
        }

        $dosen = $query->paginate($entries);

        return view('page.report.dosen', compact('dosen'))
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
        $konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $id_dosen = $id;

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->where('id_dosen', $id)
            ->where('id_tahun_akademik', $id_tahun_akademik);

        if ($search) {
            $query->where('materi_ajar', 'like', '%' . $search . '%')->where('id_dosen', $id)->where('id_tahun_akademik', $id_tahun_akademik);
        }

        $jadwal = $query->paginate($entries);

        return view('page.report.show', compact(['jadwal', 'id']))
            ->with('i', ($page - 1) * $entries);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwalreguler::where('id_jadwal', $id)->first();
        $presensi = Presensi::where('id_jadwal', $id)->get();
        return view('page.report.hasil')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
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

    public function show_dosen(string $id, Request $request)
    {
        $konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $id_dosen = Auth::user()->email;

        $kodeDosen = Dosen::where('kode_dosen', $id_dosen)->first();
        $dosen = $kodeDosen->kode_dosen;

        $page = request()->input('page', 1);
        $entries = request()->input('entries', 10);
        $search = request()->input('search');

        $query = Jadwalreguler::query()
            ->join('detail_kurikulum', 'jadwal_reguler.id_detail_kurikulum', '=', 'detail_kurikulum.id_materi_ajar')
            ->join('dosen', 'jadwal_reguler.id_dosen', '=', 'dosen.id')
            ->join('materi_ajar', 'detail_kurikulum.id_materi_ajar', '=', 'materi_ajar.id')
            ->where('kode_dosen', $dosen)
            ->where('id_tahun_akademik', $id_tahun_akademik);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('materi_ajar', 'like', '%' . $search . '%')
                    ->orWhere('nama_dosen', 'like', '%' . $search . '%');
            })->where('dosen.kode_dosen', Auth::user()->email);
        }

        $jadwal = $query->paginate($entries);

        return view('page.report.show_dosen', compact(['jadwal', 'id']))
            ->with('i', ($page - 1) * $entries);
    }

    public function printPresensiDosen(string $id)
    {
        $jadwal = Jadwalreguler::where('id', $id)->first();
        $id_jadwal = $jadwal->id_jadwal;
        $presensi = Presensi::where('id_jadwal', $id_jadwal)->get();
        return view('page.report.print')->with([
            'jadwal' => $jadwal,
            'presensi' => $presensi,
        ]);
    }
}
