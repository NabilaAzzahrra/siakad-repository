<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pukul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">

                    <div class="bg-emerald-100 p-4 w-6/12 border border-emerald-400 rounded-xl border-2">
                        <div class="text-xl flex items-center gap-3 font-extrabold text-emerald-800"><i
                                class="fi fi-ss-to-do"></i> Formatif</div>
                        <div class="text-wrap p-4 text-emerald-800 font-bold">Formatif merupakan standar untuk mengukur
                            kemamuan atau skil peserta didik selama mengikuti
                            setengah semester, untuk formatif dapat di inputkan pada fitur berikut ini.</div>
                        @foreach ($presensi as $pr)
                        @endforeach
                        <div class="flex items-center justify-end ">
                            <a href="{{ route('jadwal_reguler.formatif', $pr->id_jadwal) }}"
                                class="bg-emerald-300 p-2 font-bold border border-green-400 border-[3px] rounded-3xl text-emerald-800 hover:bg-emerald-500 hover:text-white">Formatif</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-10 mt-5">
                        @php
                            $color = '';
                            $tgl_presensi = '';
                            $materi = '';
                        @endphp
                        @foreach ($presensi as $p)
                            @php
                                if ($p->pertemuan % 2 == 1) {
                                    $color = 'bg-[#F15C67]';
                                    $border = 'border-[#F15C67]';
                                } else {
                                    $color = 'bg-[#00AEB6]';
                                    $border = 'border-[#00AEB6]';
                                }

                                if ($p->tgl_pertemuan === null) {
                                    $tgl_presensi =
                                        '<i class="fi fi-sr-cross-circle flex items-center text-red-500"></i>';
                                } else {
                                    $tgl_presensi =
                                        '<i class="fi fi-sr-check-circle flex items-center text-green-500"></i>';
                                }

                                if ($p->file_materi === null) {
                                    $file_materi =
                                        '<i class="fi fi-sr-cross-circle flex items-center text-red-500"></i>';
                                } else {
                                    $file_materi =
                                        '<i class="fi fi-sr-check-circle flex items-center text-green-500"></i>';
                                }
                            @endphp
                            <div
                                class="{{ $color }} border border-4 {{ $border }} px-2 rounded-3xl h-64 relative">
                                <div
                                    class="h-14 w-14 text-xl font-extrabold bg-white absolute top-0 left-0 mt-3 ml-5 flex items-center justify-center rounded-full border border-4 {{ $border }}">
                                    {{ $p->pertemuan }}
                                </div>
                                <div
                                    class="bg-white border border-4 {{ $border }} mt-10 rounded-3xl h-[198px] flex pt-8 justify-start pl-4">
                                    <div>
                                        <div class="font-bold text-left text-[20px]">Pertemuan {{ $p->pertemuan }}</div>
                                        <div class="font-bold text-left text-[12px] text-sky-800">
                                            @if ($p->tgl_presensi === null)
                                                <div class="bg-red-100 w-44 text-red-500 rounded-full px-2">Belum
                                                    Menginputkan Presensi</div>
                                            @else
                                                {{ date('d-m-Y', strtotime($p->tgl_presensi)) }}
                                            @endif
                                        </div>
                                        <div class="mt-1">
                                            <div class="flex">
                                                <div class="pr-2 font-bold">Materi</div>
                                                <div class="text-wrap text-sky-700 text-justify px-2">
                                                    @php
                                                        $text = "$p->materi";
                                                        $materi =
                                                            strlen($text) > 45 ? substr($text, 0, 30) . '...' : $text;
                                                    @endphp
                                                    @if ($materi == null)
                                                        <div class="text-red-500">Belum Terdapat materi</div>
                                                    @else
                                                        {{ $materi }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex gap-4 mt-3">
                                            <a href="{{route('presensi.show', $p->id_presensi)}}"
                                                class="border border-gray-300 px-2 py-1 text-xs rounded-full font-extrabold flex items-center justify-center">
                                                <i class="fi fi-sr-member-list text-sky-700 pr-1 flex items-center"></i>
                                                <span class="pr-1 flex items-center">Presensi</span>
                                                {!! $tgl_presensi !!}
                                            </a>
                                            <a href="#"
                                                class="border border-gray-300 px-2 py-1 text-xs rounded-full font-extrabold flex items-center justify-center">
                                                <i
                                                    class="fi fi-ss-book-open-cover text-green-500 pr-1 flex items-center"></i>
                                                <span class="pr-1 flex items-center">File Materi</span>
                                                {!! $file_materi !!}
                                            </a>
                                            <a href="#"
                                                class="border border-gray-300 px-2 py-1 text-xs rounded-full font-extrabold flex items-center justify-center ">
                                                <i class="fi fi-sr-web-test text-amber-500 pr-1 flex items-center"></i>
                                                <span class="pr-1 flex items-center">Tugas</span>
                                                {!! $tgl_presensi !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
