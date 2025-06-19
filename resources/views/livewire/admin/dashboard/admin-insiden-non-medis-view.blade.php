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
                                        Data Insiden Non Medis
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
                                                            Unit Terkait</td>
                                                        <td class="px-4 py-3">
                                                            @foreach (get_unit_non_medis($data->id) as $dd )
                                                            {{$dd->insiden_unit->nama_insiden_unit}}
                                                            <br>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Dampak</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->insiden_dampak->nama_insiden_dampak}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Kategori Insiden</td>
                                                        <td class="px-4 py-3">
                                                            @foreach (get_kategori_non_medis($data->id) as $dd )
                                                            {{$dd->insiden_kategori->nama_insiden_kategori}}
                                                            <br>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Grade</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->insiden_grade->nama_insiden_grade}}

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Frekuensi</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->insiden_frekuensi->nama_insiden_frekuensi}}

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Scroring Insiden</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->score_insiden}}

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">

                                                            Akar Masalah
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{$data->akar_masalah = 'Y' ? '5 WHYS':'RCA'}}

                                                             <br>
                                                        @if ($data->dokument_upload != "")
                                                            <a href="{{url('admin-non-medis-dokument/'. $param )}}" target="_BLANK"><u><p class="text-blue-600">Lihat Dokument</p></u></a>
                                                        @endif

                                                        </td>
                                                    </tr>

                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Akar Masalah Lengkap</td>
                                                        <td class="px-4 py-3">

                                                            {{$data->akar_masalah_lengkap}}

                                                        </td>
                                                    </tr>

                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Rencana Tindak Lanjut</td>
                                                        <td class="px-4 py-3">
                                                            {{$data->rencana_tindak_lanjut}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Deadline</td>
                                                        <td class="px-4 py-3">
                                                            {{tgl_indo($data->deadline)}}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            PIC Insiden</td>
                                                        <td class="px-4 py-3">
                                                            {{get_nama_user($data->pic_insiden_users_id)}}
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-span-6">


                                        </div>
                                        @if ($data->insiden_status_id=='2')
                                        <button
                                            onclick="return confirm('Apakah yakin akan posting insiden request ini?') || event.stopImmediatePropagation();"
                                            wire:click="posting"
                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                class="fas fa-fw fa-save"></i> Closing </button>
                                       
                                         
                                                <button
                                                onclick="return confirm('Apakah yakin akan Pending insiden request ini?') || event.stopImmediatePropagation();"
                                                wire:click="pending"
                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow"><i
                                                    class="fas fa-fw fa-exclamation-triangle"></i> Pending </button>
    
                                                     <button
                                                onclick="return confirm('Apakah yakin akan membatalkan insiden request ini?') || event.stopImmediatePropagation();"
                                                wire:click="cencel"
                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                    class="fas fa-fw fa-close"></i> Cencel </button>
                                        @endif
                                        @if ($data->insiden_status_id=='4')
                                        <button
                                            onclick="return confirm('Apakah yakin akan open kembali insiden request ini?') || event.stopImmediatePropagation();"
                                            wire:click="unposting"
                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                class="fas fa-fw fa-save"></i> Open </button>
                                        @endif


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>