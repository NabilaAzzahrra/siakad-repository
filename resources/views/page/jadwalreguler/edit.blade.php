<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight flex text-wrap text-md">
            <div class="flex items-center">Jadwal Materi Ajar<i class="fi fi-rr-caret-right mt-1"></i> <span class="text-red-500">Edit Jadwal Materi Ajar</span></div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full p-3">
                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="lg:p-6 p-2 text-sm lg:text-lg text-center lg:text-left bg-amber-300 rounded-xl font-bold">
                            FORM UPDATE JADWAL REGULER
                        </div>
                        <form action="{{ route('jadwal_reguler.update', $jadwal->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="p-4 rounded-xl">
                                <div class="flex flex-col lg:flex-row gap-5">
                                    <div class="flex gap-5 w-full">
                                        <div class="lg:mb-5 w-full">
                                            <label for="pukul"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Hari <span class="text-red-500">*</span>
                                            </label>
                                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="hari" data-placeholder="Pilih Hari">
                                                <option value="{{ $jadwal->id_hari }}">{{ $jadwal->hari->hari }}</option>
                                                @foreach ($hari as $k)
                                                    @if ($k->id != $jadwal->id_hari)
                                                        <option value="{{ $k->id }}" data-hari="{{ $k->id_hari }}">
                                                            {{ $k->hari }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="lg:mb-5 w-full">
                                            <label for="pukul"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Sesi <span class="text-red-500">*</span>
                                            </label>
                                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="sesi" data-placeholder="Pilih Sesi" onchange="getsesi()">
                                                <option value="{{ $jadwal->id_sesi }}">{{ $jadwal->sesi->sesi }}</option>
                                                @foreach ($sesi as $k)
                                                    @if ($k->id != $jadwal->id_sesi)
                                                        <option value="{{ $k->id }}" data-sesi="{{ $k->id_sesi }}">
                                                            {{ $k->sesi }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="lg:mb-5 w-full">
                                        <label for="pukul"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pukul</label>
                                        <input type="text" id="pukul" name="pukul"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Pukul disini ..."
                                            value="{{ $jadwal->sesi->pukul->pukul }}" readonly />
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="kurikulum"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                            Ajar <span class="text-red-500">*</span></label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="kurikulum" data-placeholder="Pilih Materi Ajar"
                                            onchange="getdetailkurikulum()">
                                            @foreach ($kurikulum as $c)
                                                <option value="{{ $c->id_materi_ajar }}"
                                                    {{ $c->id_materi_ajar == $jadwal->id_detail_kurikulum ? 'selected' : '' }}>
                                                    {{ $c->materi_ajar->materi_ajar }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="flex w-full gap-5">
                                        <div class="mb-5 w-full">
                                            <label for="semester"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                            <input type="text" id="semester" name="semester"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Semester disini ..."
                                                value="{{ $jadwal->detail_kurikulum->materi_ajar->semester->semester }}"
                                                readonly />
                                        </div>
                                        <div class="mb-5 w-full">
                                            <label for="sks"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                            <input type="text" id="sks" name="sks"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan SKS disini ..."
                                                value="{{ $jadwal->detail_kurikulum->materi_ajar->sks }}" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row gap-5">
                                    <div class="lg:mb-5 w-full">
                                        <label for="ruang"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Ruang <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="ruang" data-placeholder="Pilih Ruang">
                                            <option value="">Pilih...</option>
                                            @foreach ($ruang as $k)
                                                <option value="{{ $k->id }}"
                                                    {{ $k->id == $jadwal->id_ruang ? 'selected' : '' }}>
                                                    {{ $k->ruang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Dosen <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="dosen" data-placeholder="Pilih Dosen">
                                            <option value="">Pilih...</option>
                                            @foreach ($dosen as $k)
                                                <option value="{{ $k->id }}"
                                                    {{ $k->id == $jadwal->id_dosen ? 'selected' : '' }}>
                                                    {{ $k->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="kelas"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Kelas <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            name="kelas" data-placeholder="Pilih Kelas" onchange="getkelas()">
                                            <option value="">Pilih...</option>
                                            @foreach ($kelas as $k)
                                                {{-- <option value="{{ $k->id }}">{{ $k->kelas }}</option> --}}
                                                <option value="{{ $k->id }}"
                                                    {{ $k->id == $jadwal->id_kelas ? 'selected' : '' }}>
                                                    {{ $k->kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="jurusan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi</label>
                                        <input type="text" id="jurusan" name="jurusan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Program Studi disini ..." value="{{ $jadwal->kelas->jurusan->jurusan }}"
                                            readonly />
                                    </div>
                                </div>
                                <div hidden>
                                    <input type="text" name="id_tahun_akademik"
                                        value="{{ $konfigurasi->id_tahun_akademik }}">
                                    <input type="text" name="id_kurikulum"
                                        value="{{ $konfigurasi->id_kurikulum }}">
                                    <input type="text" name="id_keterangan"
                                        value="{{ $konfigurasi->id_keterangan }}">
                                    <input type="text" name="id_perhitungan"
                                        value="{{ $konfigurasi->id_perhitungan }}">
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fi fi-rr-disk "></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const getsesi = async () => {
        var selectedOption = document.querySelector('[name="sesi"] option:checked');
        var sesiId = selectedOption.value;

        if (sesiId) {
            await axios.get(`/api/pukul/${sesiId}`)
                .then((response) => {
                    console.log(response.data);
                    document.getElementById('pukul').value = response.data.pukul.pukul;
                })
                .catch((error) => {
                    console.log(error);
                });
        } else {
            document.getElementById('pukul').value = '';
        }
    };

    const getdetailkurikulum = async () => {
        var selectedOption = document.querySelector('[name="kurikulum"] option:checked');
        var kurikulumId = selectedOption.value;

        if (kurikulumId) {
            await axios.get(`/api/kurikulum_detail_det/${kurikulumId}`)
                .then((response) => {
                    const data = response.data;
                    if (data && data.kurikulum && data.kurikulum.materi_ajar) {
                        document.getElementById('semester').value = data.kurikulum.materi_ajar.semester
                            .semester;
                        document.getElementById('sks').value = data.kurikulum.materi_ajar.sks;
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        } else {
            document.getElementById('semester').value = '';
            document.getElementById('sks').value = '';
        }
    };

    const getkelas = async () => {
        var selectedOption = document.querySelector('[name="kelas"] option:checked');
        var jurusanId = selectedOption.value;

        if (jurusanId) {
            await axios.get(`/api/kelas/${jurusanId}`)
                .then((response) => {
                    const data = response.data;
                    if (data && data.kelas) {
                        document.getElementById('jurusan').value = data.kelas.jurusan.jurusan;
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        } else {
            document.getElementById('jurusan').value = '';
        }
    };
</script>
