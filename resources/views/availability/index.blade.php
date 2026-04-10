<x-app-layout>
<div class="max-w-xl mx-auto p-6">

    <h2 class="text-xl font-bold mb-4">Ketersediaan Jadwal</h2>

    {{-- ERROR --}}
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('availability.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="block mb-1">Tanggal</label>
            <input
                type="date"
                name="tanggal"
                value="{{ old('tanggal') }}"
                required
                class="w-full border rounded px-3 py-2 appearance-auto"
            >
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" required class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih --</option>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

    <hr class="my-6">

    <h3 class="font-bold mb-2">Data Ketersediaan</h3>

    <table class="w-full border">
        <tr>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>

        @foreach($data as $d)
        <tr>
            <td>{{ $d->tanggal }}</td>
            <td>{{ $d->status ? 'Tersedia' : 'Tidak' }}</td>
        </tr>
        @endforeach

    </table>

</div>
</x-app-layout>
