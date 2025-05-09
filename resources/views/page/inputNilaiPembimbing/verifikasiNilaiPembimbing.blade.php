<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('Nilai Pembimbing') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">

                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    NILAI PEMBIMBING
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30">
                            <div class="flex justify-center mt-2">
                                <div class="p-2" style="width:100%;overflow-x:auto;">
                                    <div class="relative overflow-x-auto rounded-lg shadow-lg">

                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
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
                                                            PEMBIMBING
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            PROGRAM STUDI
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            JUDUL
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            SIKAP
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            INTENSITAS KESUNGGUHAN
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            KEDALAMAN MATERI
                                                        </div>
                                                    </th>
                                                    {{-- <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">
                                                            ACTION
                                                        </div>
                                                    </th> --}}
                                                </tr>
                                            </thead>
                                            <tbody id="mahasiswaTable">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $m)
                                                    @php
                                                        if ($m->verifikasi == 'BELUM') {
                                                            $val = 'BELUM';
                                                            $bg = 'bg-red-300';
                                                            $dis = '';
                                                        } else {
                                                            $val = 'SUDAH';
                                                            $bg = 'bg-emerald-300';
                                                            $dis = 'disabled';
                                                        }

                                                    @endphp
                                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $m->nim }}
                                                        </th>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->mahasiswa->nama }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->dosen->nama_dosen }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->mahasiswa->kelas->jurusan->jurusan }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->appProj->judul }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->sikap }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ $m->intensitas_kesungguhan }}
                                                        </td>
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            {{ $m->kedalaman_materi }}
                                                        </td>
                                                        {{-- <td class="px-6 py-4">
                                                            <form
                                                                action="{{ route('inputNilaiPembimbing.update', $m->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit">{{ $val }}</button>
                                                            </form>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="mt-4">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmVerification(id) {
            if (confirm("Apakah Anda yakin ingin melakukan verifikasi?")) {
                fetch("{{ route('inputNilaiPembimbing.update', ':id') }}".replace(':id', id), {
                        method: 'PUT', // atau 'POST' tergantung definisi route Anda
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                        },
                        body: JSON.stringify({}) // Data kosong karena tidak ada input tambahan
                    })
                    .then(response => {
                        console.log(response);

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
