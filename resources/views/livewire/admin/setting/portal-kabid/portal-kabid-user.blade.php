<div class="container px-6 md:container md:mx-auto mt-4">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-6 sm:px-0  justify-between text-center">
                    <h3 class="text-lg font-medium leading-8 text-gray-900">
                        Tambah Data - User
                    </h3>
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
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Nama
                                        Kabid</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="nama_kabid"
                                        wire:model.defer="nama_kabid" readonly>
                                    @error('nama_kabid')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Pilih
                                        User</label>
                                    <select class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="users_id" wire:model.defer="users_id">
                                        <option selected value="">-- Pilih User--</option>
                                        @foreach ($data_user as $item)
                                        <option value="{{$item->id}}">{{$item->first_name}} {{ $item->last_name}}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('users_id')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <button wire:click="store"
                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                    class="fas fa-fw fa-save"></i>Simpan Data</button>
                            <button wire:click="kembali"
                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                    class="fas fa-fw fa-arrow-right"></i>Kembali</button>
                        </div>


                        <div class="w-full overflow-x-auto mt-5">
                            <table class="min-w-full whitespace-no-wrap" wire:loading.remove>
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Nik</th>
                                        <th class="px-4 py-3">Nama </th>
                                        <th class="px-4 py-3">Unit</th>
                                        <th class="px-4 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_detail as $item)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            {{ $no++ }}</td>
                                        <td class="px-4 py-3">
                                            {{ $item->user->nik }}</td>
                                        <td class="px-4 py-3">
                                            {{ $item->user->first_name }}
                                            {{ $item->user->last_name }} </td>
                                        <td class="px-4 py-3">
                                            {{ $item->user->unit->nama_unit }}</td>

                                        <td>
                                            <button
                                                onclick="return confirm('Apakah yakin akan unmapping user ini?') || event.stopImmediatePropagation();"
                                                wire:click="delete({{$item->id}})"
                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                    class="fas fa-fw fa-trash"></i>hapus</button>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>