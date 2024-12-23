<tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($data as $m)
        <tr
            class="bg-white border dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-center bg-gray-100">
                <input type="checkbox" class="rounded-md"
                    name="user_id[]" value="{{ $m->nim }}">
            </td>
            <th scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $m->nim }}
            </th>
            <td class="px-6 py-4 bg-gray-100">
                {{ $m->nama }}
            </td>
            <td class="px-6 py-4">
                {{ $m->nama_dosen }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $m->jurusan }}
            </td>
            <td class="px-6 py-4">
                {{ $m->judul }}
            </td>
            <td class="px-6 py-4">
                {{ $m->id_penguji }}
            </td>
            <td class="px-6 py-4">
                {{ $m->tgl_sidang }}
            </td>
            <td class="px-6 py-4">
                {{ $m->pukul }}
            </td><td class="px-6 py-4">
                {{ $m->id_ruang }}
            </td>
        </tr>
    @endforeach
</tbody>

