<tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($jadwal_reguler as $key => $j)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-center bg-gray-100">
                {{ $jadwal_reguler->perPage() * ($jadwal_reguler->currentPage() - 1) + $key + 1 }}
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $j->materi_ajar }}
            </th>
            <td class="px-6 py-4 bg-gray-100">
                {{ $j->nama_dosen }}
            </td>
            <td class="px-6 py-4">
                {{ $j->hari }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $j->sesi }}
            </td>
            <td class="px-6 py-4">
                {{ $j->pukul }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $j->semester }}
            </td>
            <td class="px-6 py-4">
                {{ $j->sks }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $j->ruang }}
            </td>
            <td class="px-6 py-4">
                {{ $j->kelas }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $j->jurusan }}
            </td>
            <td class="px-6 py-4 text-right">
                <a href="{{ route('jadwal_reguler.show', $j->kode_jadwal) }}"
                    class="mr-2 bg-green-500 hover:bg-green-600 pr-3 pl-4 py-3 rounded-xl text-xs text-white">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="{{ route('jadwal_reguler.edit', $j->id_jadwal) }}"
                    class="mr-2 bg-amber-500 hover:bg-amber-600 pr-3 pl-4 py-3 rounded-xl text-xs text-white">
                    <i class="fa-solid fa-edit"></i>
                </a>
                <a onclick="return jadwalDelete('{{ $j->kode_jadwal }}', '{{ $j->materi_ajar }}')"
                    class="bg-red-500 hover:bg-red-300 pr-4 pl-4 py-3 rounded-xl text-xs text-white">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
</tbody>
