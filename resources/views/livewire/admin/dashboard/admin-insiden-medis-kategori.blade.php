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
                                        Data Insiden Keselamatan Pasien
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
                                        <button wire:click="kembali"
                                            class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><i
                                                class="fas fa-fw fa-plus"></i>Kembali</button>
                                    </div>
                                    <div class="mt-5">
                                        <div class="w-full overflow-x-auto">
                                            <table class="min-w-full" wire:loading.remove>
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                                        <th class="px-4 py-3" width="25%">Paramter</th>
                                                        <th class="px-4 py-3">Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Nomor Insiden</td>
                                                        <td class="px-4 py-3">
                                                            {{ $data->nomor_insiden }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Judul Insiden </td>
                                                        <td class="px-4 py-3">
                                                            {{$data->judul_insiden}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Tanggal Insiden </td>
                                                        <td class="px-4 py-3">
                                                            {{ tgl_indo($data->tgl_insiden)}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Sudah Pernah Terjadi</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->sudah_pernah_terjadi}}
                                                        </td>
                                                    </tr>

                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Inisial Pasien</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->inisial_pasien}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Umur Pasien</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->umur}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Jenis Kelamin</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan' }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Tgl Masuk RS</td>
                                                        <td class="px-4 py-3">
                                                            {{tgl_indo($data->tgl_masuk_rs)}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Penanggung Biaya</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->insiden_penanggung_biaya->nama_insiden_penanggung_biaya}}
                                                        </td>
                                                    </tr>

                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Tindakan dilakukan oleh</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->tindakan_dilakukan_oleh}}
                                                        </td>
                                                    </tr>


                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Tempat Kejadian </td>
                                                        <td class="px-4 py-3">
                                                            {{ $data->insiden_ruangan->nama_insiden_ruangan}}

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Kronologi Kejadian</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->kronologi_kejadian}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Tindakan Segera Dilakukan</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->tindakan_segera_dilakukan}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Jenis Insiden</td>
                                                        <td class="px-4 py-3">

                                                            {{$data->insiden_jenis->nama_insiden_jenis}}

                                                        </td>
                                                    </tr>


                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Kategori Insiden</td>
                                                        <td class="px-4 py-3">
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                                    type="checkbox" wire:model="selectAll1">
                                                                <label
                                                                    class="form-check-label inline-block text-gray-800"
                                                                    for="flexCheckDefault">
                                                                    Pilih Semua
                                                                </label>
                                                            </div>

                                                            @foreach ($data_kategori as $item1)
                                                            <div class="form-check">
                                                                <input
                                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                                    type="checkbox" wire:model="selectedKategori"
                                                                    value="{{ $item1->id }}">
                                                                {{$item1->nama_insiden_kategori}}
                                                            </div>
                                                            @endforeach

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-span-6">

                                        </div>
                                        <button wire:click="store"
                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                class="fas fa-fw fa-save"></i>Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>