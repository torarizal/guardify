<x-app-layout>
<div class="max-w-xl mx-auto p-6">

    <h2 class="text-xl font-bold mb-4">Edit Petugas</h2>

    <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Nama</label>
            <input type="text" name="name"
                value="{{ $user->name }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email"
                value="{{ $user->email }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label>No HP</label>
            <input type="text" name="no_hp"
                value="{{ $user->petugas->no_hp ?? '' }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>
</x-app-layout>
