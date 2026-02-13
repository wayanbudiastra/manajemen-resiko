<div class="container px-6 md:container md:mx-auto mt-4">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-6 sm:px-0  justify-between text-center">
                    <h3 class="text-lg font-medium leading-8 text-gray-900">
                        Tambah Data Resiko Unit
                    </h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Aktivitas Kerja</label>
                                    <input type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="aktivitas_kerja"
                                        wire:model.defer="aktivitas_kerja">
                                    @error('aktivitas_kerja')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Resiko</label>
                                    <input type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="resiko"
                                        wire:model.defer="resiko">
                                    @error('resiko')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Kategori Resiko</label>

                                    <select
                                        class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                        aria-label="Default select example" name="risk_kategori_id"
                                        wire:model.defer="risk_kategori_id" style="height: 110%">
                                        <option value="">-- Pilih Resiko-</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_kategori }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('risk_kategori_id')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                 <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Akar
                                        Masalah</label>
                                    <textarea rows="6"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="akar_masalah" wire:model.defer="akar_masalah"></textarea>

                                    @error('akar_masalah')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                 <div class="mb-3 mt-5">
                                    <div class="flex space-x-2">
                                        <label for="exampleText0"
                                            class="form-control w-1/2 inline-block mb-2 text-gray-700">Inherent Risk Frekuensi</label>

                                            <label for="exampleText0"
                                            class="form-control w-1/2 inline-block mb-2 text-gray-700">Inherent Risk Dampak</label>
                                    </div>
                                        <div class="flex space-x-2">
                                            <input type="text" placeholder="F"
                                                class="form-control w-1/2 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                name="matrik_kontrol_f" wire:model.defer="matrik_kontrol_f">
                                            @error('matrik_kontrol_f')
                                                <div class="mb-2 text-sm text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                    role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                           <input type="text" placeholder="D"
                                                class="form-control w-1/2 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                name="matrik_kontrol_d" wire:model.defer="matrik_kontrol_d">
                                            @error('matrik_kontrol_d')
                                                <div class="mb-2 text-sm text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                    role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                       
                                    </div>


                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Dampak Resiko</label>
                                    <textarea rows="6"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="efek_resiko" wire:model.defer="efek_resiko"></textarea>

                                    @error('efek_resiko')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                    <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Pengendalian Saat Ini</label>
                                    <textarea rows="6"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="pengendalian_saat_ini" wire:model.defer="pengendalian_saat_ini"></textarea>

                                    @error('pengendalian_saat_ini')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

 <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Jadwal Pelaksanaan</label>
                                    <input type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="target_waktu"
                                        wire:model.defer="target_waktu">
                                    @error('target_waktu')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                  <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700"> Treatment Risk </label>

                                    <select
                                        class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                        aria-label="Default select example" name="risk_evaluasi_id"
                                        wire:model.defer="risk_evaluasi_id" style="height: 110%">
                                        <option value="">-- Pilih Evaluasi Resiko-</option>
                                        @foreach ($evaluasi as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_evaluasi }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('risk_evaluasi_id')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                        <div class="flex space-x-2">
                                        <label for="exampleText0"
                                            class="form-control w-1/2 inline-block mb-2 text-gray-700">Matrik Residual Frekuensi</label>

                                            <label for="exampleText0"
                                            class="form-control w-1/2 inline-block mb-2 text-gray-700">Matrik Residual Dampak</label>
                                    </div>
                                        <div class="flex space-x-2">
                                            <input type="text" placeholder="F"
                                                class="form-control w-1/2 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out   focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                name="matrik_monitoring_f" wire:model.defer="matrik_monitoring_f">
                                            @error('matrik_monitoring_f')
                                                <div class="mb-2 text-sm text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                    role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <input type="text" placeholder="D"
                                                class="form-control w-1/2 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out  focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                                name="matrik_monitoring_d" wire:model.defer="matrik_monitoring_d">
                                            @error('matrik_monitoring_d')
                                                <div class="mb-2 text-sm text-red-700 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                    role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                       
                                    </div>

                                 <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Rencana
                                        Tindak Lanjut</label>
                                    <textarea rows="6"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="rencana_tindak_lanjut" wire:model.defer="rencana_tindak_lanjut"></textarea>

                                    @error('rencana_tindak_lanjut')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Penanggung Jawab</label>
                                    <input type="text"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="penanggung_jawab"
                                        wire:model.defer="penanggung_jawab">
                                    @error('penanggung_jawab')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                               
                               

                              
                    
                                    

                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Kondisi Saat ini</label>
                                        <textarea rows="6"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="laporan_singkat" wire:model.defer="laporan_singkat"></textarea>

                                        @error('laporan_singkat')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Tanggal Deadline</label>
                                    <input type="date"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="tgl_deadline"
                                        wire:model.defer="tgl_deadline">
                                    @error('tgl_deadline')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                    <button wire:click="store"
                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                            class="fas fa-fw fa-save"></i>Simpan Data</button>
                                    <button wire:click="kembali"
                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                            class="fas fa-fw fa-arrow-right"></i>Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
