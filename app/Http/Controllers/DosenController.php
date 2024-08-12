<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.dosen.index');
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
        $data = [
            'nama_dosen' => $request->input('nama_dosen'),
            'email' => $request->input('email_dosen'),
            'no_hp' => $request->input('no_hp_dosen'),
            'password' => $request->input('password'),
        ];

        $datas = [
            'name' => $request->input('nama_dosen'),
            'email' => $request->input('email_dosen'),
            'password' => $request->input('password'),
        ];

        Dosen::create($data);
        User::create($datas);

        return redirect()
            ->route('dosen.index')
            ->with('message', 'Data Dosen Sudah ditambahkan');
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
        $email = $request->input('email_lama');
        $data = [
            'nama_dosen' => $request->input('nama_dosen'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'password' => $request->input('password'),
        ];

        $datas_user = [
            'name' => $request->input('nama_dosen'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];



        $datas = Dosen::findOrFail($id);
        $data_user = User::where('email', $email)->first();
        // dd($email);
        $datas->update($data);
        $data_user->update($datas_user);
        return redirect()
            ->route('dosen.index')
            ->with('message', 'Data Dosen Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $data = Dosen::findOrFail($id);
        $user = User::where('email', $data->email)->firstOrFail();

        $user->delete();
        $data->delete();

        return back()->with('message_delete', 'Data Dosen Sudah dihapus');
    }
}
