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
                              Rekap Kontrol Risk Register Unit {{ $tahun }}
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
                                <div class="mt-4 flex w-3/4 space-x-2 items-start">
                                    <!-- Select: Lebar 75% -->
                                    <select
                                        class="ml-4 form-select form-control w-2/4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                        name="pilih_tahun" wire:model.defer="pilih_tahun">
                                        <option value="">Pilih Tahun</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Tombol: Lebar 25% -->
                                    <button wire:click="cek_data"
                                        class="w-2/4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                        <i class="fas fa-fw fa-search-plus"></i> Cek Data
                                    </button>
                                </div>

                                <div class="w-full overflow-x-auto">
                                    <table class="mt-5 min-w-full" wire:loading.remove>
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th colspan="10" class="px-4 py-3">RISK REGISTER UNIT {{$nama_unit}}</th>
                                            </tr>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">No</th>
                                                <th class="px-4 py-3">Bulan</th>
                                                <th class="px-4 py-3">Sangat Rendah</th>
                                                <th class="px-4 py-3">Rendah</th>
                                                <th class="px-4 py-3">Sedang</th>
                                                <th class="px-4 py-3">Tinggi</th>
                                                <th class="px-4 py-3">Sangat Tinggi</th>
                                                <th class="px-4 py-3">Total</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="px-4 py-3"> 1 </td>
                                                <td class="px-4 py-3"> Januari </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '01', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '01', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '01', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '01', 4) }}</td>
                                                <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '01', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '01') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3"> 2 </td>
                                                <td class="px-4 py-3"> February </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '02', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '02', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '02', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '01', 4) }}</td>
                                                     <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '02', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '02') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 3 </td>
                                                <td class="px-4 py-3"> Maret </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '03', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '03', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '03', 3) }}</td>
                                               <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '03', 4) }}</td>
                                                     <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '03', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '03') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 4 </td>
                                                <td class="px-4 py-3"> April </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '04', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '04', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '04', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '04', 4) }}</td>
                                                     <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '04', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '04') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 5 </td>
                                                <td class="px-4 py-3"> Mei </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '05', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '05', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '05', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '05', 4) }}</td>
                                                     <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '05', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '05') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 6 </td>
                                                <td class="px-4 py-3"> Juni </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '06', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '06', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '06', 3) }}</td>
                                               <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '06', 4) }}</td>
                                                     <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '06', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '06') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 7 </td>
                                                <td class="px-4 py-3"> Juli </td>
                                                <td class="px-4 py-3 bg-green-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '07', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '07', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">
                                                    {{ rekap_risk_unit($unit, $tahun, '07', 3) }}</td>
                                               <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '07', 4) }}</td>
                                                     <td class="px-4 py-3 bg-red-900 text-white">
                                                    {{ rekap_risk_unit($unit, $tahun, '07', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '07') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 8 </td>
                                                <td class="px-4 py-3"> Agustus </td>
                                                <td class="px-4 py-3 bg-green-300">{{ rekap_risk_unit($unit, $tahun, '08', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">{{ rekap_risk_unit($unit, $tahun, '08', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">{{ rekap_risk_unit($unit, $tahun, '08', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '08', 4) }}</td>
                                                 <td class="px-4 py-3 bg-red-900 text-white">{{ rekap_risk_unit($unit, $tahun, '08', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '08') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 9 </td>
                                                <td class="px-4 py-3"> September </td>
                                                <td class="px-4 py-3 bg-green-300">{{ rekap_risk_unit($unit, $tahun, '09', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">{{ rekap_risk_unit($unit, $tahun, '09', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">{{ rekap_risk_unit($unit, $tahun, '09', 3) }}</td>
                                               <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '09', 4) }}</td>
                                                 <td class="px-4 py-3 bg-red-900 text-white">{{ rekap_risk_unit($unit, $tahun, '09', 5 )}} </td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '09') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 10 </td>
                                                <td class="px-4 py-3"> Oktober </td>
                                                <td class="px-4 py-3 bg-green-300">{{ rekap_risk_unit($unit, $tahun, '10', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">{{ rekap_risk_unit($unit, $tahun, '10', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">{{ rekap_risk_unit($unit, $tahun, '10', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '10', 4) }}</td>
                                                <td class="px-4 py-3 bg-red-900 text-white">{{ rekap_risk_unit($unit, $tahun, '10', 5) }}</td>

                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '10') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 11 </td>
                                                <td class="px-4 py-3"> November </td>
                                                <td class="px-4 py-3 bg-green-300">{{ rekap_risk_unit($unit, $tahun, '11', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">{{ rekap_risk_unit($unit, $tahun, '11', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">{{ rekap_risk_unit($unit, $tahun, '11', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '11', 4) }}</td>
                                                <td class="px-4 py-3 bg-red-900 text-white">{{ rekap_risk_unit($unit, $tahun, '11', 5) }}</td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '11') }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-4 py-3"> 12 </td>
                                                <td class="px-4 py-3"> Desember </td>
                                                <td class="px-4 py-3 bg-green-300">{{ rekap_risk_unit($unit, $tahun, '12', 1) }}</td>
                                                <td class="px-4 py-3 bg-yellow-300">{{ rekap_risk_unit($unit, $tahun, '12', 2) }}</td>
                                                <td class="px-4 py-3 bg-orange-300">{{ rekap_risk_unit($unit, $tahun, '12', 3) }}</td>
                                                <td class="px-4 py-3 bg-red-400">
                                                    {{ rekap_risk_unit($unit, $tahun, '12', 4) }}</td>
                                                <td class="px-4 py-3 bg-red-900 text-white">{{ rekap_risk_unit($unit, $tahun, '12', 5) }}</td>
                                                <td class="px-4 py-3">{{ rekap_risk_unit_total($unit, $tahun, '12') }}
                                                </td>
                                            </tr>
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
