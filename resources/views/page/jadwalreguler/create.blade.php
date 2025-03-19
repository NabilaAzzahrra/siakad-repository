<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold lg:text-xl text-gray-800 dark:text-gray-200 leading-tight text-md">
        <div class="flex items-center font-bold">Jadwal Pembelajaran<i class="fi fi-rr-caret-right mt-1"></i> <span
                class="text-amber-100">Tambah Jadwal Pembelajaran</span></div>
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div
                    class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-200 rounded-3xl">
                    <div class="flex px-12 pt-8">
                        <div class="w-10">
                            <img src="{{ url('img/cells.png') }}" alt="Icon 1" class="">
                        </div>
                        <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                            DATA JADWAL PEMBELAJARAN
                        </div>
                    </div>
                    <hr class="border mt-2 border-black border-opacity-30 mx-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('jadwal_reguler.store') }}" method="post" id="jadwalForm">
                            @csrf
                            <div class="p-4 rounded-xl">
                                <input type="hidden" value="{{ $konfigurasi->jml_pertemuan }}" name="jml_pertemuan">
                                <div class="flex flex-col lg:flex-row gap-5">
                                    <div class="flex w-full gap-5">
                                        <div class="lg:mb-5 w-full">
                                            <label for="hari"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Hari <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="hari" name="hari" data-placeholder="Pilih Hari">
                                                <option value="">Pilih...</option>
                                                @foreach ($hari as $k)
                                                    <option value="{{ $k->id }}">{{ $k->hari }}</option>
                                                @endforeach
                                            </select>
                                            <p id="error-hari" class="mt-2 text-sm text-red-500 hidden">Hari wajib
                                                diisi.</p>
                                        </div>
                                        <div class="lg:mb-5 w-full">
                                            <label for="pukul"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Sesi <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="sesi" name="sesi" data-placeholder="Pilih Sesi"
                                                onchange="getsesi()">
                                                <option value="">Pilih...</option>
                                                @foreach ($sesi as $k)
                                                    <option value="{{ $k->id }}">{{ $k->sesi }}</option>
                                                @endforeach
                                            </select>
                                            <p id="error-sesi" class="mt-2 text-sm text-red-500 hidden">Sesi wajib
                                                diisi.</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-5 w-full">
                                        <div class="lg:mb-5 w-full">
                                            <label for="pukul"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pukul</label>
                                            <input type="text" id="pukul" name="pukul"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Pukul disini ..." value="{{ old('pukul') }}"
                                                readonly />
                                            <p id="error-pukul" class="mt-2 text-sm text-red-500 hidden">Pukul wajib
                                                diisi.</p>
                                        </div>
                                        <div class="lg:mb-5 w-full">
                                            <label for="sesi_dua"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Sesi
                                            </label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                name="sesi_dua" data-placeholder="Pilih Sesi" onchange="getsesiDua()">
                                                <option value="">Pilih...</option>
                                                @foreach ($sesi as $k)
                                                    <option value="{{ $k->id }}">{{ $k->sesi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex gap-5 w-full">
                                        <div class="lg:mb-5 w-full">
                                            <label for="pukul_dua"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pukul</label>
                                            <input type="text" id="pukul_dua" name="pukul_dua"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Pukul disini ..." value="{{ old('pukul') }}"
                                                readonly />
                                        </div>
                                        <div class="lg:mb-5 w-full">
                                            <label for="kurikulum"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi
                                                Ajar <span class="text-red-500">*</span></label>
                                            <select
                                                class="js-example-placeholder-single js-states form-control w-full m-6"
                                                id="kurikulum" name="kurikulum" data-placeholder="Pilih Materi Ajar"
                                                onchange="getdetailkurikulum()">
                                                <option value="">Pilih...</option>
                                                @foreach ($kurikulum as $k)
                                                    <option value="{{ $k->id_materi_ajar }}">
                                                        {{ $k->materi_ajar->materi_ajar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p id="error-kurikulum" class="mt-2 text-sm text-red-500 hidden">Materi
                                                wajib
                                                diisi.</p>
                                        </div>
                                    </div>

                                    <div class="flex w-full mb-5 lg:mb-0 gap-5">
                                        <div class="lg:mb-5 w-full">
                                            <label for="semester"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                            <input type="text" id="semester" name="semester"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan Semester disini ..."
                                                value="{{ old('semester') }}" readonly />
                                            <p id="error-semester" class="mt-2 text-sm text-red-500 hidden">Semester
                                                wajib
                                                diisi.</p>
                                        </div>
                                        <div class="lg:mb-5 w-full">
                                            <label for="sks"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                            <input type="text" id="sks" name="sks"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukan SKS disini ..." value="{{ old('sks') }}"
                                                readonly />
                                            <p id="error-sks" class="mt-2 text-sm text-red-500 hidden">Sks wajib
                                                diisi.</p>
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
                                            id="ruang" name="ruang" data-placeholder="Pilih Ruang">
                                            <option value="">Pilih...</option>
                                            @foreach ($ruang as $k)
                                                <option value="{{ $k->id }}">{{ $k->ruang }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-ruang" class="mt-2 text-sm text-red-500 hidden">Ruang wajib
                                            diisi.</p>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="dosen"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Dosen <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            id="dosen" name="dosen" data-placeholder="Pilih Dosen">
                                            <option value="">Pilih...</option>
                                            @foreach ($dosen as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama_dosen }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-dosen" class="mt-2 text-sm text-red-500 hidden">Dosen wajib
                                            diisi.</p>
                                    </div>
                                    <div class="lg:mb-5 w-full">
                                        <label for="kelas"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Kelas <span class="text-red-500">*</span>
                                        </label>
                                        <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                            id="kelas" name="kelas" data-placeholder="Pilih Kelas"
                                            onchange="getkelas()">
                                            <option value="">Pilih...</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                            @endforeach
                                        </select>
                                        <p id="error-kelas" class="mt-2 text-sm text-red-500 hidden">Kelas wajib
                                            diisi.</p>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="jurusan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                                            Studi</label>
                                        <input type="text" id="jurusan" name="jurusan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Program Studi disini ..."
                                            value="{{ old('jurusan') }}" readonly />
                                        <p id="error-jurusan" class="mt-2 text-sm text-red-500 hidden">Jurusan wajib
                                            diisi.</p>
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
                                    class="text-blue-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm border border-dashed border-blue-700 w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                        class="fi fi-rr-disk mr-2"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const form = document.getElementById('jadwalForm');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form dikirim

        let isValid = true;

        // Validasi Mata Kuliah
        const hari = document.getElementById('hari');
        const errorHari = document.getElementById('error-hari');
        if (hari.value === '') {
            errorHari.classList.remove('hidden');
            isValid = false;
        } else {
            errorHari.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const sesi = document.getElementById('sesi');
        const errorSesi = document.getElementById('error-sesi');
        if (sesi.value === '') {
            errorSesi.classList.remove('hidden');
            isValid = false;
        } else {
            errorSesi.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const pukul = document.getElementById('pukul');
        const errorPukul = document.getElementById('error-pukul');
        if (pukul.value === '') {
            errorPukul.classList.remove('hidden');
            isValid = false;
        } else {
            errorPukul.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const kurikulum = document.getElementById('kurikulum');
        const errorKurikulum = document.getElementById('error-kurikulum');
        if (kurikulum.value === '') {
            errorKurikulum.classList.remove('hidden');
            isValid = false;
        } else {
            errorKurikulum.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const semester = document.getElementById('semester');
        const errorSemester = document.getElementById('error-semester');
        if (semester.value === '') {
            errorSemester.classList.remove('hidden');
            isValid = false;
        } else {
            errorSemester.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const sks = document.getElementById('sks');
        const errorSks = document.getElementById('error-sks');
        if (sks.value === '') {
            errorSks.classList.remove('hidden');
            isValid = false;
        } else {
            errorSks.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const ruang = document.getElementById('ruang');
        const errorRuang = document.getElementById('error-ruang');
        if (ruang.value === '') {
            errorRuang.classList.remove('hidden');
            isValid = false;
        } else {
            errorRuang.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const dosen = document.getElementById('dosen');
        const errorDosen = document.getElementById('error-dosen');
        if (dosen.value === '') {
            errorDosen.classList.remove('hidden');
            isValid = false;
        } else {
            errorDosen.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const kelas = document.getElementById('kelas');
        const errorKelas = document.getElementById('error-kelas');
        if (kelas.value === '') {
            errorKelas.classList.remove('hidden');
            isValid = false;
        } else {
            errorKelas.classList.add('hidden');
        }

        // Validasi Mata Kuliah
        const jurusan = document.getElementById('jurusan');
        const errorJurusan = document.getElementById('error-jurusan');
        if (jurusan.value === '') {
            errorJurusan.classList.remove('hidden');
            isValid = false;
        } else {
            errorJurusan.classList.add('hidden');
        }

        // Jika validasi lolos, kirim form
        if (isValid) {
            form.submit();
        }
    });

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

    const getsesiDua = async () => {
        var selectedOption = document.querySelector('[name="sesi_dua"] option:checked');
        var sesiId = selectedOption.value;

        if (sesiId) {
            await axios.get(`/api/pukul/${sesiId}`)
                .then((response) => {
                    console.log(response.data);
                    document.getElementById('pukul_dua').value = response.data.pukul.pukul;
                })
                .catch((error) => {
                    console.log(error);
                });
        } else {
            document.getElementById('pukul_dua').value = '';
        }
    };

    const getdetailkurikulum = async () => {
        var selectedOption = document.querySelector('[name="kurikulum"] option:checked');
        var kurikulumId = selectedOption.value;

        if (kurikulumId) {
            await axios.get(`/api/kurikulum_matkul/${kurikulumId}`)
                .then((response) => {
                    console.log(response.data.kurikulum.semester.semester);
                    const data = response.data;
                    if (data && data.kurikulum.semester) {
                        document.getElementById('semester').value = response.data.kurikulum.semester
                            .semester;
                        document.getElementById('sks').value = response.data.kurikulum.sks;
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
