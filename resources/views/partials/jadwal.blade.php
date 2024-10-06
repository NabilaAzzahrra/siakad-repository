<tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($jadwal as $key => $j)
        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-center bg-gray-100">
                {{ $jadwal->perPage() * ($jadwal->currentPage() - 1) + $key + 1 }}
            </td>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div>
                    {{ $j->detail_kurikulum->materi_ajar->materi_ajar }}
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                {{ $j->dosen->nama_dosen }}
            </th>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div>
                    {{ $j->hari->hari }}
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                {{ $j->sesi->sesi }}
            </th>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div>
                    {{ $j->sesi->pukul->pukul }}
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                {{ $j->detail_kurikulum->materi_ajar->sks }}
            </th>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div>
                    {{ $j->ruang->ruang }}
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                {{ $j->kelas->kelas }}
            </th>
        </tr>
    @endforeach
</tbody>
