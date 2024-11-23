<tbody id="DosenTable">
    @foreach ($dosen as $m)
    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
        <td class="px-6 py-4 text-center bg-gray-100">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ $m->nama_dosen }}</td>
        <td class="px-6 py-4 bg-gray-100">{{ $m->email }}</td>
        <td class="px-6 py-4">{{ $m->no_hp }}</td>
        <td class="px-6 py-4 bg-gray-100">
            <a href="{{ route('report_dosen.show', $m->id) }}" class="mr-2 bg-green-500 hover:bg-green-600 px-4 py-3 rounded-xl text-xs text-white">
                <i class="fa-solid fa-file"></i>
            </a>
        </td>
    </tr>
    @endforeach
</tbody>
