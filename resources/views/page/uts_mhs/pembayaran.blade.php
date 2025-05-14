<x-app-layout>
    <x-slot name="header">
        <P class="font-bold text-white dark:text-gray-200 leading-tight text-md">
            {{ __('UTS') }}
        </P>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center">
                <div class="w-full md:w-full p-3">
                    <div id="no-data-message" class="bg-red-100 text-red-700 p-4 rounded-lg text-center">
                        MAAF SELESAIKAN PEMBAYARAN DULU YA
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
