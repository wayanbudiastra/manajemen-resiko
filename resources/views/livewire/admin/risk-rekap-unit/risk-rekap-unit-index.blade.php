<div>
    {{-- <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="col-md-12">
            <div class="card">
                <div>
                    @if (session()->has('user-message'))
                        <div class="alert alert-success">
                            {{ session('user-message') }}
                        </div>
                    @endif
                </div>
                {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                <div class="w-full overflow-x-auto">
                    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex flex-col">
                            <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                Data Rekap Risk Register {{ $tahun }}
                            </h2>
                            <div>
                                @if (session()->has('success'))
                                    <div class="mt-5 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                        role="alert">
                                        <span class="font-medium">Success!</span>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="mt-5 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium">Danger alert!</span>
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>



                            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                <div class="flex w-1/2 space-x-2 items-start">
                                    <!-- Select: Lebar 75% -->
                                    <select
                                        class="form-select form-control w-1/4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                        name="pilih_tahun" wire:model.defer="pilih_tahun">
                                        <option value="">Pilih Tahun</option>
                                        @foreach ($data_tahun as $item)
                                            <option value="{{ $item }}"
                                                {{ $item === $tahun ? 'selected' : ' ' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>

                                    <select
                                        class="form-select form-control w-2/4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                        name="pilih_bulan" wire:model.defer="pilih_bulan">
                                        <option value="">Pilih Bulan</option>
                                        @foreach ($data_bulan as $item => $nama)
                                            <option value="{{ $item }}"
                                                {{ $item === $bulan ? 'selected' : ' ' }}>{{ $nama }}</option>
                                        @endforeach
                                    </select>


                                    <!-- Tombol: Lebar 25% -->
                                    <button wire:click="cek_data"
                                        class="w-1/4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                        <i class="fas fa-fw fa-search-plus"></i> Cek Data
                                    </button>
                                     <button target="_BLANK"
                                     wire:click="cetak_excel"
                                        class="w-1/4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <i class="fas fa-fw fa-download" ></i> Excel
                                    </button>
                                </div>

                                <div class="w-full overflow-x-auto">
                                    <table class="mt-5 min-w-full" wire:loading.remove>
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th colspan="10" class="px-4 py-3">RISK REGISTER BULAN
                                                    {{ $bulan }}</th>
                                            </tr>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">No</th>
                                                <th class="px-4 py-3">Nama Unit</th>
                                                <th class="px-4 py-3">Sangat Rendah</th>
                                                <th class="px-4 py-3">Rendah</th>
                                                <th class="px-4 py-3">Sedang</th>
                                                <th class="px-4 py-3">Tinggi</th>
                                                <th class="px-4 py-3">Sangat Tinggi</th>
                                                <th class="px-4 py-3">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3"> {{ $no++ }} </td>
                                                    <td class="px-4 py-3"> {{ $item->nama_insiden_unit }} </td>
                                                    <td class="px-4 py-3 bg-green-300">
                                                        {{  rekap_risk_evaluasi_unit($item->id, $tahun, $bulan, 1) }}</td>
                                                    <td class="px-4 py-3 bg-blue-300">
                                                        {{  rekap_risk_evaluasi_unit($item->id, $tahun, $bulan, 2) }}</td>
                                                    <td class="px-4 py-3 bg-yellow-300">
                                                        {{  rekap_risk_evaluasi_unit($item->id, $tahun, $bulan, 3) }}</td>
                                                    <td class="px-4 py-3 bg-orange-300">
                                                        {{  rekap_risk_evaluasi_unit($item->id, $tahun, $bulan, 4) }}</td>
                                                    <td class="px-4 py-3 bg-red-300">
                                                        {{  rekap_risk_evaluasi_unit($item->id, $tahun, $bulan, 5) }}</td>
                                                    <td class="px-4 py-3">
                                                        {{  rekap_risk_evaluasi_unit_total($item->id, $tahun, $bulan) }}
                                                    </td>
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
        </div>
    </div>
</div>
