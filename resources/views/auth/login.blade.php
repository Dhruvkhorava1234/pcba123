<x-guest-layout>
    <div class="mb-6 text-center">
        <span class="inline-block px-3 py-1 text-xs font-semibold uppercase tracking-wider text-orange-700 bg-orange-50 border border-orange-200 rounded-full mb-2">
            PCBA Member Portal
        </span>
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Member Sign In</h1>
        <p class="text-xs text-slate-500 mt-1">Access Pipavav Customs Brokers Association member dashboard</p>
    </div>

    <!-- Quick Demo Credentials Banner -->
    <div class="mb-5 p-3.5 rounded-xl bg-orange-50/80 border border-orange-200/90 text-slate-800 text-xs">
        <div class="flex items-center justify-between mb-2">
            <span class="font-bold text-orange-800 flex items-center gap-1.5">
                <i class="bi bi-key-fill text-orange-600"></i> Dummy Member Login Credentials
            </span>
            <button type="button" onclick="fillDemoCredentials()" class="text-[11px] font-bold text-orange-700 hover:text-orange-900 underline cursor-pointer">
                Auto-fill
            </button>
        </div>
        <div class="space-y-1 font-mono text-[11px] text-slate-600">
            <div><strong>Email:</strong> <span class="select-all text-slate-900">member@pcbapipavav.org</span></div>
            <div><strong>Password:</strong> <span class="select-all text-slate-900">password123</span></div>
        </div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Member Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', 'member@pcbapipavav.org')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            value="password123"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#f25c3b] shadow-sm focus:ring-[#f25c3b]" name="remember" checked>
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6 flex flex-col gap-3">
            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3 bg-[#f25c3b] hover:bg-[#d94828] active:bg-[#c2410c] text-white font-bold rounded-lg shadow-md hover:shadow-lg transition duration-150 tracking-wide text-sm">
                <i class="bi bi-box-arrow-in-right me-2"></i> {{ __('Log in to Member Portal') }}
            </button>

            <div class="flex items-center justify-between text-xs text-slate-500 pt-2 border-t border-slate-100">
                @if (Route::has('password.request'))
                    <a class="hover:text-slate-800 underline transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <span>Not enrolled yet? <a href="{{ route('register') }}" class="font-bold text-[#f25c3b] hover:underline">Register</a></span>
                @endif
            </div>
        </div>
    </form>

    <script>
        function fillDemoCredentials() {
            document.getElementById('email').value = 'member@pcbapipavav.org';
            document.getElementById('password').value = 'password123';
        }
    </script>
</x-guest-layout>
