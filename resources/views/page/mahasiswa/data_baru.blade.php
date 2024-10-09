<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">Mahsiswa<i class="fi fi-rr-caret-right mt-1"></i> <span
                    class="text-red-500">Data Baru</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                                <div class="flex items-center justify-center">
                                    <div>MELENGKAPI DATA MAHASISWA</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="p-2 pt-6" style="width:100%;overflow-x:auto;">

                                    <div class="relative overflow-x-auto shadow-md rounded-lg">
                                        <table
                                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                                            <thead
                                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
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
                                                            NO HP
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                                        <div class="flex items-center">
                                                            STATUS
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <div class="flex items-center">

                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($mahasiswa as $m)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                                                        <td class="px-6 py-4">
                                                            {{ $m->no_hp }}
                                                        </td>
                                                        @php
                                                            switch ($m->keaktifan) {
                                                                case 'aktif':
                                                                    $keaktifan = 'AKTIF';
                                                                    $bg = 'bg-green-500';
                                                                    break;
                                                                case 'cuti':
                                                                    $keaktifan = 'CUTI';
                                                                    $bg = 'bg-amber-500';
                                                                    break;
                                                                default:
                                                                    $keaktifan = 'DO';
                                                                    $bg = 'bg-red-500';
                                                                    break;
                                                            }
                                                        @endphp
                                                        <td class="px-6 py-4 bg-gray-100">
                                                            <span
                                                                class="{{ $bg }} p-2 text-white rounded-full">{{ $keaktifan }}</span>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button type="button" data-id="{{ $m->id }}"
                                                                data-modal-target="sourceModal"
                                                                data-nim="{{ $m->nim }}"
                                                                data-id_kelas="{{ $m->id_kelas }}"
                                                                data-tingkat="{{ $m->tingkat }}"
                                                                data-status="{{ $m->status }}"
                                                                onclick="editSourceModal(this)"
                                                                class="bg-amber-500 hover:bg-amber-600 px-4 py-3 rounded-xl text-xs text-white">
                                                                <i class="fas fa-edit"></i>
                                                            </button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        {{ $mahasiswa->links() }}
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
        <div class="relative bg-white rounded-lg shadow mx-5 w-full md:w-1/2">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                    Tambah Sumber Database
                </h3>
                <button type="button" onclick="sourceModalClose()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form method="POST" id="formSourceModal">
                @csrf
                <div class="flex flex-col p-4 space-y-6">
                    <div class="flex flex-col lg:flex-row gap-5">
                        <div class="w-full">
                            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                            <input type="text" id="nim" name="nim"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Masukan NIM disini...">
                        </div>
                        <div class="w-full">
                            <label for="tingkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tingkat<span class="text-red-500">*</span>
                            </label>
                            <select class="js-example-placeholder-single js-states form-control w-" name="tingkat"
                                data-placeholder="Pilih Tingkat">
                                <option value="">Pilih...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-5">
                        <div class=" w-full">
                            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kelas <span class="text-red-500">*</span>
                            </label>
                            <select class="js-example-placeholder-single js-states form-control w-" name="kelas"
                                data-placeholder="Pilih Kelas" onchange="getkelas()">
                                <option value="">Pilih...</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" w-full">
                            <label for="jurusan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                            <input type="text" id="jurusan" name="jurusan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Masukan jurusan disini ..." readonly />
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" id="formSourceButton"
                        class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                    <button type="button" onclick="sourceModalClose()"
                        class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:bg-red-600">Batal</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const editSourceModal = (button) => {
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const nim = button.dataset.nim;
            const tingkat = button.dataset.tingkat;
            const kelas = button.dataset.kelas;
            const id_kelas = button.dataset.id_kelas;

            const modal = document.getElementById(modalTarget);
            const title = document.getElementById('title_source');
            const nimInput = document.getElementById('nim');

            document.querySelector('[name="tingkat"]').value = tingkat;

            document.querySelector('[name="kelas"]').value = id_kelas;
            let event = new Event('change');
            document.querySelector('[name="kelas"],[name="tingkat"]').dispatchEvent(event);

            const kelasSelect = document.querySelector('[name="kelas"]');
            const jurusanInput = document.getElementById('jurusan');
            const form = document.getElementById('formSourceModal');
            const formButton = document.getElementById('formSourceButton');

            let url = `{{ route('mahasiswa.update', ':id') }}`.replace(':id', id);
            form.setAttribute('action', url);

            form.querySelectorAll('input[type="hidden"]').forEach(el => el.remove());

            form.appendChild(createHiddenInput('_token', '{{ csrf_token() }}'));
            form.appendChild(createHiddenInput('_method', 'PATCH'));

            title.innerText = `Update Data Baru`;
            nimInput.value = nim;
            kelasSelect.value = button.dataset.id_kelas;
            getkelas();

            modal.classList.remove('hidden');
        }

        const sourceModalClose = () => {
            document.getElementById('sourceModal').classList.add('hidden');
        }

        const createHiddenInput = (name, value) => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            return input;
        }

        const getkelas = async () => {
            const selectedOption = document.querySelector('[name="kelas"] option:checked');
            const kelasId = selectedOption.value;

            if (kelasId) {
                try {
                    const response = await axios.get(`/api/kelas/${kelasId}`);
                    const data = response.data;
                    document.getElementById('jurusan').value = data.kelas?.jurusan?.jurusan || '';
                } catch (error) {
                    console.error(error);
                }
            } else {
                document.getElementById('jurusan').value = '';
            }
        }
    </script>
</x-app-layout>
