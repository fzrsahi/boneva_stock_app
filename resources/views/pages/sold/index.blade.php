<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="p-4">
                            <form method="GET" action="{{ route('solds.index') }}"
                                class="mb-6 bg-white p-4 rounded-lg shadow">
                                <div class="flex flex-wrap gap-4 items-end">
                                    <div>
                                        <label for="period"
                                            class="block mb-2 text-sm font-medium text-gray-900">Periode</label>
                                        <select name="period" id="period"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="day" {{ $period == 'day' ? 'selected' : '' }}>Harian
                                            </option>
                                            <option value="week" {{ $period == 'week' ? 'selected' : '' }}>Mingguan
                                            </option>
                                            <option value="month" {{ $period == 'month' ? 'selected' : '' }}>Bulanan
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="date"
                                            class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                                        <input type="date" id="date" name="date" value="{{ $date }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                            Filter
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <h2 class="text-xl font-bold mb-4">Laporan Penjualan - {{ $currentPeriod }}</h2>

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                                        <th scope="col" class="px-6 py-3">Stok Terjual</th>
                                        <th scope="col" class="px-6 py-3">Waktu</th>
                                        <th scope="col" class="px-6 py-3">Harga Satuan</th>
                                        <th scope="col" class="px-6 py-3">Total Keuntungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profitData as $data)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $data['name'] }}
                                            </th>
                                            <td class="px-6 py-4">{{ $data['total_sold'] }}</td>
                                            <td class="px-6 py-4">{{ $data['date_range'] }}</td>
                                            <td class="px-6 py-4">Rp. {{ number_format($data['price'], 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4">Rp.
                                                {{ number_format($data['total_profit'], 0, ',', '.') }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
