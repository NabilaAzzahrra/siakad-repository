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
                        DETAIL PENGAJUAN JUDUL DAN PEMBIMBING PROJECT
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
                        {{-- <input type="text" id="verifikasi" name="verifikasi" placeholder="Masukkan Verifikasi" required> --}}

                        <div>
                            <table>
                                <tr>
                                    <td class="pl-2 pr-2"><i class="fi fi-sr-student"></i></td>
                                    <td>Nama</td>
                                    <td class="pl-4 pr-4">:</td>
                                    <td>{{ $m->mahasiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="pl-2 pr-2"><i class="fi fi-sr-id-card-clip-alt"></i></td>
                                    <td>Nim</td>
                                    <td class="pl-4 pr-4">:</td>
                                    <td>{{ $m->nim }}</td>
                                </tr>
                                <tr>
                                    <td class="pl-2 pr-2"><i class="fi fi-ss-customer-service"></i></td>
                                    <td>Jurusan</td>
                                    <td class="pl-4 pr-4">:</td>
                                    <td>{{ $m->mahasiswa->kelas->jurusan->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td class="pl-2 pr-2"><i class="fi fi-sr-chalkboard-user"></i></td>
                                    <td>Pembimbing</td>
                                    <td class="pl-4 pr-4">:</td>
                                    <td>{{ $m->pembimbingProjek->dosen->nama_dosen }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="flex items-center">
                            <i class="fi fi-ss-rectangle-list mt-1 mr-2"></i>
                            <p>Judul yang di ajukan</p>
                        </div>
                        <div id="judul-container">
                            <!-- Tempat untuk menampilkan data judul -->
                        </div>

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
                            container.append(
                                '<p class="font-bold text-wrap bg-amber-50 mb-2 rounded-xl p-4">' +
                                item.judul +
                                ' ' + // Menambahkan spasi antara judul dan status verifikasi
                                (item.verifikasi == "SUDAH" ?
                                    '<img src="/img/check.png" alt="verifikasi sukses" width="20" height="20" style="display: inline-block; margin-left: 8px;" />' :
                                    '<img src="/img/delete.png" alt="verifikasi gagal" width="20" height="20" style="display: inline-block; margin-left: 8px;" />'
                                ) +
                                '</p>'
                            );
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
                url: `/update-pengajuan-judul/${formData.id}`, // Endpoint sesuai rute Laravel
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
    </script>
    <script>
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
