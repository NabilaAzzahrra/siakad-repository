<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Pengajuan Judul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>PENGAJUAN JUDUL</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-2" style="width:100%;overflow-x:auto;">
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">

                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        NIM
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            NAMA
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            JURUSAN
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            DOSEN
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            VERIFIKASI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            DETAIL
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="mahasiswaTable">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $m)
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <td class="px-6 py-4 text-center bg-gray-100">
                                                            {{ $no++ }}
                                                        </td>
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->nim }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->mahasiswa->nama }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->mahasiswa->kelas->jurusan->jurusan }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->pembimbingProjek->dosen->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->verifikasi }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{-- <a href="{{ route('pengajuanJudul.show', $m->id) }}"
                                                                class="mr-2 bg-green-500 hover:bg-green-600 pr-3 pl-4 py-3 rounded-xl text-xs text-white">
                                                                <i class="fi fi-sr-check-circle"></i>
                                                            </a> --}}
                                                            <button type="button" data-id="{{ $m->id }}"
                                                                data-modal-target="sourceModal"
                                                                data-verifikasi="{{ $m->verifikasi }}"
                                                                data-nim="{{ $m->nim }}"
                                                                data-id_dosen="{{ $m->id_dosen }}"
                                                                onclick="editSourceModal(this)"
                                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                                <i class="fi fi-sr-check-circle"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="mt-4">
                                        {{-- {{ $mahasiswa_lengkap->links() }} --}}
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
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <input type="hidden" id="id" name="id">
                        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
                        <input type="text" id="verifikasi" name="verifikasi" placeholder="Masukkan Verifikasi"
                            required>

                        <div class="flex justify-center">
                            <span class="text-sm text-slate-500 mr-2">Light</span>
                            <input type="checkbox" id="toggle" class="hidden">
                            <label for="toggle">
                                <div class="w-9 h-5 bg-slate-500 rounded-full flex items-center p-1 cursor-pointer">
                                    <div class="w-4 h-4 bg-white rounded-full toggle-circle"></div>
                                </div>
                            </label>
                            <span class="text-sm text-slate-500 ml-2">Darks</span>
                        </div>

                        <div id="judul-container">
                            <!-- Tempat untuk menampilkan data judul -->
                        </div>

                        <div class="">
                            <label for="id_dosen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing
                                <span class="text-red-500">*</span></label>
                            <select class="js-example-placeholder-single js-states form-control w-[930px] m-6"
                                id="id_dosen" name="id_dosen" data-placeholder="Pilih Dosen">
                                <option value="">Pilih...</option>
                                @foreach ($dosen as $p)
                                    <option value="{{ $p->id }}">{{ $p->dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">
                            Simpan
                        </button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editSourceModal(button) {
            // Ambil data dari tombol
            const id = button.getAttribute('data-id');
            const nim = button.getAttribute('data-nim');
            const verifikasi = button.getAttribute('data-verifikasi');
            const id_dosen = button.getAttribute('data-id_dosen');

            // Isi nilai input di dalam modal
            document.getElementById('id').value = id;
            document.getElementById('nim').value = nim;
            document.getElementById('verifikasi').value = verifikasi;

            // Perbarui nilai dropdown menggunakan Select2
            const selectElement = document.querySelector('[name="id_dosen"]');
            $(selectElement).val(id_dosen).trigger('change');

            // Tampilkan modal
            document.getElementById('sourceModal').classList.remove('hidden');

            // Trigger AJAX untuk mengambil judul terkait
            fetchJudul(nim);
        }

        function sourceModalClose(button) {
            const modal = button.getAttribute('data-modal-target');
            document.getElementById(modal).classList.add('hidden');
        }

        function fetchJudul(nim) {
            if (!nim) return;

            $.ajax({
                url: '/get-pengajuan-judul', // Ubah sesuai route Anda
                method: 'GET',
                data: {
                    nim: nim
                },
                success: function(response) {
                    const container = $('#judul-container');
                    container.empty(); // Bersihkan kontainer

                    if (response.length > 0) {
                        response.forEach(item => {
                            container.append('<p>' + item.judul + '</p>');
                        });
                    } else {
                        container.append('<p>Tidak ada data ditemukan</p>');
                    }
                },
                error: function(xhr) {
                    console.error('Error saat mengambil data judul:', xhr.responseText);
                }
            });
        }

        $(document).on('submit', '#formSourceModal', function(e) {
            e.preventDefault(); // Mencegah reload halaman otomatis

            const formData = {
                nim: $('#nim').val(),
                id: $('#id').val(),
                verifikasi: $('#verifikasi').val(),
                id_dosen: $('#id_dosen').val(),
                _token: $('input[name="_token"]').val(), // Ambil CSRF token
                _method: 'PATCH' // Menambahkan _method untuk mengeksekusi PATCH
            };

            $.ajax({
                url: `/update-pengajuan-judul/${formData.id}`,
                method: 'POST', // Gunakan POST dengan _method untuk PATCH
                data: formData,
                success: function(response) {
                    alert(response.message || 'Data berhasil diperbarui.');
                    sourceModalClose(); // Menutup modal
                    location.reload(); // Reload halaman setelah berhasil update
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errorMessage = 'Terjadi kesalahan:\n';
                        Object.entries(xhr.responseJSON.errors).forEach(([key, value]) => {
                            errorMessage += `- ${value}\n`;
                        });
                        alert(errorMessage);
                    } else {
                        alert('Terjadi kesalahan pada server.');
                    }
                },
            });
        });

        function sourceModalClose() {
            // Menutup modal dengan mengubah kelas 'hidden' dan menghapus inputan
            $('#sourceModal').addClass('hidden');
            $('#formSourceModal')[0].reset(); // Reset form inputan
        }
    </script>

</x-app-layout>
