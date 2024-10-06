<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex gap-5">
                    <div class="w-full">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div class="w-full">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-wrap">
                            {{ __("Update your account's profile information and username address.") }}
                        </p>
                        <div class="grid grid-cols-2 mt-6">
                            <div class="flex">
                                <div>icon</div>
                                <div>Nabila Azzahra</div>
                            </div>
                            <div class="flex">
                                <div>icon</div>
                                <div>202002084 (NIM)</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="flex">
                                <div>icon</div>
                                <div>Banjar</div>
                            </div>
                            <div class="flex">
                                <div>icon</div>
                                <div>09/Juni/2002</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="flex">
                                <div>icon</div>
                                <div>MI20A</div>
                            </div>
                            <div class="flex">
                                <div>icon</div>
                                <div>1</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="flex">
                                <div>icon</div>
                                <div>6281238313216</div>
                            </div>
                            <div class="flex">
                                <div>icon</div>
                                <div>2020</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="flex">
                                <div>icon</div>
                                <div>Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
