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
                                Data Unit Belum Verifikasi Data
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
                                

                                <div class="w-full overflow-x-auto">
                                    <table class="mt-5 min-w-full" wire:loading.remove>
                                        <thead>
                                            
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">No</th>
                                                <th class="px-4 py-3">Nama Unit</th>
                                                <th class="px-4 py-3">Belum Verifikasi</th>
                                                <th class="px-4 py-3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3"> {{ $no++ }} </td>
                                                    <td class="px-4 py-3"> {{ $item->nama_insiden_unit }} </td>
                                                    
                                                    <td class="px-4 py-3 bg-red-300">
                                                        {{ rekap_risk_unit_nonaktif($item->id) }}</td>
                                                    <td class="px-4 py-3">
                                                       <button wire:click="cek_data({{ $item->id }})"
                                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                    class="fas fa-fw fa-box"></i>Verifikasi Data
                                                            </button>
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

