
<div>
    {{-- @if ($modeAdd == true)
    @include('livewire.admin.setting.portal-unit.tambah')
    @else --}}
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="container px-6 mx-auto md:container md:mx-auto ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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

                                            <div
                                                class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                                {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                                                    <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                                        Rekap Insiden Medis Tahun {{ $data_tahun }}
                                                    </h2>

                                                    

                                                    <button wire:click="data_history"
                                                        class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                            class="fas fa-fw fa-plus"></i>History</button>
                                                    <div class="w-full overflow-x-auto mt-5">
                                                        <table class="min-w-full whitespace-no-wrap"
                                                            wire:loading.remove>
                                                            <thead>
                                                                <tr
                                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                    <th class="px-4 py-3">No</th>
                                                                    <th class="px-4 py-3">Status Insiden</th>
                                                                    <th class="px-4 py-3">Total</th>
                                                                    <th class="px-4 py-3">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        1 </td>
                                                                    <td class="px-4 py-3">
                                                                        DRAFT</td>
                                                                    <td class="px-4 py-3"> {{$data_draf}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="edit(1)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        2 </td>
                                                                    <td class="px-4 py-3">
                                                                        OPEN</td>
                                                                    <td class="px-4 py-3"> {{$data_open}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="edit(2)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                  <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        3 </td>
                                                                    <td class="px-4 py-3">
                                                                        PENDING</td>
                                                                    <td class="px-4 py-3"> {{$data_pending}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="edit(3)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        4 </td>
                                                                    <td class="px-4 py-3">
                                                                        CLOSE</td>
                                                                    <td class="px-4 py-3"> {{$data_close}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="edit(4)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        5 </td>
                                                                    <td class="px-4 py-3">
                                                                        CENCEL</td>
                                                                    <td class="px-4 py-3"> {{$data_cencel}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="edit(5)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                               
                                                            </tbody>
                                                        </table>
                                                        <div
                                                            class="px-4 py-3 mb-5 mt-5 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                                        </div>
                                                        <table class="min-w-full whitespace-no-wrap"
                                                            wire:loading.remove>
                                                            <thead>
                                                                <tr
                                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                    <th class="px-4 py-3">No</th>
                                                                    <th class="px-4 py-3">Rekap Bulanan</th>
                                                                    <th class="px-4 py-3">Total</th>
                                                                    <th class="px-4 py-3">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        1 </td>
                                                                    <td class="px-4 py-3">
                                                                        Januari</td>
                                                                    <td class="px-4 py-3"> {{$data_januari}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(1)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        2 </td>
                                                                    <td class="px-4 py-3">
                                                                        Februari</td>
                                                                    <td class="px-4 py-3"> {{$data_februari}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(2)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                  <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        3 </td>
                                                                    <td class="px-4 py-3">
                                                                        Maret</td>
                                                                    <td class="px-4 py-3"> {{$data_maret}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(3)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        4 </td>
                                                                    <td class="px-4 py-3">
                                                                        April</td>
                                                                    <td class="px-4 py-3"> {{$data_april}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(4)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        5 </td>
                                                                    <td class="px-4 py-3">
                                                                        Mei</td>
                                                                    <td class="px-4 py-3"> {{$data_mei}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(5)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                 <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        6 </td>
                                                                    <td class="px-4 py-3">
                                                                        Juni</td>
                                                                    <td class="px-4 py-3"> {{$data_juni}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(6)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                  <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        7 </td>
                                                                    <td class="px-4 py-3">
                                                                        Juli</td>
                                                                    <td class="px-4 py-3"> {{$data_juli}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(7)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                               <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        8 </td>
                                                                    <td class="px-4 py-3">
                                                                        Agustus</td>
                                                                    <td class="px-4 py-3"> {{$data_agustus}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(8)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        9 </td>
                                                                    <td class="px-4 py-3">
                                                                        September</td>
                                                                    <td class="px-4 py-3"> {{$data_september}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(9)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        10 </td>
                                                                    <td class="px-4 py-3">
                                                                        Oktober</td>
                                                                    <td class="px-4 py-3"> {{$data_oktober}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(10)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                               <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        11 </td>
                                                                    <td class="px-4 py-3">
                                                                        November</td>
                                                                    <td class="px-4 py-3"> {{$data_november}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(11)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        12 </td>
                                                                    <td class="px-4 py-3">
                                                                        Desember</td>
                                                                    <td class="px-4 py-3"> {{$data_desember}}</td>
                                                                   
                                                                    <td>
                                                                        <button wire:click="data_bulan(12)"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                class="fas fa-fw fa-pencil"></i>detail
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>

                                {{--
                            </div> --}}