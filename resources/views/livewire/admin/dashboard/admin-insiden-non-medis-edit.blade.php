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
                                                            {{ $nomor_insiden }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Judul Insiden </td>
                                                        <td class="px-4 py-3">
                                                            <input type="text"
                                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                                aria-label="Default select example" name="judul_insiden"
                                                                wire:model.defer="judul_insiden">
                                                            @error('judul_insiden')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Tanggal Insiden </td>
                                                        <td class="px-4 py-3">
                                                            <input type="date"
                                                                class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                                aria-label="Default select example" name="tgl_insiden"
                                                                wire:model.defer="tgl_insiden">
                                                            @error('tgl_insiden')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Sudah Pernah Terjadi</td>
                                                        <td class="px-4 py-3">
                                                            <input type="radio" wire:model.defer="sudah_pernah_terjadi"
                                                                value="Y" name="sudah_pernah_terjadi"
                                                                class="form-check-input"> Tidak
                                                            <input type="radio" wire:model.defer="sudah_pernah_terjadi"
                                                                value="N" name="sudah_pernah_terjadi"
                                                                class="form-check-input"> Ya

                                                            @error('sudah_pernah_terjadi')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            Tempat Kejadian </td>
                                                        <td class="px-4 py-3">
                                                            <select
                                                                class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                                                aria-label="Default select example"
                                                                name="insiden_ruangan_id"
                                                                wire:model.defer="insiden_ruangan_id"
                                                                style="height: 110%">
                                                                <option value="">-- Pilih Ruangan-</option>
                                                                @foreach ($ruangan as $item)
                                                                <option value="{{$item->id}}">
                                                                    {{$item->nama_insiden_ruangan}}</option>
                                                                @endforeach

                                                            </select>

                                                            @error('insiden_ruangan_id')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror


                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Kronologi Kejadian</td>
                                                        <td class="px-4 py-3">
                                                            <textarea
                                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                                aria-label="Default select example"
                                                                name="kronologi_kejadian"
                                                                wire:model.defer="kronologi_kejadian" cols="30"
                                                                rows="5"></textarea>
                                                            @error('kronologi_kejadian')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Tindakan Segera Dilakukan</td>
                                                        <td class="px-4 py-3">
                                                            <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                                aria-label="Default select example"
                                                                name="tindakan_segera_dilakukan"
                                                                wire:model.defer="tindakan_segera_dilakukan" cols="30"
                                                                rows="5"></textarea>
                                                            @error('tindakan_segera_dilakukan')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror

                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Jenis Insiden</td>
                                                        <td class="px-4 py-3">
                                                            @foreach ($jenis as $r )
                                                            <input type="radio" wire:model.defer="insiden_jenis_id"
                                                                value="{{$r->id}}" name="insiden_jenis_id" title="{{$r->keterangan}}"
                                                                class="form-check-input"> {{$r->nama_insiden_jenis}}
                                                            @endforeach


                                                            @error('insiden_jenis_id')
                                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                role="alert">
                                                                <span class="font-medium"></span>{{ $message }}
                                                            </div>
                                                            @enderror
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