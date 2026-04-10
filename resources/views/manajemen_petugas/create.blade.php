<x-app-layout>
<div class="p-6">

<form method="POST" action="{{ route('petugas.store') }}">
    @csrf

    <input type="text" name="nama" placeholder="Nama" class="border p-2"><br><br>
    <input type="text" name="no_hp" placeholder="No HP" class="border p-2"><br><br>

    <button type="submit">Simpan</button>
</form>

</div>
</x-app-layout>
