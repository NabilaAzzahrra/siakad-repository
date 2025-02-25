<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="font-bold">Username</label>
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="font-bold">Password</label>
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <button type="button" id="togglePassword"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <svg id="eyeIcon" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a7 7 0 100 14 7 7 0 000-14zM2 10a8 8 0 0115.9-1.1 3.8 3.8 0 000 2.2A8 8 0 012 10zm4-1a6 6 0 018 0c-.7.8-1.5 1.5-2.3 2.2A6 6 0 016 9zm1.4 3.7A4.1 4.1 0 0010 14a4.1 4.1 0 002.6-.8A3.3 3.3 0 0010 11c-1.1 0-2 .6-2.6 1.7z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="ms-3 bg-white py-2 px-6 rounded-xl hover:bg-gray-400 font-bold hover:text-white">
                {{ __('LOG IN') }}
            </button>
        </div>
    </form>
</x-guest-layout>
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        // Toggle password visibility
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('fill', '#4A5568'); // Change icon color when visible
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('fill', 'currentColor'); // Revert icon color when hidden
        }
    });
</script>
