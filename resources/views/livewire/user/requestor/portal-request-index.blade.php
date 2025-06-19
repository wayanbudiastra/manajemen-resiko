@if ($modeAdd == true)
@include('livewire.user.requestor.tambah')
@else
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
                                        Data PR - Request
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
                                    <div>
                                        <button wire:click="add"
                                            class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><i
                                                class="fas fa-fw fa-plus"></i>Add Request</button>
                                    </div>
                                    <div class="w-full overflow-x-auto mt-5">
                                        <table class="min-w-full" wire:loading.remove>
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="px-4 py-3">No</th>
                                                    <th class="px-4 py-3">PR Number</th>
                                                    <th class="px-4 py-3">Reuqest Date</th>
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
                                                        {{ $item->portal_unit->nama_unit }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        @if(cek_status_reject($item->id)=='Y')
                                                        Reject
                                                        @else
                                                        {{cek_proses_portal_request($item->id)}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(get_status_request_portal($item->id) ==
                                                        "posting")
                                                        <button wire:click="history({{$item->id}})"
                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                            title="History"><i class="fas fa-fw fa-eye"></i>
                                                        </button>
                                                        @else
                                                        <button wire:click="edit({{$item->id}})"
                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                class="fas fa-fw fa-pencil"></i>Edit
                                                        </button>
                                                        @endif
                                                        @if (cek_status_purchasing($item->id)=='Y')
                                                        <a href="{{url('cetak-portal/'.$item->id)}}" target="BLANK"
                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-stone-500 border border-transparent rounded-lg active:bg-stone-600 hover:bg-stone-700 focus:outline-none focus:shadow-outline-stone"
                                                            title="Print"><i class="fas fa-fw fa-print"></i></a>

                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="px-4 py-3 mb-5 mt-5 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                            {{ $data->links() }}

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif