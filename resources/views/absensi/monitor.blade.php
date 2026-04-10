<x-app-layout>
<div class="p-6">

<h2 class="text-xl font-bold mb-4">Monitoring Absensi Hari Ini</h2>

<table class="w-full border text-center">
    <tr class="bg-gray-800 text-white">
        <th class="p-2">Nama</th>
        <th>Shift</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Bukti</th>
    </tr>

@foreach($jadwal as $j)
<tr class="border">
    <td class="p-2">{{ $j->petugas->user->name }}</td>
    <td>{{ $j->shift }}</td>
    <td>{{ $j->tanggal }}</td>


    {{-- status absensi --}}
    <td>
        @if($j->absensi)
            <span class="text-green-600 font-bold">✔ Hadir</span>
        @else
            <span class="text-red-600 font-bold">❌ Belum Absen</span>
        @endif
    </td>

    {{-- preview foto --}}
    <td>
        @if($j->absensi)
            <img src="{{ asset('storage/'.$j->absensi->foto) }}"
                class="w-20 h-20 object-cover rounded mx-auto">
        @else
            -
        @endif
    </td>
</tr>
@endforeach

</table>

</div>
</x-app-layout>
