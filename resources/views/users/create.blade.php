@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">

    <h2 class="text-xl font-bold mb-4">Tambah Petugas</h2>

    <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
        @csrf

        <div>
            <label>Nama</label>
            <input type="text" name="name"
                class="w-full border rounded px-3 py-2"
                required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email"
                class="w-full border rounded px-3 py-2"
                required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password"
                class="w-full border rounded px-3 py-2"
                required>
        </div>

        <div>
            <label>No HP</label>
            <input type="text" name="no_hp" placeholder="No Hp"
                class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>
@endsection
