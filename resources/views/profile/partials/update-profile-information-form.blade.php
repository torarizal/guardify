<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- FORM VERIFIKASI (biarin sendiri) -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- ✅ FORM UTAMA (INI YANG BENAR) -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- FOTO -->
        <div>
        <x-input-label for="photo" :value="__('Foto Profil')" />

        <!-- Menampilkan foto saat ini jika ada -->
        @if (auth()->user()->photo)
            <div class="mt-2 mb-2">
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Foto Profil" class="w-20 h-20 rounded-full object-cover">
            </div>
        @endif

        <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full" accept="image/*" />
        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <!-- NAME -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $user->name)" required autofocus />
        </div>

        <!-- EMAIL -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                :value="old('email', $user->email)" required />
        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
