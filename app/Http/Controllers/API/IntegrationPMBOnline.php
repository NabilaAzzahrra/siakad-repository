<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class IntegrationPMBOnline extends Controller
{
    public function integrate(Request $request)
    {

        // return response($request->all());

        if ($request->major === "TO25L") {
            $yearNow = date('y');

            $lastNIM = Mahasiswa::where('nim', 'like', $yearNow . '%')
                ->orderBy('nim', 'desc')
                ->pluck('nim')
                ->first();

            if ($lastNIM) {
                $lastNumber = substr($lastNIM, -4);

                $nextNumber = intval($lastNumber) + 1;

                $newNumber = str_pad($nextNumber, 4, "0", STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            $new_nim = $yearNow . "0252001" . $newNumber;

            $data = [
                'nik' => $request->nik,
                'nim' => $new_nim,
                'nama' => $request->name,
                'tempat_lahir' => $request->place_of_birth,
                'tgl_lahir' => $request->date_of_birth,
                'tahun_angkatan' => $request->pmb,
                'id_kelas' => null,
                'tingkat' => null,
                'no_hp' => $request->phone,
                'status' => false,
                'keaktifan' => "aktif",
            ];

            // return response()->json($data);

            $datas = [
                'name' => $request->name,
                'email' => $new_nim,
                'password' => $new_nim,
                'role' => 'M'
            ];

            $datas_ortu = [
                'name' => "Orang Tua" . " " . $request->name,
                'email' => "ortu" . $new_nim,
                'password' => $request->date_of_birth,
                'role' => 'O'
            ];

            // return response()->json($datas_ortu);

            User::create($datas);
            User::create($datas_ortu);
            Mahasiswa::create($data);
            return response()->json([
                'mahasiswa' => $data,
                'user' => $datas,
                // 'user' => $datas
            ]);
        } else {
            return response()->json([
            'message'=> 'GA BOLEH YA, NO NO'
            ]);
        }
    }

    public function get_all()
    {
        $mahasiswa = Mahasiswa::with(['kelas', 'kelas.jurusan'])->get();
        return response()->json([
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
