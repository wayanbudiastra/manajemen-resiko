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
                                        Data Insiden Unit Terkait
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

                                    @if($counter_medis_open > 0)
                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">

                                        <div class="w-full overflow-x-auto">
                                            <table class="min-w-full" wire:loading.remove>
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th colspan="10" class="px-4 py-3">INSIDEN
                                                            KESELAMATAN PASIEN</th>
                                                    </tr>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th class="px-4 py-3">No</th>
                                                        <th class="px-4 py-3">Judul Insiden</th>
                                                        <th class="px-4 py-3">Tanggal Insiden</th>
                                                        <th class="px-4 py-3">Nama Pelapor</th>
                                                        <th class="px-4 py-3">Jenis Insiden</th>
                                                        <th class="px-4 py-3" width="12%">Data
                                                            Pasien
                                                        </th>
                                                        <th class="px-4 py-3">Tempat Kejadian</th>
                                                        <th class=" px-4 py-3">Jenis Insiden</th>
                                                        <th class="px-4 py-3">Status</th>
                                                        <th class="px-4 py-3">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data_medis as $item)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            {{ $no++ }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->insiden_medis->judul_insiden }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ tgl_indo($item->insiden_medis->tgl_insiden) }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ get_nama_user($item->insiden_medis->users_id)}}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{
                                                            $item->insiden_medis->insiden_jenis->nama_insiden_jenis
                                                            }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->insiden_medis->inisial_pasien }} <br>
                                                            umum : {{$item->insiden_medis->umur}}<br>
                                                            Tgl Masuk RS :
                                                            {{tgl_indo($item->insiden_medis->tgl_masuk_rs)}}<br>
                                                            Kelamin : {{$item->insiden_medis->jenis_kelamin == 'L'?
                                                            'Laki-laki':'Perempuan'}}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{
                                                            $item->insiden_medis->insiden_ruangan->nama_insiden_ruangan
                                                            }}
                                                        </td>

                                                        <td class="px-4 py-3">
                                                            {{$item->insiden_medis->insiden_jenis->nama_insiden_jenis}}
                                                        </td>

                                                        <td class="px-4 py-3">
                                                            {{$item->insiden_medis->insiden_status->nama_insiden_status}}

                                                        </td>
                                                        <td>
                                                            @if ($item->insiden_medis->insiden_status_id=='2')
                                                            <button
                                                                wire:click="view_medis({{$item->insiden_medis->id}})"
                                                                class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                                title="view"><i class="fas fa-fw fa-eye"></i>
                                                            </button>
                                                            @endif



                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    @endif

                                    @if($counter_nonmedis_open > 0)
                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">

                                        <div class="w-full overflow-x-auto">
                                            <table class="min-w-full" wire:loading.remove>
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th colspan="10" class="px-4 py-3">INSIDEN
                                                           UMUM</th>
                                                    </tr>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                        <th class="px-4 py-3">No</th>
                                                        <th class="px-4 py-3">Judul Insiden</th>
                                                        <th class="px-4 py-3">Tanggal Insiden</th>
                                                        <th class="px-4 py-3">Nama Pelapor</th>
                                                        <th class="px-4 py-3">Jenis Insiden</th>

                                                        <th class="px-4 py-3">Tempat Kejadian</th>
                                                        <th class=" px-4 py-3">Jenis Insiden</th>
                                                        <th class="px-4 py-3">Status</th>
                                                        <th class="px-4 py-3">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data_nonmedis as $item)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            {{ $no++ }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->insiden_nonmedis->judul_insiden }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ tgl_indo($item->insiden_nonmedis->tgl_insiden) }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ get_nama_user($item->insiden_nonmedis->users_id)}}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{
                                                            $item->insiden_nonmedis->insiden_jenis->nama_insiden_jenis
                                                            }}
                                                        </td>

                                                        <td class="px-4 py-3">
                                                            {{
                                                            $item->insiden_nonmedis->insiden_ruangan->nama_insiden_ruangan
                                                            }}
                                                        </td>

                                                        <td class="px-4 py-3">
                                                            {{$item->insiden_nonmedis->insiden_jenis->nama_insiden_jenis}}
                                                        </td>

                                                        <td class="px-4 py-3">
                                                            {{$item->insiden_nonmedis->insiden_status->nama_insiden_status}}

                                                        </td>
                                                        <td>
                                                            @if ($item->insiden_nonmedis->insiden_status_id=='2')
                                                            <button
                                                                wire:click="view_nonmedis({{$item->insiden_nonmedis->id}})"
                                                                class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                                title="view"><i class="fas fa-fw fa-eye"></i>
                                                            </button>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    @endif


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>