<?php

namespace App\Http\Controllers;

use App\Models\AppProj;
use App\Models\PembimbingProject;
use App\Models\Penguji;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengujiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');

        $data = DB::table('app_proj')
            ->join('dosen as dosen_pembimbing', 'dosen_pembimbing.id', '=', 'app_proj.id_dosen')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'app_proj.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->leftJoin('penguji', 'penguji.nim', '=', 'app_proj.nim')
            ->leftJoin('dosen as dosen_penguji', 'dosen_penguji.id', '=', 'penguji.id_penguji')
            ->leftJoin('ruang', 'ruang.id', '=', 'penguji.id_ruang')
            ->select('app_proj.*', 'ruang.*', 'penguji.*', 'dosen_pembimbing.*', 'dosen_penguji.id as id_dosen_penguji', 'dosen_penguji.nama_dosen as nama_dosen_penguji', 'mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->where('verifikasi', 'SUDAH')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('mahasiswa.nama', 'like', '%' . $search . '%')
                        ->orWhere('kelas.kelas', 'like', '%' . $search . '%')
                        ->orWhere('jurusan.jurusan', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('mahasiswa.nama', 'ASC')
            ->get();

        if ($request->ajax()) {
            return view('partials.penguji', compact('data'))->render();
        }

        return view('page.penguji.index')->with([
            'data' => $data
        ]);
    }

    public function pengujiAdd(Request $request)
    {
        // dd($request->all());
        $kodeSidang = date('YmdHis');

        // Pastikan input adalah array atau berikan array kosong sebagai default
        $nims = $request->input('nim', []); // array of nims
        $id_dosens = $request->input('id_dosen', []);
        $id_pengujis = $request->input('id_penguji', []);
        $tgl_sidangs = $request->input('tgl_sidang', []);
        $start_times = $request->input('start_time', []);
        $end_times = $request->input('end_time', []);
        $id_ruangs = $request->input('id_ruang', []);

        // Validasi jika salah satu input bukan array
        if (
            //dd('inii') ||
            !is_array($nims) ||
            !is_array($id_dosens) ||
            !is_array($id_pengujis) ||
            !is_array($tgl_sidangs) ||
            !is_array($start_times) ||
            !is_array($end_times) ||
            !is_array($id_ruangs)
        ) {
            return back()->withErrors(['msg' => 'Input data tidak valid.']);
        }


        // Iterasi untuk setiap data
        foreach ($nims as $index => $nim) {
            // Pastikan index ada di semua array
            $tampung = [];
            if (
                isset($id_dosens[$index], $id_pengujis[$index], $tgl_sidangs[$index], $start_times[$index], $end_times[$index], $id_ruangs[$index])
            ) {
                $data = [
                    'kode_sidang' => $nim,
                    'nim' => $nim,
                    'id_dosen' => $id_dosens[$index],
                    'id_penguji' => $id_pengujis[$index],
                    'tgl_sidang' => $tgl_sidangs[$index],
                    'pukul' => $start_times[$index] . '-' . $end_times[$index],
                    'id_ruang' => $id_ruangs[$index],
                ];
                array_push($tampung, $data);
            }
            Penguji::insert($tampung);
        }
        return redirect()
            ->route('penguji.index')
            ->with('message', 'Data Sudah diupdate');
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
        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
        }
        $penguji = PembimbingProject::all();
        $ruang = Ruang::all();
        $result = DB::table('app_proj')
            ->join('dosen', 'dosen.id', '=', 'app_proj.id_dosen')
            ->join('mahasiswa', 'mahasiswa.nim', '=', 'app_proj.nim')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->leftJoin('penguji', 'penguji.nim', '=', 'app_proj.nim')
            ->whereIn('mahasiswa.nim', $user_ids)
            ->orderBy('mahasiswa.nama', 'ASC')
            ->select('app_proj.*', 'penguji.*', 'dosen.*', 'dosen.id as idDosen', 'mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->get();


        if ($result->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('page.penguji.detail')->with([
            'stu_data' => $result,
            'penguji' => $penguji,
            'ruang' => $ruang,
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
