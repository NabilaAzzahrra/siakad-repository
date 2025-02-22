<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
            {{ __('Daftar Sidang Aplikasi Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    {{-- <form method="GET" action="{{ route('bimbinganMahasiswa.index') }}" class="flex gap-5 mb-4">
                        <div class="lg:mb-5 w-full">
                            <label for="tahun_angkatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tahun Angkatan
                            </label>
                            <select name="tahun_angkatan" class="js-example-placeholder-single js-states form-control w-full m-6">
                                <option value="">Pilih Tahun Angkatan</option>
                                @foreach ($tahun_angkatan as $k)
                                    <option value="{{ $k->tahun_angkatan }}"
                                        {{ request('tahun_angkatan') == $k->tahun_angkatan ? 'selected' : '' }}>
                                        {{ $k->tahun_angkatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="lg:mb-5 w-full">
                            <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jurusan
                            </label>
                            <select name="jurusan" class="js-example-placeholder-single js-states form-control w-full m-6">
                                <option value="">Pilih Jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ request('jurusan') == $j->id ? 'selected' : '' }}>
                                        {{ $j->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center mt-2">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                                Filter
                            </button>
                        </div>
                    </form> --}}

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="relative overflow-x-auto rounded-lg shadow-lg p-4">

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
                                                PEMBIMBING
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                JUDUL
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                TAHUN ANGKATAN
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            <div class="flex items-center">
                                                VERIFIKASI
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                            <div class="flex items-center">
                                                ACTION
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
                                                {{ $m->nama }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->jurusan }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->nama_dosen }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $m->judul }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $m->tahun_angkatan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $m->verifikasi }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                <button type="button" data-id="{{ $m->id }}"
                                                    data-modal-target="sourceModal"
                                                    data-verifikasi="{{ $m->verifikasi }}"
                                                    data-nim="{{ $m->nim }}" data-id_dosen="{{ $m->id_dosen }}"
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-xl h-10 w-10 text-xs text-white">
                                                    <i class="fi fi-sr-check-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $data->links() }}
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
                        VERIFIKASI DAFTAR SIDANG APLIKASI PROJECT
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-2">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="nim" name="nim" placeholder="Masukkan NIM" required>

                        <div>
                            <p>Verifikasi <span class="text-red-500">*</span></p>
                            <label>
                                <input type="radio" id="verifikasi-sudah" name="verifikasi" value="SUDAH">
                                SUDAH
                            </label>
                            <label class="ml-4">
                                <input type="radio" id="verifikasi-belum" name="verifikasi" value="BELUM">
                                BELUM
                            </label>
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

            // Atur nilai radio button untuk verifikasi
            if (verifikasi === 'SUDAH') {
                document.getElementById('verifikasi-sudah').checked = true;
            } else if (verifikasi === 'BELUM') {
                document.getElementById('verifikasi-belum').checked = true;
            }

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

        $(document).on('submit', '#formSourceModal', function(e) {
            e.preventDefault(); // Mencegah reload halaman otomatis

            // Ambil data dari form
            const formData = {
                nim: $('#nim').val(),
                id: $('#id').val(),
                verifikasi: $('input[name="verifikasi"]:checked').val(), // Ambil nilai yang dipilih
                id_dosen: $('#id_dosen').val(),
                _token: $('input[name="_token"]').val(), // Ambil CSRF token
                _method: 'PATCH' // Menambahkan _method untuk PATCH
            };

            // Kirim data via AJAX
            $.ajax({
                url: `/update-daftar-sidang/${formData.id}`, // Endpoint sesuai rute Laravel
                method: 'POST', // Gunakan POST dengan _method untuk PATCH
                data: formData,
                success: function(response) {
                    alert(response.message || 'Data berhasil diperbarui.');
                    sourceModalClose(); // Menutup modal
                    location.reload();
                },
                error: function(xhr) {
                    // Tangani error validasi atau server
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

        const toggle = document.getElementById('toggle');
        const statusText = document.getElementById('status');

        toggle.addEventListener('change', function() {
            if (toggle.checked) {
                statusText.textContent = 'Belum'; // Teks berubah ke 'Belum' saat checked
            } else {
                statusText.textContent = 'Sudah'; // Teks berubah ke 'Sudah' saat unchecked
            }
        });
    </script>
</x-app-layout>
