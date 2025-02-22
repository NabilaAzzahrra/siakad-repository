<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Verifikasi Pembimbing</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-9/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div
                                class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                DATA MAHASISWA
                            </div>
                            <div class="flex justify-center">
                                <div class="p-12" style="width:100%;  overflow-x:auto;">
                                    <table class="table table-bordered" id="verifikasi-datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-7">No.</th>
                                                <th>VERIFIKASI</th>
                                                <th>FILE</th>
                                                <th>NIM</th>
                                                <th>NAMA</th>
                                                <th>JUDUL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $d)
                                                @php
                                                    if ($d->verifikasi_penguji == 'BELUM') {
                                                        $val = 'BELUM';
                                                        $bg = 'bg-red-300';
                                                        $dis = '';
                                                    } else {
                                                        $val = 'SUDAH';
                                                        $bg = 'bg-emerald-300';
                                                        $dis = 'disabled';
                                                    }

                                                @endphp
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><button type="button"
                                                            onclick="confirmVerification({{ $d->id }})"
                                                            class="{{ $bg }} px-2 text-sm rounded-xl font-bold"
                                                            {{ $dis }}>{{ $val }}</button>
                                                    </td>
                                                    <td><a href="{{ url('revisi/' . $d->file) }}"
                                                            target="_blank">Lihat</a></td>
                                                    <td>{{ $d->nim }}</td>
                                                    <td>{{ $d->mahasiswa->nama }}</td>
                                                    <td>{{ $d->appProj->judul }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#verifikasi-datatable').DataTable(); // Inisialisasi sederhana
        });
    </script>
    <script>
        function confirmVerification(id) {
            if (confirm("Apakah Anda yakin ingin melakukan verifikasi?")) {
                fetch("{{ route('verifikasiPenguji.update', ':id') }}".replace(':id', id), {
                        method: 'PUT', // atau 'POST' tergantung definisi route Anda
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                        },
                        body: JSON.stringify({}) // Data kosong karena tidak ada input tambahan
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Parse response sebagai JSON
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message); // Tampilkan pesan sukses
                            if (data.redirect) {
                                window.location.href = data.redirect; // Redirect ke halaman sebelumnya
                            }
                        } else {
                            alert(data.message); // Tampilkan pesan error
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memproses permintaan.');
                    });
            }
        }
    </script>
</x-app-layout>
