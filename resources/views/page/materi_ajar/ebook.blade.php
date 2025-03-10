<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center">E-Book</div>
        </p>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-5/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden border border-gray-100 shadow-xl rounded-3xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class="w-10">
                                    <img src="{{ url('img/database.png') }}" alt="Icon 1" class="">
                                </div>
                                <div class="lg:p-2 p-2 text-sm lg:text-lg text-left lg:text-left rounded-xl font-bold">
                                    MATERI AJAR
                                </div>
                            </div>
                            <hr class="border mt-2 border-black border-opacity-30 mb-5">
                            <table>
                                <tr>
                                    <th class="text-left">Materi Ajar</th>
                                    <td class="pl-2 pr-2">:</td>
                                    <td>{{ $materi_ajar->materi_ajar }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">SKS</th>
                                    <td class="pl-2 pr-2">:</td>
                                    <td>{{ $materi_ajar->sks }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Semester</th>
                                    <td class="pl-2 pr-2">:</td>
                                    <td>{{ $materi_ajar->semester }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Program Studi</th>
                                    <td class="pl-2 pr-2">:</td>
                                    <td>{{ $materi_ajar->jurusan->jurusan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-7/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-xl border border-gray-100 rounded-3xl h-full">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <iframe src="{{ url('uploads/' . $materi_ajar->ebook) }}" class="w-full h-[1440px]"
                                frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
