<x-app-layout>
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">
    Rekap Shift Petugas Bulan
    {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }} {{ $year }}
    </h2>

    <div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-blue-500 text-white p-4 rounded">
        <p>Total Shift</p>
        <h2 class="text-2xl font-bold">{{ $totalShift }}</h2>
    </div>

    <div class="bg-green-500 text-white p-4 rounded">
        <p>Total Shift Siang</p>
        <h2 class="text-2xl font-bold">{{ $totalSiang }}</h2>
    </div>

    <div class="bg-red-500 text-white p-4 rounded">
        <p>Total Shift Malam</p>
        <h2 class="text-2xl font-bold">{{ $totalMalam }}</h2>
    </div>

    </div>

    <h3 class="font-bold mb-2">History Rekap Bulanan</h3>

    <div class="flex gap-2 flex-wrap mb-2">
    @foreach ($months as $m)
        <a href="{{ route('rekap.rekap', ['month' => $m->month, 'year' => $m->year]) }}"
        class="px-3 py-1 bg-gray-200 rounded hover:bg-blue-500 hover:text-white">

            {{ \Carbon\Carbon::create()->month($m->month)->translatedFormat('F') }} {{ $m->year }}

        </a>
    @endforeach
    </div>

</div>



    <div class="overflow-x-auto">
        {{-- <div class="grid grid-cols-2 gap-4 mb-6"> --}}

        <table class="w-full border rounded shadow bg-white">

            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Siang</th>
                    <th class="p-3">Malam</th>
                </tr>
            </thead>

            <tbody>
                @foreach($rekap as $d)
                <tr class="border-b hover:bg-gray-100 text-center">

                    <td class="p-3 font-semibold">
                        {{ $d['nama'] }}
                    </td>

                    <td class="p-3">
                        {{ $d['total'] }}
                    </td>

                    <td class="p-3 text-green-600 font-bold">
                        {{ $d['siang'] }}
                    </td>

                    <td class="p-3 text-red-600 font-bold">
                        {{ $d['malam'] }}
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    </div>

</div>
</x-app-layout>
