<x-app-layout>
<div class="p-6">

    <h1 class="text-xl font-bold mb-4">Data Petugas</h1>

    <a href="{{ route('petugas.create') }}"
       class="bg-green-500 text-white px-3 py-2 rounded">
       + Tambah Petugas
    </a>

    <table class="w-full mt-4 border">
        <tr class="bg-gray-200">
            <th>Nama</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        @foreach($petugas as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->no_hp }}</td>
            <td>
                <a href="{{ route('petugas.edit', $p->id) }}" class="text-blue-500">Edit</a>

                <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
</x-app-layout>
