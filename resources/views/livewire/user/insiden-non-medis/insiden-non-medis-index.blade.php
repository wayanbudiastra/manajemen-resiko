@if ($modeAdd == true)
    @include('livewire.user.insiden-non-medis.tambah')
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
                                    Data Insiden Umum
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
                                                <th class="px-4 py-3">Judul Insiden</th>
                                                <th class="px-4 py-3">Tanggal Insiden</th>
                                                <th class="px-4 py-3">Nama Pelapor</th>
                                                {{-- <th class="px-4 py-3">Katagori Insiden</th> --}}
                                                <th class="px-4 py-3">Tempat Kejadian</th>
                                                <th class="px-4 py-3">Kategori Insiden</th>
                                                <th class="px-4 py-3" width="30%"">Kronologi</th>
                                                <th class=" px-4 py-3">Jenis Insiden</th>
                                                <th class="px-4 py-3">Unit </th>
                                                <th class="px-4 py-3">Status</th>
                                                <th class="px-4 py-3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        {{ $no++ }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->judul_insiden }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ tgl_indo($item->tgl_insiden) }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ get_nama_user($item->users_id) }}
                                                    </td>
                                                    {{-- <td class="px-4 py-3">
                                                        {{ $item->insiden_kategori->nama_insiden_kategori }}
                                                    </td> --}}
                                                    <td class="px-4 py-3">
                                                        {{ $item->insiden_ruangan->nama_insiden_ruangan }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        @foreach (get_kategori_non_medis($item->id) as $dd)
                                                            {{ $dd->insiden_kategori->nama_insiden_kategori }}
                                                            @if ($item->insiden_status_id == '1')
                                                                <button wire:click="hapus_kategori({{ $dd->id }})"
                                                                    class="py-0 px-1 leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                                    title="Hapus"><i class="fas fa-x"></i>
                                                                </button>
                                                            @endif
                                                            <br>
                                                        @endforeach
                                                        @if ($item->insiden_status_id == '1')
                                                            <button wire:click="add_kategori({{ $item->id }})"
                                                                class="py-0 px-1 leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                                                                title="Tambah Katagori"><i class="fas fa-pencil"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->kronologi_kejadian }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->insiden_jenis->nama_insiden_jenis }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        @foreach (get_unit_non_medis($item->id) as $dd)
                                                            {{ $dd->insiden_unit->nama_insiden_unit }}
                                                            @if ($item->insiden_status_id == '1')
                                                                <button wire:click="hapus_unit({{ $dd->id }})"
                                                                    class="py-0 px-1 leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                                    title="Hapus"><i class="fas fa-x"></i>
                                                                </button>
                                                            @endif
                                                            <br>
                                                        @endforeach
                                                        @if ($item->insiden_status_id == '1')
                                                            <button wire:click="add_unit_terkait({{ $item->id }})"
                                                                class="py-0 px-1 leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                                                                title="Tambah Unit Terkait"><i
                                                                    class="fas fa-pencil"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->insiden_status->nama_insiden_status }}

                                                    </td>
                                                    <td>

                                                        <button wire:click="view({{ $item->id }})"
                                                            class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow"
                                                            title="view"><i class="fas fa-fw fa-eye"></i>
                                                        </button>
                                                        @if ($item->insiden_status_id == '1')
                                                            <button wire:click="lanjut({{ $item->id }})"
                                                                class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                    title="Lanjut"
                                                                    class="fas fa-fw fa fa-arrow-right"></i>
                                                            </button>
                                                            <button wire:click="edit({{ $item->id }})"
                                                                class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                    title="Edit" class="fas fa-fw fa-pencil"></i>
                                                            </button>
                                                        @endif

                                                        <a href="{{ url('cetak-insiden-nonmedis/' . enkerip_data($item->id)) }}"
                                                            target="BLANK"
                                                            class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-sky-500 border border-transparent rounded-lg active:bg-sky-600 hover:bg-sky-700 focus:outline-none focus:shadow-outline-sky"
                                                            title="Print"><i class="fas fa-fw fa-print"></i></a>
                                                        @if ($item->insiden_status_id == '1')
                                                            <button
                                                                onclick="return confirm('Apakah yakin akan hapus insiden request ini?') || event.stopImmediatePropagation();"
                                                                wire:click="hapus({{ $item->id }})"
                                                                class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                    class="fas fa-fw fa-trash"
                                                                    title="Hapus Data"></i></button>
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
