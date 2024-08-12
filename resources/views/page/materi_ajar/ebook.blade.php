<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('E-Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-5/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="text-xl font-extrabold mb-5">DATA MATERI AJAR</div>
                            <div class="flex mb-2">
                                <p>Materi Ajar :</p>
                                <p class="pl-2 font-bold">{{$materi_ajar->materi_ajar}}</p>
                            </div>
                            <div class="flex mb-5">
                                <p>SKS / Semester :</p>
                                <p class="pl-2 font-bold">{{$materi_ajar->sks}} / {{$materi_ajar->semester}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-7/12 p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg h-full">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <iframe src="{{ url('uploads/' . $materi_ajar->ebook) }}" class="w-full h-[639px]" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
