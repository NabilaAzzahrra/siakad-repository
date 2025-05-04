<?php

namespace App\Http\Controllers;

use App\Models\DetailPresensi;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Ambil nilai id_presensi dari inputan
        $presensiId = $request->input('id_presensi');
        $idJadwal = $request->input('id_jadwal');
        $materi = $request->input('materi');

        // Persiapkan array $data untuk update
        $data = [];

        if ($request->hasFile('file')) {
            $materiFile = $request->file('file');
            $materiFileName = $presensiId . '-' . $materi . '.' . $materiFile->extension();
            $materiFilePath = $materiFile->move(public_path('materi'), $materiFileName);
            $materiFilePath = $materiFileName;

            // Masukkan input materi ke dalam $data
            $data['materi'] = $request->input('materi');
            $data['file_materi'] = $materiFileName;
            $data['tgl_presensi'] = date('Y-m-d');
            // Cari data presensi berdasarkan id_presensi
            $presensi = Presensi::where('id_presensi', $presensiId)->first();
            $presensi->update($data);

            foreach ($request->nim as $key => $nim) {
                $detailPresensi = new DetailPresensi();
                $detailPresensi->id_presensi = $presensiId;
                $detailPresensi->nim = $nim;
                $detailPresensi->keterangan = $request->keterangan[$key];
                // Simpan detail presensi
                $detailPresensi->save();
            }
        } else {
            // Masukkan input materi ke dalam $data
            $data['materi'] = $request->input('materi');
            $data['tgl_presensi'] = date('Y-m-d');
            // Cari data presensi berdasarkan id_presensi
            $presensi = Presensi::where('id_presensi', $presensiId)->first();
            $presensi->update($data);

            foreach ($request->nim as $key => $nim) {
                $detailPresensi = new DetailPresensi();
                $detailPresensi->id_presensi = $presensiId;
                $detailPresensi->nim = $nim;
                $detailPresensi->keterangan = $request->keterangan[$key];
                // Simpan detail presensi
                $detailPresensi->save();
            }
        }

        if (Auth::user()->role == 'A') {
            return redirect()
                ->route('jadwal_reguler.show', $idJadwal)
                ->with('message', 'Data presensi telah berhasil ditambahkan.');
        } else {
            return redirect()
                ->route('jadwal_reguler.jadwal_dosen', Auth::user()->email)
                ->with('message', 'Data presensi telah berhasil ditambahkan.');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.kelas'])->where('id_presensi', $id)->first();
        $mahasiswa = Mahasiswa::where('id_kelas', $presensi->jadwal->id_kelas)
            ->orderBy('nama', 'asc')
            ->get();
        return view('page.presensi.show')->with([
            'presensi' => $presensi,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $presensi = Presensi::with(['jadwal', 'jadwal.kelas'])->where('id_presensi', $id)->first();
        $mahasiswa = DetailPresensi::where('id_presensi', $id)
            ->get();
        return view('page.presensi.edit')->with([
            'presensi' => $presensi,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $presensi = Presensi::find($id);
        $presensi = Presensi::where('id_presensi', $id)->first();

        $idJadwal = $presensi->id_jadwal;

        if (!$presensi) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $presensi->materi = $request->input('materi');

        // Ambil nama file materi lama untuk referensi
        $oldEbook = $presensi->file_materi;

        // Jika ada file materi yang diunggah
        if ($request->hasFile('file')) {
            // Hapus file materi lama jika ada
            if ($oldEbook && file_exists(public_path('materi/' . $oldEbook))) {
                unlink(public_path('materi/' . $oldEbook));
            }

            // Simpan file materi baru
            $file = $request->file('file');
            $filename = $presensi->id_presensi . '-' . $presensi->materi . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('materi'), $filename);

            // Simpan nama file materi baru ke database
            $presensi->file_materi = $filename;
        }

        // Simpan perubahan ke database
        $presensi->save();

        DetailPresensi::where('id_presensi', $id)->delete();

        foreach ($request->nim as $key => $nim) {
            $detailPresensi = new DetailPresensi();
            $detailPresensi->id_presensi = $id;
            $detailPresensi->nim = $nim;
            $detailPresensi->keterangan = $request->keterangan[$key];
            // Simpan detail presensi
            $detailPresensi->save();
        }

        return redirect()
            ->route('jadwal_reguler.show', $idJadwal)
            ->with('message', 'Data presensi telah berhasil diperbarui.');
    }

    // Validate the request data
    // $request->validate([
    //     'materis' => 'required|string',
    //     'materi' => 'file|mimes:pdf,doc,docx|max:2048', // Adjust the mime types and size as needed
    // ]);

    public function materi_update(string $id)
    {
        $presensi = Presensi::where('id_presensi', $id)->first();
        return view('page.presensi.materi')->with([
            'presensi' => $presensi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
