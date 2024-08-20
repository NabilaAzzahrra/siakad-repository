<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class IntegrationPMBOnline extends Controller
{
    public function integrate(Request $request)
    {
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

        $new_nim = $yearNow ."0252001". $newNumber;

        $data = [
            'identity_user' => $request->identity_user,
            'nim' => $new_nim,
            'nama' => $request->name,
            'id_kelas' => null,
            'tingkat' => null,
            'no_hp' => $request->phone,
            'status' => false
        ];

        $datas = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        User::create($datas);
        Mahasiswa::create($data);
        return response()->json([
            'mahasiswa' => $data,
            'user' => $datas
        ]);
    }

    public function get_all()
    {
        $mahasiswa = Mahasiswa::with(['kelas', 'kelas.jurusan'])->get();
        return response()->json([
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
