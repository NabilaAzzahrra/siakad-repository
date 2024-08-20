<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')->where('id_kelas', null)->paginate(15);
        $mahasiswa_lengkap = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->whereNotNull('mahasiswa.tingkat')
            ->paginate(30);


        return view('page.mahasiswa.index')->with([
            'mahasiswa' => $mahasiswa,
            'mahasiswa_lengkap' => $mahasiswa_lengkap,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::with('kelas.jurusan')
            ->whereNull('id_kelas')
            ->orWhereNull('tingkat')
            ->paginate(15);
        // Pastikan relasi dimuat

        $kelas = Kelas::all();
        return view('page.mahasiswa.data_baru')->with([
            'mahasiswa' => $mahasiswa,
            'kelas' => $kelas,
        ]);
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
        $kelas = Kelas::all();
        $result = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->whereIn('mahasiswa.nim', $user_ids)
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->paginate(15);

        if ($result->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('page.mahasiswa.detail')->with([
            'stu_data' => $result,
            'kelas' => $kelas,
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
    public function edit_det(Request $request)
    {
        foreach ($request->except('_token', '_method') as $key => $nim) {
            if (str_starts_with($key, 'id')) {
                $mahasiswa = Mahasiswa::where('nim', $nim)->first();

                if ($mahasiswa) {
                    $tingkat = $request->input('tingkat');
                    $kelas = $request->input('kelas');
                    $status = $request->input('status');
                    $keaktifan = $request->input('keaktifan');

                    // Check if no parameters are selected
                    if (empty($tingkat) && empty($kelas) && empty($status) && empty($keaktifan)) {
                        return redirect()->back()->with('alert', 'Pilih setidaknya satu bidang untuk diperbarui!');
                    }

                    $data = [];

                    // Logic for all parameters selected
                    if (!empty($kelas) && !empty($tingkat) && !empty($status) && !empty($keaktifan)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'id_kelas' => $kelas,
                            'tingkat' => $tingkat,
                            'status' => $st,
                            'keaktifan' => $keaktifan,
                        ];
                    }
                    // Logic for three parameters selected
                    elseif (!empty($kelas) && !empty($tingkat) && !empty($status)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'id_kelas' => $kelas,
                            'tingkat' => $tingkat,
                            'status' => $st,
                        ];
                    } elseif (!empty($kelas) && !empty($tingkat) && !empty($keaktifan)) {
                        $data = [
                            'id_kelas' => $kelas,
                            'tingkat' => $tingkat,
                            'keaktifan' => $keaktifan,
                        ];
                    } elseif (!empty($kelas) && !empty($status) && !empty($keaktifan)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'id_kelas' => $kelas,
                            'status' => $st,
                            'keaktifan' => $keaktifan,
                        ];
                    } elseif (!empty($tingkat) && !empty($status) && !empty($keaktifan)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'tingkat' => $tingkat,
                            'status' => $st,
                            'keaktifan' => $keaktifan,
                        ];
                    }
                    // Logic for two parameters selected
                    elseif (!empty($kelas) && !empty($tingkat)) {
                        $data = [
                            'id_kelas' => $kelas,
                            'tingkat' => $tingkat,
                        ];
                    } elseif (!empty($kelas) && !empty($status)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'id_kelas' => $kelas,
                            'status' => $st,
                        ];
                    } elseif (!empty($kelas) && !empty($keaktifan)) {
                        $data = [
                            'id_kelas' => $kelas,
                            'keaktifan' => $keaktifan,
                        ];
                    } elseif (!empty($tingkat) && !empty($status)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'tingkat' => $tingkat,
                            'status' => $st,
                        ];
                    } elseif (!empty($tingkat) && !empty($keaktifan)) {
                        $data = [
                            'tingkat' => $tingkat,
                            'keaktifan' => $keaktifan,
                        ];
                    } elseif (!empty($status) && !empty($keaktifan)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }
                        $data = [
                            'status' => $st,
                            'keaktifan' => $keaktifan,
                        ];
                    }
                    // Logic for one parameter selected
                    elseif (!empty($kelas)) {
                        $data = [
                            'id_kelas' => $kelas,
                        ];
                    } elseif (!empty($tingkat)) {
                        $data = [
                            'tingkat' => $tingkat,
                        ];
                    } elseif (!empty($status)) {
                        if ($status == "true") {
                            $st = 1;
                        } else {
                            $st = 0;
                        }

                        $data = [
                            'status' => $st,
                        ];
                    } elseif (!empty($keaktifan)) {
                        $data = [
                            'keaktifan' => $keaktifan,
                        ];
                    }

                    // Update the record with the selected data
                    $mahasiswa->update($data);
                }
            }
        }

        return redirect()
            ->route('mahasiswa.index')
            ->with('message', 'Data Mahasiswa Sudah diupdate');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'tingkat' => $request->input('tingkat'),
            'id_kelas' => $request->input('kelas'),
        ];

        $datas = Mahasiswa::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('mahasiswa.index')
            ->with('message', 'Data Mahasiswa Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
