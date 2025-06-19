<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container px-6 md:container md:mx-auto mt-4">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-1 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-6 sm:px-0  justify-between text-center">
                        <h3 class="text-lg font-medium leading-8 text-gray-900">
                            Update Data Pelatihan
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
                                            class="form-label inline-block mb-2 text-gray-700">Nama
                                            Pelatihan</label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="nama_pelatihan"
                                            wire:model.defer="nama_pelatihan">
                                        @error('nama_pelatihan')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Jenis
                                            Pelatihan</label>
                                        <select
                                            class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="pelatihan_jenis_id"
                                            wire:model.defer="pelatihan_jenis_id">
                                            <option selected>-- Pilih Jenis Pelatihan --</option>
                                            @foreach ($pelatihan_jenis as $master)
                                                <option value="{{ $master->id }}">{{ $master->nama_kelas_jenis }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pelatihan_jenis_id')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Skill
                                            Pelatihan</label>
                                        <select
                                            class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                            focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="pelatihan_skill_id"
                                            wire:model.defer="pelatihan_skill_id">
                                            <option selected>-- Pilih Skill Pelatihan --</option>
                                            @foreach ($pelatihan_skill as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->nama_kelas_skill }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pelatihan_skill_id')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Total
                                            Jam</label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="total_jam"
                                            wire:model.defer="total_jam">
                                        @error('total_jam')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Keterangan</label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="keterangan"
                                            wire:model.defer="keterangan">
                                        @error('keterangan')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Limit
                                            Akses</label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="limit_akses"
                                            wire:model.defer="limit_akses">
                                        @error('limit_akses')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Total
                                            Bobot</label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="total_bobot"
                                            wire:model.defer="total_bobot">
                                        @error('total_bobot')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Kelulusan</label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="kelulusan"
                                            wire:model.defer="kelulusan">
                                        @error('kelulusan')
                                            <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                                role="alert">
                                                <span class="font-medium"></span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <h3 class="mt-4 text-lg font-medium leading-8 text-gray-900">
                                        Kegiatan
                                    </h3>
                                    <hr>
                                    <table class="mt-4 w-full table-auto">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pelatihan Kegiatan</th>
                                                <th>Aktifkan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Pre Tes</td>
                                                <td> <input type="radio" wire:model.defer="pretes" value="Y"
                                                        name="pretes" class="form-check-input"> Ya
                                                    <input type="radio" wire:model.defer="pretes" value="N"
                                                        name="pretes" class="form-check-input"> Tidak
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Materi</td>
                                                <td><input type="radio" wire:model.defer="materi" value="Y"
                                                        name="materi" class="form-check-input"> Ya
                                                    <input type="radio" wire:model.defer="materi" value="N"
                                                        name="materi" class="form-check-input"> Tidak
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Post Tes </td>
                                                <td><input type="radio" wire:model.defer="postes" value="Y"
                                                        name="postes" class="form-check-input"> Ya
                                                    <input type="radio" wire:model.defer="postes" value="N"
                                                        name="postes" class="form-check-input"> Tidak
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Sertifikat</td>
                                                <td><input type="radio" wire:model.defer="sertifikat"
                                                        value="Y" name="sertifikat" class="form-check-input"> Ya
                                                    <input type="radio" wire:model.defer="sertifikat"
                                                        value="N" name="sertifikat" class="form-check-input">
                                                    Tidak
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Random Soal </td>
                                                <td><input type="radio" wire:model.defer="random_soal"
                                                        value="Y" name="random_soal" class="form-check-input">
                                                    Ya
                                                    <input type="radio" wire:model.defer="random_soal"
                                                        value="N" name="random_soal" class="form-check-input">
                                                    Tidak
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Sub Pelatihan </td>
                                                <td><input type="radio" wire:model.defer="subpelatihan"
                                                        value="Y" name="subpelatihan" class="form-check-input">
                                                    Ya
                                                    <input type="radio" wire:model.defer="subpelatihan"
                                                        value="N" name="subpelatihan" class="form-check-input">
                                                    Tidak
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <button wire:click="store"
                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                        class="fas fa-fw fa-save"></i>Update Data</button>
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

</div>
