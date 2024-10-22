<tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($jadwal_reguler as $j)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-center bg-gray-100">
                {{ $no++ }}
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
                @php
                    $nilaiExist = $nilai->contains('id_jadwal', $j->kode_jadwal);
                @endphp

                @if ($nilaiExist)
                    <a href="{{ route('nilai.edit', $j->kode_jadwal) }}"
                        class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                        <i class="fa-solid fa-book"></i>
                    </a>
                @else
                    <a href="{{ route('nilai.show', $j->kode_jadwal) }}"
                        class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                        <i class="fa-solid fa-file"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
