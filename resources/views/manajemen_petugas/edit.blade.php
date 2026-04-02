<x-app-layout>
<div class="p-6">

<form method="POST" action="{{ route('petugas.update', $petugas->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $petugas->nama }}"><br><br>
    <input type="text" name="no_hp" value="{{ $petugas->no_hp }}"><br><br>

    <button type="submit">Update</button>
</form>

</div>
</x-app-layout>
