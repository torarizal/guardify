<x-app-layout>
<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">History Jadwal</h1>

    <table class="w-full border text-center">
        <tr class="bg-gray-200">
            <th>Tanggal</th>
            <th>Shift</th>
            <th>Nama</th>
        </tr>

        @foreach($jadwals as $j)
        <tr>
            <td>{{ $j->tanggal }}</td>
            <td>{{ $j->shift }}</td>
            <td>{{ $j->petugas->user->name }}</td>
        </tr>
        @endforeach

    </table>

</div>
</x-app-layout>
