<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('formatif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full p-3">
                    <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <iframe src="{{ url('formatif/jawaban/' . $formatif->jawaban) }}" class="w-full h-[639px]"
                            frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>