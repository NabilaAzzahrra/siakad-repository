<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @can('role-M')
            <div class="max-w-8xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white flex gap-5 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="w-[1000px]">
                        <div class="flex p-4 gap-5 bg-gray-100 rounded-xl">
                            <div class="ms-1 ml-[15px]">
                                <img src="{{ url('img/user.png') }}" alt="" srcset="" class="lg:w-20">
                            </div>
                            <div class="mt-2">
                                <div class="font-bold">{{ $mahasiswa->nama }}</div>
                                <div>{{ $mahasiswa->nim }}</div>
                                <div class="text-sm">{{ $mahasiswa->kelas->jurusan->jurusan }}</div>
                                <input type="hidden" class="form-control" id="identity" name="identity"
                                    value={{ $mahasiswa->nik }}>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-100 rounded-xl mt-4">
                            <div class="text-center p-2 border border-black border-2 rounded-xl bg-sky-200 font-bold">AKUN
                                PMB ONLINE MAHASISWA
                                LP3I TASIKMALAYA</div>
                            <div class="flex gap-5 mt-4">
                                <div class="w-full">
                                    <div class="font-bold">Email</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div class="mt-1 text-gray-300"><i class="fi fi-br-at"></i></div>
                                        <div>
                                            <span id="email_account">...</span>
                                        </div>
                                        <div id="copyEmail" class="hover:text-sky-500 mt-1 text-gray-300"><i
                                                class="fi fi-rr-clone"></i></div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="font-bold">Password</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div class="mt-1 text-gray-300"><i class="fi fi-rr-key"></i></div>
                                        <div>
                                            <span id="password_account">...</span>
                                        </div>
                                        <div id="copyPassword" class="hover:text-sky-500 mt-1 text-gray-300"><i
                                                class="fi fi-rr-clone"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-red-500 font-bold">Note:</span><br>
                                <p class="text-wrap text-justify">Untuk mengisi berkas yang diperlukan maka upload <a
                                        href="https://pmb.politekniklp3i-tasikmalaya.ac.id/login" target="_blank"
                                        class="text-sky-500">disini</a> dengan email dan password di atas, untuk password
                                    default menggunakan nomor handphone. Jika lupa, Silahkan akses di <a
                                        href="https://pmb.politekniklp3i-tasikmalaya.ac.id/forgot-password" target="_blank"
                                        class="text-red-500">disini</a>.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-100 rounded-xl mt-4">
                            <div class="text-center p-2 border border-black border-2 rounded-xl bg-amber-200 font-bold">AKUN
                                SIAKAD
                                LP3I TASIKMALAYA</div>
                            <div class="flex gap-5 mt-4">
                                <div class="w-full">
                                    <div class="font-bold">Username</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div class="mt-1 text-gray-300"><i class="fi fi-br-at"></i></div>
                                        <div>
                                            <span id="userSiakad">{{ $mahasiswa->nim }}</span>
                                        </div>
                                        <div id="copyUserSiakad" class="hover:text-sky-500 mt-1 text-gray-300"><i
                                                class="fi fi-rr-clone"></i></div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="font-bold">Password</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div class="mt-1 text-gray-300"><i class="fi fi-rr-key"></i></div>
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->nim }}</span>
                                        </div>
                                        <div id="copyPassSiakad" class="hover:text-sky-500 mt-1 text-gray-300"><i
                                                class="fi fi-rr-clone"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-100 rounded-xl mt-4">
                            <div class="text-center p-2 border border-black border-2 rounded-xl bg-emerald-200 font-bold">
                                DATA POKOK SIAKAD</div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <div class="font-bold">Nama Peserta Didik</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="userSiakad">{{ $mahasiswa->nama }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-5 mt-2">
                                <div class="w-full">
                                    <div class="font-bold">Tempat Lahir</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->tempat_lahir }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="font-bold">Tanggal Lahir</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span
                                                id="passSiakad">{{ date('d-m-Y', strtotime($mahasiswa->tgl_lahir)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-5 mt-2">
                                <div class="w-32">
                                    <div class="font-bold">Kelas</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->kelas->kelas }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="font-bold">Program Studi</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->kelas->jurusan->jurusan }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-5 mt-2">
                                <div class="w-full">
                                    <div class="font-bold">No Handphone</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->no_hp }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="font-bold">Tahun Angkatan</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->tahun_angkatan }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="font-bold">Keaktifan</div>
                                    <div
                                        class="border border-gray-200 border-2 hover:border-sky-500 rounded-xl flex justify-between items-center p-2">
                                        <div>
                                            <span id="passSiakad">{{ $mahasiswa->keaktifan }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 bg-sky-300 p-2 w-20 text-center rounded-xl font-bold">
                                <button type="button" data-id="{{ $mahasiswa->id }}" data-modal-target="sourceModal"
                                    data-nim="{{ $mahasiswa->nim }}" data-nama="{{ $mahasiswa->nama }}"
                                    data-tempat_lahir="{{ $mahasiswa->tempat_lahir }}"
                                    data-tgl_lahir="{{ $mahasiswa->tgl_lahir }}" data-no_hp="{{ $mahasiswa->no_hp }}"
                                    onclick="editSourceModal(this)">
                                    UBAH
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <div
                            class="tab flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 mb-4">
                            <button
                                class="tablinks inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg dark:bg-gray-800 dark:text-blue-500"
                                onclick="openTab(event, 'PesertaDidik')">PESERTA DIDIK</button>
                            <button
                                class="tablinks inline-block p-4 text-gray-600 bg-white rounded-t-lg dark:bg-gray-700 dark:text-gray-400"
                                onclick="openTab(event, 'OrangTuaWali')">ORANG TUA/WALI</button>
                        </div>

                        <div id="PesertaDidik" class="tab-content border border-2 p-2 rounded-xl">
                            <div class="flex gap-2 items-start">
                                <div class="w-full ">
                                    <div
                                        class="bg-sky-200 p-2 border border-2 rounded-xl font-bold items-center text-center border-black mb-2">
                                        DATA DIRI</div>
                                    <div class="border p-4 rounded-xl border-2">
                                        <div class="flex mb-2">
                                            <div class="font-bold text-red-500 mr-3 w-32">Nama Lengkap</div>
                                            <div class="mr-2">:</div>
                                            <div><span id="namaLengkap">...</span></div>
                                        </div>
                                        <div class="flex mb-2">
                                            <div class="font-bold text-red-500 mr-3 w-32">Tempat Lahir</div>
                                            <div class="mr-2">:</div>
                                            <div><span id="tempatLahir">...</span></div>
                                        </div>
                                        <div class="flex mb-2">
                                            <div class="font-bold text-red-500 mr-3 w-32">Tanggal Lahir</div>
                                            <div class="mr-2">:</div>
                                            <div><span id="tanggalLahir">...</span></div>
                                        </div>
                                        <div class="flex">
                                            <div class="font-bold text-red-500 mr-3 w-32">Jenis Kelamin</div>
                                            <div class="mr-2">:</div>
                                            <div><span id="jenisKelamin">...</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full ">
                                    <div
                                        class="bg-sky-200 p-2 border border-2 rounded-xl font-bold items-center text-center border-black mb-2">
                                        ALAMAT</div>
                                    <div class="border p-4 rounded-xl border-2">
                                        <div class="flex mb-2">
                                            <div><span id="alamat" class="text-wrap">...</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2 items-start mt-2">
                                <div class="w-full ">
                                    <div
                                        class="bg-sky-200 p-2 border border-2 rounded-xl font-bold items-center text-center border-black mb-2">
                                        KONTAK</div>
                                    <div class="border p-4 rounded-xl border-2">
                                        <div class="flex gap-2">
                                            <div class="w-full">
                                                <div class="font-bold text-red-500 mr-3 w-32">No Handphone</div>
                                                <div><span id="noHandphone">...</span></div>
                                            </div>
                                            <div class="w-full">
                                                <div class="font-bold text-red-500 mr-3 w-32">Email</div>
                                                <div><span id="emailContact">...</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full ">
                                    <div
                                        class="bg-sky-200 p-2 border border-2 rounded-xl font-bold items-center text-center border-black mb-2">
                                        PENDIDIKAN SEBELUMNYA</div>
                                    <div class="border p-4 rounded-xl border-2">
                                        <div class="w-full mb-2">
                                            <div class="font-bold text-red-500 mr-3 w-32">Asal Sekolah</div>
                                            <div><span id="asalSekolah">...</span></div>
                                        </div>
                                        <div class="flex gap-2">
                                            <div class="w-full">
                                                <div class="font-bold text-red-500 mr-3 w-32">Program Studi</div>
                                                <div><span id="jurusan">...</span></div>
                                            </div>
                                            <div class="w-full">
                                                <div class="font-bold text-red-500 mr-3 w-32">Tahun Lulus</div>
                                                <div><span id="tahunLulus">...</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="OrangTuaWali" class="tab-content border border-2 p-2 rounded-xl" style="display:none;">
                            <div class="flex gap-2 items-start mt-2">
                                <div class="w-full ">
                                    <div
                                        class="bg-sky-200 p-2 border border-2 rounded-xl font-bold items-center text-center border-black mb-2">
                                        DATA AYAH</div>
                                    <div class="border p-4 rounded-xl border-2">
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">Nama</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="namaAyah">...</span></div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">Pekerjaan</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="pekerjaanAyah">...</span></div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">Pendidikan</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="pendidikanAyah">...</span></div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">No Handphone</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="noHandphoneAyah">...</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full ">
                                    <div
                                        class="bg-sky-200 p-2 border border-2 rounded-xl font-bold items-center text-center border-black mb-2">
                                        DATA IBU</div>
                                    <div class="border p-4 rounded-xl border-2">
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">Nama</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="namaIbu">...</span></div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">Pekerjaan</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="pekerjaanIbu">...</span></div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">Pendidikan</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="pendidikanIbu">...</span></div>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex mb-2">
                                                <div class="font-bold text-red-500 mr-3 w-32">No Handphone</div>
                                                <div class="mr-2">:</div>
                                                <div><span id="noHandphoneIbu">...</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
                <div class="fixed inset-0 bg-black opacity-50"></div>
                <div class="fixed inset-0 flex items-center justify-center">
                    <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                                Tambah Sumber Database
                            </h3>
                            <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                data-modal-hide="defaultModal">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <form method="POST" id="formSourceModal">
                            @csrf
                            <div class="flex flex-col  p-4 space-y-6">
                                <input type="hidden" id="nim" name="nim">
                                <div class="">
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" id="nama" name="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="" placeholder="Masukan nama disini...">
                                </div>
                                <div class="mb-5">
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                                        Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="" placeholder="Masukan Tempat Lahir disini...">
                                </div>
                                <div class="mb-5">
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                        Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="" placeholder="Masukan Tanggal Lahir disini...">
                                </div>
                                <div class="mb-5">
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">No
                                        HP</label>
                                    <input type="text" id="no_hp" name="no_hp"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        id="" placeholder="Masukan No HP disini...">
                                </div>
                            </div>
                            <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                                <button type="submit" id="formSourceButton"
                                    class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                                <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                                    class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        @can('role-A')
            <div class="max-w-4xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  gap-5 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="flex p-4 gap-5 bg-gray-100 rounded-xl">
                            <div class="ms-1 ml-[15px]">
                                <img src="{{ url('img/user.png') }}" alt="" srcset=""
                                    class="lg:w-20 w-14">
                            </div>
                            <div class="mt-2">
                                <div class="font-bold">{{ $admin->name }}</div>
                                <div>{{ $admin->email }}</div>
                                <div class="text-sm">{{ $admin->role == 'A' ? 'Administrator' : 'Orang Tua' }}</div>
                            </div>
                        </div>
                        <div class="p-4 gap-5 bg-gray-100 rounded-xl mt-4">
                            <div
                                class="bg-sky-200 p-2 border border-2 border-black rounded-xl w-full text-center font-bold">
                                SETTING PASSWORD</div>
                            <div>
                                <form action="{{ route('profile.updatePass', $admin->id) }}" method="post"
                                    id="passwordForm">
                                    @csrf
                                    @method('PATCH')
                                    <div class="p-4 rounded-xl">
                                        <div class="lg:flex-row gap-5">
                                            <div class="flex flex-col lg:flex-row gap-5 w-full">
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="newPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                        Baru</label>
                                                    <input type="password" id="newPassword" name="newPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Password Baru disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleNewPassword"></i>
                                                </div>
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="konfirPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                                        Password</label>
                                                    <input type="password" id="konfirPassword" name="konfirPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Konfirmasi Password disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleConfirmPassword"></i>
                                                    <span id="passwordError" class="text-red-500 text-sm hidden">Passwords
                                                        do not match!</span>
                                                    <span id="passwordMatch"
                                                        class="text-green-500 text-sm hidden">Passwords match!</span>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endcan

        @can('role-O')
            <div class="max-w-4xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  gap-5 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="flex p-4 gap-5 bg-gray-100 rounded-xl">
                            <div class="ms-1 ml-[15px]">
                                <img src="{{ url('img/user.png') }}" alt="" srcset=""
                                    class="lg:w-20 w-14">
                            </div>
                            <div class="mt-2">
                                <div class="font-bold">{{ $admin->name }}</div>
                                <div>{{ $admin->email }}</div>
                                <div class="text-sm">{{ $admin->role == 'A' ? 'Administrator' : 'Orang Tua' }}</div>
                            </div>
                        </div>
                        <div class="p-4 gap-5 bg-gray-100 rounded-xl mt-4">
                            <div
                                class="bg-sky-200 p-2 border border-2 border-black rounded-xl w-full text-center font-bold">
                                SETTING PASSWORD</div>
                            <div>
                                <form action="{{ route('profile.updatePass', $admin->id) }}" method="post"
                                    id="passwordForm">
                                    @csrf
                                    @method('PATCH')
                                    <div class="p-4 rounded-xl">
                                        <div class="lg:flex-row gap-5">
                                            <div class="flex flex-col lg:flex-row gap-5 w-full">
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="newPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                        Baru</label>
                                                    <input type="password" id="newPassword" name="newPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Password Baru disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleNewPassword"></i>
                                                </div>
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="konfirPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                                        Password</label>
                                                    <input type="password" id="konfirPassword" name="konfirPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Konfirmasi Password disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleConfirmPassword"></i>
                                                    <span id="passwordError" class="text-red-500 text-sm hidden">Passwords
                                                        do not match!</span>
                                                    <span id="passwordMatch"
                                                        class="text-green-500 text-sm hidden">Passwords match!</span>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endcan
        @can('role-D')
            <div class="max-w-4xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  gap-5 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="flex p-4 gap-5 bg-gray-100 rounded-xl">
                            <div class="ms-1 ml-[15px]">
                                <img src="{{ url('img/user.png') }}" alt="" srcset=""
                                    class="lg:w-20 w-14">
                            </div>
                            <div class="mt-2">
                                <div class="font-bold">{{ $admin->name }}</div>
                                <div>{{ $admin->email }}</div>
                                <div class="text-sm">{{ $admin->role == 'A' ? 'Administrator' : 'Orang Tua' }}</div>
                            </div>
                        </div>
                        <div class="p-4 gap-5 bg-gray-100 rounded-xl mt-4">
                            <div
                                class="bg-sky-200 p-2 border border-2 border-black rounded-xl w-full text-center font-bold">
                                SETTING PASSWORD</div>
                            <div>
                                <form action="{{ route('profile.updatePass', $admin->id) }}" method="post"
                                    id="passwordForm">
                                    @csrf
                                    @method('PATCH')
                                    <div class="p-4 rounded-xl">
                                        <div class="lg:flex-row gap-5">
                                            <div class="flex flex-col lg:flex-row gap-5 w-full">
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="newPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                        Baru</label>
                                                    <input type="password" id="newPassword" name="newPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Password Baru disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleNewPassword"></i>
                                                </div>
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="konfirPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                                        Password</label>
                                                    <input type="password" id="konfirPassword" name="konfirPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Konfirmasi Password disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleConfirmPassword"></i>
                                                    <span id="passwordError" class="text-red-500 text-sm hidden">Passwords
                                                        do not match!</span>
                                                    <span id="passwordMatch"
                                                        class="text-green-500 text-sm hidden">Passwords match!</span>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endcan
    </div>
</x-app-layout>
<script>
    const getResult = async () => {
        const identity = document.getElementById('identity').value;
        console.log(identity);

        await axios.get(`https://pmb-api.politekniklp3i-tasikmalaya.ac.id/applicants/nik/${identity}`, {
                headers: {
                    'lp3i-api-key': 'aEof9XqcH34k3g6IbJcQLxGY',
                }
            })
            .then((response) => {
                const data = response.data;
                const dataGender = data.data.gender;
                console.log(data);

                document.getElementById('email_account').innerText = data.account.email;
                document.getElementById('password_account').innerText = data.account.phone;
                document.getElementById('namaLengkap').innerText = data.account.name;
                document.getElementById('tempatLahir').innerText = data.data.placeOfBirth;
                document.getElementById('tanggalLahir').innerText = data.data.dateOfBirth;
                if (dataGender == true) {
                    document.getElementById('jenisKelamin').innerText = "Laki-laki";
                } else {
                    document.getElementById('jenisKelamin').innerText = "Perempuan";
                }
                document.getElementById('alamat').innerText = data.data.address;
                document.getElementById('noHandphone').innerText = data.account.phone;
                document.getElementById('emailContact').innerText = data.data.email;
                document.getElementById('asalSekolah').innerText = data.data.schoolapplicant.name;
                document.getElementById('jurusan').innerText = data.data.major;
                document.getElementById('tahunLulus').innerText = data.data.year;

                document.getElementById('namaAyah').innerText = data.father.name;
                document.getElementById('pekerjaanAyah').innerText = data.father.job;
                document.getElementById('pendidikanAyah').innerText = data.father.education;
                document.getElementById('noHandphoneAyah').innerText = data.father.phone;

                document.getElementById('namaIbu').innerText = data.mother.name;
                document.getElementById('pekerjaanIbu').innerText = data.mother.job;
                document.getElementById('pendidikanIbu').innerText = data.mother.education;
                document.getElementById('noHandphoneIbu').innerText = data.mother.phone;
            })
            .catch((error) => {
                console.log(error);
            });
    }
    getResult();
</script>
<script>
    document.getElementById('copyEmail').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var emailText = document.getElementById('email_account').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = emailText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Email telah disalin: ' + emailText);
    });

    document.getElementById('copyPassword').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var emailText = document.getElementById('password_account').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = emailText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Password telah disalin: ' + emailText);
    });

    document.getElementById('copyUserSiakad').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var userText = document.getElementById('userSiakad').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = userText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Username Siakad telah disalin: ' + userText);
    });

    document.getElementById('copyPassSiakad').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var passText = document.getElementById('passSiakad').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = passText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Password Siakad telah disalin: ' + passText);
    });
</script>
<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const nim = button.dataset.nim;
        const nama = button.dataset.nama;
        const tempat_lahir = button.dataset.tempat_lahir;
        const tgl_lahir = button.dataset.tgl_lahir;
        const no_hp = button.dataset.no_hp;
        let url = "{{ route('mahasiswa.profilUpdate', ':id') }}".replace(':id', id);
        console.log(url);
        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Profile SIAKAD`;

        document.getElementById('nim').value = nim;
        document.getElementById('nama').value = nama;
        document.getElementById('tempat_lahir').value = tempat_lahir;
        document.getElementById('tgl_lahir').value = tgl_lahir;
        document.getElementById('no_hp').value = no_hp;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }
</script>
<script>
    function openTab(evt, tabName) {
        // Menyembunyikan semua konten tab
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Menghapus kelas aktif dari semua tombol tab
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("bg-gray-100", "text-blue-600", "dark:bg-gray-800", "dark:text-blue-500");
            tablinks[i].classList.add("text-gray-600", "bg-white", "dark:bg-gray-700", "dark:text-gray-400");
        }

        // Menampilkan konten tab yang dipilih dan menambahkan kelas aktif
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("bg-gray-100", "text-blue-600", "dark:bg-gray-800", "dark:text-blue-500");
        evt.currentTarget.classList.remove("text-gray-600", "bg-white", "dark:bg-gray-700", "dark:text-gray-400");
    }

    // Buka tab pertama secara default
    document.querySelector('.tablinks').click();
</script>
<script>
    const toggleNewPassword = document.querySelector('#toggleNewPassword');
    const newPassword = document.querySelector('#newPassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassword = document.querySelector('#konfirPassword');
    const passwordError = document.querySelector('#passwordError');
    const passwordMatch = document.querySelector('#passwordMatch');
    const passwordForm = document.querySelector('#passwordForm');

    // Toggle password visibility
    toggleNewPassword.addEventListener('click', function () {
        const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        newPassword.setAttribute('type', type);
        this.classList.toggle('fi-ss-eye');
        this.classList.toggle('fi-sr-eye-crossed');
    });

    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.classList.toggle('fi-ss-eye');
        this.classList.toggle('fi-sr-eye-crossed');
    });

    // Check if passwords match
    confirmPassword.addEventListener('input', function () {
        if (confirmPassword.value !== newPassword.value) {
            passwordError.classList.remove('hidden');  // Show error
            passwordMatch.classList.add('hidden');     // Hide success
        } else if (confirmPassword.value !== '') {
            passwordError.classList.add('hidden');     // Hide error
            passwordMatch.classList.remove('hidden');  // Show success
        }
    });

    // Prevent form submission if passwords don't match
    passwordForm.addEventListener('submit', function (event) {
        if (confirmPassword.value !== newPassword.value) {
            event.preventDefault();  // Stop form submission
            passwordError.classList.remove('hidden');  // Show error
            passwordMatch.classList.add('hidden');     // Hide success
        }
    });
</script>
