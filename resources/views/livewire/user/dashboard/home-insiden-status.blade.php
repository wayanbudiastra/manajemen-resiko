<div>
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="container px-6 mx-auto lg:container lg:mx-auto "> --}}
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
                                        <div>
                                            <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <div class="flex flex-col">
                                                    <h2 class=" my-6 text-2xl font-semibold text-gray-700
        dark:text-gray-200">
                                                        Dashboard Portal Insiden
                                                    </h2>
                                                    <div>
                                                        @if (session()->has('success'))
                                                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                                            role="alert">
                                                            <span class="font-medium">Success!</span> {{
                                                            session('success') }}
                                                        </div>
                                                        @endif
                                                        @if (session()->has('error'))
                                                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                            role="alert">
                                                            <span class="font-medium">Danger alert!</span> {{
                                                            session('error') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                                        <div class="flex flex-row">

                                                            <div
                                                                class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                                <a href="">
                                                                    <h5
                                                                        class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                        {{ status_draf(Auth()->user()->id)}}
                                                                    </h5>
                                                                </a>
                                                                <h2 class="text-center text-xl mb-5"> Draf
                                                                </h2>
                                                                <center>
                                                                    <a href="{{url('home-insiden-status/1')}}"
                                                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                            class="fas fa-fw fa-eye"></i> View Data</a>
                                                                </center>
                                                            </div>
                                                            <div
                                                                class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                                <a href="">
                                                                    <h5
                                                                        class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                        {{ status_open(Auth()->user()->id)}}
                                                                    </h5>
                                                                </a>
                                                                <h2 class="text-center text-xl mb-5">Open
                                                                </h2>
                                                                <center>
                                                                    <a href="{{url('home-insiden-status/2')}}"
                                                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                            class="fas fa-fw fa-edit"></i>view Data</a>
                                                                </center>
                                                            </div>
                                                            <div
                                                                class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                                <a href="">
                                                                    <h5
                                                                        class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                        {{ status_pending(Auth()->user()->id)}}
                                                                    </h5>
                                                                </a>
                                                                <h2 class="text-center text-xl mb-5">Pending
                                                                </h2>
                                                                <center>
                                                                    <a href="{{url('home-insiden-status/3')}}"
                                                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow"><i
                                                                            class="fas fa-fw fa-eye"></i>view Data</a>
                                                                </center>

                                                            </div>
                                                            <div
                                                                class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                                                <a href="">
                                                                    <h5
                                                                        class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                                        {{ status_close(Auth()->user()->id)}}
                                                                    </h5>
                                                                </a>
                                                                <h2 class="text-center text-xl mb-5">Close</h2>
                                                                <center>
                                                                    <a href="{{url('home-insiden-status/4')}}"
                                                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                            class="fas fa-fw fa-print"></i>view Data</a>
                                                                </center>
                                                            </div>
                                                        </div>
                                                        @if($counter_medis_open > 0)
                                                        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">

                                                            <div class="w-full overflow-x-auto">
                                                                <table class="min-w-full" wire:loading.remove>
                                                                    <thead>
                                                                        <tr
                                                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                            <th colspan="10" class="px-4 py-3">INSIDEN
                                                                                REPORT MEDIS</th>
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
                                                                                {{ $item->judul_insiden }}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{ tgl_indo($item->tgl_insiden) }}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{ get_nama_user($item->users_id)}}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{
                                                                                $item->insiden_jenis->nama_insiden_jenis
                                                                                }}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{ $item->inisial_pasien }} <br>
                                                                                umum : {{$item->umur}}<br>
                                                                                Tgl Masuk RS :
                                                                                {{tgl_indo($item->tgl_masuk_rs)}}<br>
                                                                                Kelamin : {{$item->jenis_kelamin == 'L'?
                                                                                'Laki-laki':'Perempuan'}}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{
                                                                                $item->insiden_ruangan->nama_insiden_ruangan
                                                                                }}
                                                                            </td>

                                                                            <td class="px-4 py-3">
                                                                                {{$item->insiden_jenis->nama_insiden_jenis}}
                                                                            </td>

                                                                            <td class="px-4 py-3">
                                                                                {{$item->insiden_status->nama_insiden_status}}

                                                                            </td>
                                                                            <td>

                                                                                <button
                                                                                    wire:click="view_medis({{$item->id}})"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                                                    title="view"><i
                                                                                        class="fas fa-fw fa-eye"></i>
                                                                                </button>

                                                                                <button
                                                                                    wire:click="lanjut_medis({{$item->id}})"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                                        title="Lanjut"
                                                                                        class="fas fa-fw fa fa-arrow-right"></i>
                                                                                </button>
                                                                                <button
                                                                                    wire:click="edit_medis({{$item->id}})"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                        title="Edit"
                                                                                        class="fas fa-fw fa-pencil"></i>
                                                                                </button>


                                                                                <a href="{{url('cetak-insiden-medis/'.$item->id)}}"
                                                                                    target="BLANK"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-lime-500 border border-transparent rounded-lg active:bg-lime-600 hover:bg-lime-700 focus:outline-none focus:shadow-outline-lime"
                                                                                    title="Print"><i
                                                                                        class="fas fa-fw fa-print"></i></a>

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
                                                                                REPORT NON MEDIS</th>
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
                                                                                {{ $item->judul_insiden }}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{ tgl_indo($item->tgl_insiden) }}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{ get_nama_user($item->users_id)}}
                                                                            </td>
                                                                            <td class="px-4 py-3">
                                                                                {{
                                                                                $item->insiden_jenis->nama_insiden_jenis
                                                                                }}
                                                                            </td>

                                                                            <td class="px-4 py-3">
                                                                                {{
                                                                                $item->insiden_ruangan->nama_insiden_ruangan
                                                                                }}
                                                                            </td>

                                                                            <td class="px-4 py-3">
                                                                                {{$item->insiden_jenis->nama_insiden_jenis}}
                                                                            </td>

                                                                            <td class="px-4 py-3">
                                                                                {{$item->insiden_status->nama_insiden_status}}

                                                                            </td>
                                                                            <td>

                                                                                <button
                                                                                    wire:click="view_nonmedis({{$item->id}})"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                                                                    title="view"><i
                                                                                        class="fas fa-fw fa-eye"></i>
                                                                                </button>

                                                                                <button
                                                                                    wire:click="lanjut_nonmedis({{$item->id}})"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                                                        title="Lanjut"
                                                                                        class="fas fa-fw fa fa-arrow-right"></i>
                                                                                </button>
                                                                                <button
                                                                                    wire:click="edit_nonmedis({{$item->id}})"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                                        title="Edit"
                                                                                        class="fas fa-fw fa-pencil"></i>
                                                                                </button>


                                                                                <a href="{{url('cetak-insiden-nonmedis/'.$item->id)}}"
                                                                                    target="BLANK"
                                                                                    class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-lime-500 border border-transparent rounded-lg active:bg-lime-600 hover:bg-lime-700 focus:outline-none focus:shadow-outline-lime"
                                                                                    title="Print"><i
                                                                                        class="fas fa-fw fa-print"></i></a>


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

                                        {{--
                                    </div> --}}