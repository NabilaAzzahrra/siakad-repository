<tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($mahasiswa_lengkap as $m)
        <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-center bg-gray-100">
                <input type="checkbox" class="rounded-md" name="user_id[]" value="{{ $m->nim }}">
            </td>
            <td class="px-6 py-4 text-center bg-gray-100">
                {{ $loop->iteration }}
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $m->nim }}
            </th>
            <td class="px-6 py-4 bg-gray-100">
                {{ $m->nama }}
            </td>
            <td class="px-6 py-4">
                {{ $m->kelas }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $m->jurusan }}
            </td>
            <td class="px-6 py-4">
                {{ $m->tingkat }}
            </td>
            <td class="px-6 py-4 bg-gray-100">
                {{ $m->no_hp }}
            </td>
            <!-- <td class="px-6 py-4">
                <span class="{{ $m->status ? 'bg-green-500' : 'bg-red-500' }} p-2 text-white rounded-full">
                    {{ $m->status ? 'Can Access' : 'No Access' }}
                </span>
            </td> -->
            <td class="px-6 py-4">
                <span
                    class="{{ $m->keaktifan == 'aktif' ? 'bg-green-500' : ($m->keaktifan == 'cuti' ? 'bg-amber-500' : 'bg-red-500') }} p-2 text-white rounded-full">
                    {{ strtoupper($m->keaktifan) }}
                </span>
            </td>
        </tr>
    @endforeach

</tbody>
