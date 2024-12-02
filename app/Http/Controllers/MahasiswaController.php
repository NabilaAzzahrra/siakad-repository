<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mahasiswa = DB::table('mahasiswa')->where('id_kelas', null)->paginate(10);

        $search = $request->input('search');

        $mahasiswa_lengkap = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id')
            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id')
            ->select('mahasiswa.*', 'kelas.kelas', 'jurusan.jurusan')
            ->whereNotNull('mahasiswa.id_kelas')
            ->whereNotNull('mahasiswa.tingkat')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('mahasiswa.nama', 'like', '%' . $search . '%')
                        ->orWhere('kelas.kelas', 'like', '%' . $search . '%')
                        ->orWhere('jurusan.jurusan', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('nama', 'ASC')
            ->get();

        if ($request->ajax()) {
            return view('partials.mahasiswa', compact('mahasiswa_lengkap'))->render();
        }


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
            ->orderBy('nama', 'ASC')
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
        return back()->with('message_update', 'Data Berhasil diupdate');
    }

    public function profilUpdate(Request $request, string $id)
    {
        $nim = $request->input('nim');
        $tgl_lahir = $request->input('tgl_lahir');
        $emailOrtu = 'ortu' . $nim;

        $data = [
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'no_hp' => $request->input('no_hp')
        ];

        $dataUser = [
            'name' => $request->input('nama'),
        ];

        $dataUserOrtu = [
            'password' => Hash::make($tgl_lahir),
        ];

        $datasUserOrtu = User::where('email', $emailOrtu)->first();
        $datasUserOrtu->update($dataUserOrtu);

        $datasUser = User::where('email', $nim)->first();
        $datasUser->update($dataUser);

        $datas = Mahasiswa::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function importExcel(Request $request)
    // {
    //     // Validasi file
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls'
    //     ]);

    //     // Ambil file
    //     $file = $request->file('file');

    //     // Baca file Excel
    //     $spreadsheet = IOFactory::load($file->getPathname());
    //     $sheet = $spreadsheet->getActiveSheet()->toArray();

    //     // Loop melalui baris di Excel
    //     foreach (array_slice($sheet, 1) as $row) {
    //         $jurusanName = $row[11] ?? null;

    //         // Pastikan jurusan tidak null atau kosong
    //         if (!empty($jurusanName)) {
    //             // Periksa apakah jurusan sudah ada
    //             $jurusan = Jurusan::where('jurusan', $jurusanName)->first();

    //             // Jika jurusan tidak ada, buat jurusan baru
    //             if ($jurusan == null) {
    //                 $jurusan = Jurusan::create(['jurusan' => $jurusanName]);
    //             }
    //         } else {
    //             // Tangani jika jurusan tidak ada (misal: log error atau skip row)
    //             continue; // Skip this row if jurusan is null
    //         }

    //         // Periksa apakah kelas sudah ada
    //         $kelasName = $row[5];
    //         $kelas = Kelas::where('kelas', $kelasName)->first();

    //         // Jika kelas tidak ada, buat kelas baru
    //         if ($kelas == null) {
    //             $kelas = Kelas::create(['kelas' => $kelasName, 'id_dosen' => 1, 'id_jurusan' => $jurusan->id]);
    //         }

    //         $status = $row[8];
    //         $statusValue = ($status == "NO ACCESS") ? 0 : 1;

    //         // Masukkan data mahasiswa dengan id_kelas dari kelas yang sudah ada atau baru dibuat
    //         Mahasiswa::create([
    //             'identity_user'   => $row[0],
    //             'nim'             => $row[1],
    //             'nama'            => $row[2],
    //             'tempat_lahir'    => $row[3],
    //             'tgl_lahir'       => $row[4],
    //             'id_kelas'        => $kelas->id,
    //             'tingkat'         => $row[6],
    //             'no_hp'           => $row[7],
    //             'status'          => $statusValue,
    //             'tahun_angkatan'  => $row[9],
    //             'keaktifan'       => $row[10],
    //         ]);

    //         // Buat akun user mahasiswa
    //         User::create([
    //             'name' => $row[2],
    //             'email' => $row[1],
    //             'password' => Hash::make($row[1]),
    //             'role' => 'M'
    //         ]);

    //         // Buat akun user orang tua
    //         User::create([
    //             'name' => 'Orang Tua ' . $row[2],
    //             'email' => 'ortu' . $row[1],
    //             'password' => Hash::make($row[4]),
    //             'role' => 'O'
    //         ]);
    //     }

    //     return redirect()->back()->with('success', 'Data berhasil diimport!');
    // }

    public function importExcel(Request $request)
{
    // Validasi file
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    // Ambil file
    $file = $request->file('file');

    // Baca file Excel
    $spreadsheet = IOFactory::load($file->getPathname());
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    // Loop melalui baris di Excel
    foreach (array_slice($sheet, 1) as $row) {
        $jurusanName = $row[11] ?? null;

        // Pastikan jurusan tidak null atau kosong
        if (!empty($jurusanName)) {
            // Periksa apakah jurusan sudah ada
            $jurusan = Jurusan::firstOrCreate(['jurusan' => $jurusanName]);
        } else {
            // Skip jika jurusan kosong
            continue;
        }

        // Periksa apakah kelas sudah ada
        $kelasName = $row[5];
        $kelas = Kelas::firstOrCreate(['kelas' => $kelasName], [
            'id_dosen' => 1,
            'id_jurusan' => $jurusan->id
        ]);

        $status = $row[8];
        $statusValue = ($status == "NO ACCESS") ? 0 : 1;

        // Perbarui atau buat data mahasiswa
        $mahasiswa = Mahasiswa::updateOrCreate(
            ['nim' => $row[1]], // Kondisi pengecekan
            [
                'identity_user'   => $row[0],
                'nama'            => $row[2],
                'tempat_lahir'    => $row[3],
                'tgl_lahir'       => $row[4],
                'id_kelas'        => $kelas->id,
                'tingkat'         => $row[6],
                'no_hp'           => $row[7],
                'status'          => $statusValue,
                'tahun_angkatan'  => $row[9],
                'keaktifan'       => $row[10],
            ]
        );

        // Perbarui atau buat akun user mahasiswa
        User::updateOrCreate(
            ['email' => $row[1]], // Kondisi pengecekan berdasarkan email
            [
                'name' => $row[2],
                'password' => Hash::make($row[1]),
                'role' => 'M'
            ]
        );

        // Perbarui atau buat akun user orang tua
        User::updateOrCreate(
            ['email' => 'ortu' . $row[1]], // Kondisi pengecekan berdasarkan email
            [
                'name' => 'Orang Tua ' . $row[2],
                'password' => Hash::make($row[4]),
                'role' => 'O'
            ]
        );
    }

    return redirect()->back()->with('success', 'Data berhasil diimport!');
}


    public function edit_databaru(Request $request)
    {
        $user_ids = $request->input('user_id'); // Ambil data dari input user_id
        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Pilih dulu');
        }

        $kelas = Kelas::all();

        // Looping untuk mendapatkan data berdasarkan user_ids yang di-checklist
        $result = Mahasiswa::whereIn('mahasiswa.nim', $user_ids)
            ->orderBy('nama', 'ASC')
            ->paginate(15);

        return view('page.mahasiswa.detailDatabaru')->with([
            'stu_data' => $result,
            'kelas' => $kelas,
        ]);
    }

    public function edit_detDataBaru(Request $request)
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
}
