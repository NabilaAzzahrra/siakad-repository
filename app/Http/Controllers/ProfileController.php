<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $mahasiswa = Mahasiswa::with(['kelas', 'kelas.jurusan'])
            ->where('nim', Auth::user()->email)
            ->first();

        $admin = User::where('email', Auth::user()->email)->first();
        return view('profile.edit', [
            'user' => $request->user(),
            'mahasiswa' => $mahasiswa,
            'admin' => $admin
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePass(Request $request, string $id)
    {
        // $id = $request->input('id_user');
        $password = $request->input('newPassword');

        $data = [
            'password' => Hash::make($password),
        ];

        $datas = User::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Password Berhasil diubah');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
