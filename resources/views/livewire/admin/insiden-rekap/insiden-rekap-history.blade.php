
<div>
    {{-- @if ($modeAdd == true)
    @include('livewire.admin.setting.portal-data.tambah')
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
                                                        Rekap History Insiden Umum
                                                    </h2>

                                                    <div
                                                        class="mt-5 relative w-full max-w-xl mr-6 focus-within:text-green-500">
                                                       
                                                         <select
                                                                class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                                                aria-label="Default select example"
                                                                name="pilih_tahun"
                                                                wire:model.defer="pilih_tahun"
                                                                style="height: 110%">
                                                                <option value=""> Pilih Tahun </option>
                                                                @foreach ($tahun as $item)
                                                                <option value="{{$item}}">
                                                                    {{$item}}
                                                                </option>
                                                                @endforeach

                                                            </select>
                                                        <div class="col" wire:loading>
                                                            <div role="status">
                                                                <svg class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                                                    viewBox="0 0 100 101" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                                        fill="currentFill" />
                                                                </svg>
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <button wire:click="caridata"
                                                        class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                            class="fas fa-fw fa-plus"></i>Cek Data</button>
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
                                                        <div
                                                            class="px-4 py-3 mb-5 mt-5 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>

                                {{--
                            </div> --}}
