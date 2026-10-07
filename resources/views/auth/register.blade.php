<x-guest-layout>
    <div class="mb-6 text-center">
        <span class="inline-block px-3 py-1 text-xs font-semibold uppercase tracking-wider text-orange-700 bg-orange-50 border border-orange-200 rounded-full mb-2">
            PCBA Member Registration
        </span>
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Create Member Account</h1>
        <p class="text-xs text-slate-500 mt-1">Register your Customs Broker representative account</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Member / Representative Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name / Authorized Signatory" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Official Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="broker@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6 flex flex-col gap-3">
            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3 bg-[#f25c3b] hover:bg-[#d94828] active:bg-[#c2410c] text-white font-bold rounded-lg shadow-md hover:shadow-lg transition duration-150 tracking-wide text-sm">
                <i class="bi bi-person-plus me-2"></i> {{ __('Register Member Account') }}
            </button>

            <div class="text-center text-xs text-slate-500 pt-2 border-t border-slate-100">
                Already registered? <a href="{{ route('login') }}" class="font-bold text-[#f25c3b] hover:underline">Log in here</a>
            </div>
        </div>
    </form>
</x-guest-layout>
