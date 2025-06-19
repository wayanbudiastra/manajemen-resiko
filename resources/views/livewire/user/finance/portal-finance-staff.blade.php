<div>
    @if ($modeAdd == true)
    @include('livewire.user.finance.tambah-staff')
    @else
    {{-- <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="container px-6 mx-auto md:container md:mx-auto ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"> --}}
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

                                                <div
                                                    class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                                    {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                                        --}}
                                                        <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                                            Data PR - Request
                                                        </h2>

                                                        <div
                                                            class="mt-5 relative w-full max-w-xl mr-6 focus-within:text-green-500">
                                                            <div class="absolute inset-y-0 flex items-center pl-2">
                                                                <svg class="w-4 h-4" aria-hidden="true"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <input
                                                                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-green-300 focus:outline-none focus:shadow-outline-green form-input"
                                                                type="text"
                                                                placeholder="Cari Nomor PR atau Descriprtion...."
                                                                aria-label="Search" wire:model="src" />
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
                                                        {{-- <button wire:click="add"
                                                            class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                class="fas fa-fw fa-plus"></i>Tambah</button> --}}
                                                        <div class="w-full overflow-x-auto mt-5">
                                                            <table class="min-w-full" wire:loading.remove>
                                                                <thead>
                                                                    <tr
                                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                        <th class="px-4 py-3">No</th>
                                                                        <th class="px-4 py-3">PR Number</th>
                                                                        <th class="px-4 py-3">Date</th>
                                                                        <th class="px-4 py-3">Request To</th>
                                                                        <th class="px-4 py-3">Description</th>
                                                                        <th class="px-4 py-3">Grand total</th>
                                                                        <th class="px-4 py-3">User</th>
                                                                        <th class="px-4 py-3">Unit</th>
                                                                        <th class="px-4 py-3">Status</th>
                                                                        <th class="px-4 py-3">Manage</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data as $item)
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class="px-4 py-3">
                                                                            {{ $no++ }}</td>

                                                                        <td class="px-4 py-3">
                                                                            {{ $item->nomor_pr }}
                                                                        </td>

                                                                        <td class="px-4 py-3">
                                                                            {{ tgl_indo($item->tgl_request) }}
                                                                        </td>
                                                                        <td class="px-4 py-3">
                                                                            @if ($item->non_purchasing == 'Y')
                                                                            <span
                                                                                class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                                                                Finance
                                                                            </span>
                                                                            @else
                                                                            <span
                                                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                                Purchasing
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $item->description }}
                                                                        </td>
                                                                        <td class="px-4 py-3">
                                                                            {{ rupiah($item->grand_total) }}
                                                                        </td>
                                                                        <td class="px-4 py-3">
                                                                            {{get_nama_user($item->users_id)}}
                                                                        </td>
                                                                        <td class="px-4 py-3">
                                                                            {{get_nama_unit($item->portal_unit_id)}}
                                                                        </td>
                                                                        <td class="px-4 py-3">
                                                                            @if (cek_status_reject($item->id)=='Y')
                                                                            Reject
                                                                            @else

                                                                            {{cek_proses_portal_request($item->id)}}


                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            @if(get_status_request_portal($item->id) ==
                                                                            "posting")
                                                                            <button wire:click="history({{$item->id}})"
                                                                                title="History Request"
                                                                                class="px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                                    class="fas fa-fw fa-eye"></i>
                                                                            </button>
                                                                            @if (cek_status_reject($item->id)=='N')
                                                                            @if(cek_status_kabid($item->id)=='N')
                                                                            <button wire:click="lanjut({{$item->id}})"
                                                                                title="prosess"
                                                                                class="px-3 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                                    class="fas fa-fw fa-arrow-right"></i>
                                                                            </button>
                                                                            @endif
                                                                            @endif

                                                                            @else
                                                                            -
                                                                            {{-- <button
                                                                                wire:click="edit({{$item->id}})"
                                                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                    class="fas fa-fw fa-pencil"></i>Edit
                                                                            </button> --}}
                                                                            @endif
                                                                            @if (cek_status_purchasing($item->id)=='Y')
                                                                            <a href="{{url('cetak-portal/'.$item->id)}}"
                                                                                target="BLANK"
                                                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-stone-500 border border-transparent rounded-lg active:bg-stone-600 hover:bg-stone-700 focus:outline-none focus:shadow-outline-stone"><i
                                                                                    class="fas fa-fw fa-print"></i>Cetak</a>

                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <div
                                                                class="px-4 py-3 mb-5 mt-5 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                                                {{ $data->links() }}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    {{--
                                </div> --}}