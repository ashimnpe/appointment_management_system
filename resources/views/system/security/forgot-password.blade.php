<x-guest-layout>

    @include('sweetalert::alert')

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        <p>
            Forgot your password? No problem. Just let us know your email address and we will email you a password
            reset
            link that will allow you to choose a new one.
        </p>
    </div>

       {{-- <form method="POST" action="{{ route('generate.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="text-white p-2 underline">
                Email Password Reset Link
            </button>
        </div>
    </form> --}}

    <form action="{{ route('generate.email') }}" method="post">
        @csrf
        <div class="">
            <input class="block mt-1 w-full" type="email" name="email" placeholder="Email Address">
        </div>
        <div class="flex items-center justify-end mt-4">
            <button class="text-white underline">Email Password Reset Link</button>
        </div>
    </form>
</x-guest-layout>
