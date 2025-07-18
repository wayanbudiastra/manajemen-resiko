<div>
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

                            <div class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                                <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                    Data Profil Resiko Unit
                                </h2>

                                <div class="mt-5 relative w-full max-w-xl mr-6 focus-within:text-green-500">
                                    <div class="absolute inset-y-0 flex items-center pl-2">
                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input
                                        class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-green-300 focus:outline-none focus:shadow-outline-green form-input"
                                        type="text" placeholder="Cari Profile Resiko" aria-label="Search"
                                        wire:model="src" />
                                    <div class="col" wire:loading>
                                        <div role="status">
                                            <svg class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                <div class="w-full overflow-x-auto mt-5 mb-5">
                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                        <div class="flex w-1/2 space-x-2 items-start">
                                            <!-- Select: Lebar 75% -->
                                            <select
                                                class="form-select form-control w-3/4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                                name="grade_selected" wire:model.defer="grade_selected">
                                                <option value="">Pilih Grading</option>
                                                @foreach ($master_grade as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_grade }}</option>
                                                @endforeach
                                            </select>

                                            <!-- Tombol: Lebar 25% -->
                                            <button wire:click="pilih_grade"
                                                class="w-1/4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                                <i class="fas fa-fw fa-search-plus"></i> Cek Data
                                            </button>

                                            <button wire:click="kembali"
                                                class="w-1/4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                                <i class="fas fa-fw fa-book"></i> kembali
                                            </button>
                                        </div>
                                    </div>
                                    <table
                                        class="mt-5 table-auto w-full border border-gray-200 text-left text-sm text-gray-700p"
                                        wire:loading.remove>
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">No</th>
                                                <th class="px-4 py-3">Unit Kerja</th>
                                                <th class="px-4 py-3">Aktivitas Kerja</th>
                                                <th class="px-4 py-3">Kategori Resiko</th>
                                                <th class="px-4 py-3">Kontrol</th>
                                                <th class="px-4 py-3">Resiko</th>
                                                <th class="px-4 py-3">Akar Masalah</th>
                                                <th class="px-4 py-3">Tindak Lanjut</th>
                                                <th class="px-4 py-3">Penanggung jawab</th>
                                                <th class="px-4 py-3">Evaluasi</th>
                                                <th class="px-4 py-3">Aktif</th>
                                                <th class="px-4 py-3">Laporan Singkat</th>
                                                <th class="px-4 py-3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        {{ $no++ }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->unit->nama_insiden_unit }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->aktivitas_kerja }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->risk_kategori->nama_kategori }}
                                                    </td>

                                                    <td class="px-4 py-3">
                                                        @if ($item->matrik_kontrol_grade == 1)
                                                            <div
                                                                class="bg-green-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Sangat Rendah <br> {{ $item->matrik_kontrol_rpn }}
                                                            </div>
                                                        @elseif($item->matrik_kontrol_grade == 2)
                                                            <div
                                                                class="bg-blue-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Rendah <br> {{ $item->matrik_kontrol_rpn }}
                                                            </div>
                                                        @elseif($item->matrik_kontrol_grade == 3)
                                                            <div
                                                                class="bg-yellow-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Sedang <br> {{ $item->matrik_kontrol_rpn }}
                                                            </div>
                                                        @elseif($item->matrik_kontrol_grade == 4)
                                                            <div
                                                                class="bg-orange-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Tinggi <br> {{ $item->matrik_kontrol_rpn }} </div>
                                                        @elseif($item->matrik_kontrol_grade == 5)
                                                            <div
                                                                class="bg-red-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Sangat Tinggi <br> {{ $item->matrik_kontrol_rpn }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->resiko }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->akar_masalah }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->rencana_tindak_lanjut }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->penanggung_jawab }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        @if ($item->matrik_monitoring_grade == 1)
                                                            <div
                                                                class="bg-green-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Sangat Rendah <br> {{ $item->matrik_monitoring_rpn }}
                                                            </div>
                                                        @elseif($item->matrik_monitoring_grade == 2)
                                                            <div
                                                                class="bg-blue-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Rendah <br> {{ $item->matrik_monitoring_rpn }}
                                                            </div>
                                                        @elseif($item->matrik_monitoring_grade == 3)
                                                            <div
                                                                class="bg-yellow-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Sedang <br>{{ $item->matrik_monitoring_rpn }}
                                                            </div>
                                                        @elseif($item->matrik_monitoring_grade == 4)
                                                            <div
                                                                class="bg-orange-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Tinggi <br> {{ $item->matrik_monitoring_rpn }} </div>
                                                        @elseif($item->matrik_monitoring_grade == 5)
                                                            <div
                                                                class="bg-red-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                Sangat Tinggi <br> {{ $item->matrik_monitoring_rpn }}
                                                            </div>
                                                        @endif
                                                    </td>


                                                    <td class="px-4 py-3">
                                                        {{ $item->aktif }} </td>
                                                    <td class="px-4 py-3">
                                                        {{ $item->laporan_singkat }} </td>
                                                    <td class="px-4 py-2 border text-center whitespace-nowrap">
                                                        <button wire:click="edit({{ $item->id }})"
                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-sky-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                class="fas fa-fw fa-pencil"></i>Edit
                                                        </button>
                                                        <button wire:click="grade({{ $item->id }})"
                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-pink-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                class="fas fa-fw fa-box"></i>Grading
                                                        </button>
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

                        {{--
                            </div> --}}
