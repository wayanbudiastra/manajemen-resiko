<div class="container px-6 md:container md:mx-auto mt-4">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-6 sm:px-0  justify-between text-center">
                    <h3 class="text-lg font-medium leading-8 text-gray-900">
                        Edit Data
                    </h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Nama
                                        Vendor</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="nama_vendor"
                                        wire:model.defer="nama_vendor">
                                    @error('nama_vendor')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Telephone</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="telephone"
                                        wire:model.defer="telephone">
                                    @error('telephone')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Faximile</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="faximile" wire:model.defer="faximile">
                                    @error('faximile')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Person
                                        Incharge</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="person_incharge"
                                        wire:model.defer="person_incharge">
                                    @error('person_incharge')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Hand
                                        Phone</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="handphone"
                                        wire:model.defer="handphone">
                                    @error('handphone')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Email</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="email" wire:model.defer="email">
                                    @error('email')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Vendor
                                        Purchasing</label>
                                    <input type="radio" wire:model.defer="vendor_purchasing" value="Y"
                                        name="vendor_purchasing" class="form-check-input"> Ya
                                    <input type="radio" wire:model.defer="vendor_purchasing" value="N"
                                        name="vendor_purchasing" class="form-check-input"> Tidak

                                    @error('vendor_purchasing')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Aktif</label>
                                    <input type="radio" wire:model.defer="aktif" value="Y" name="aktif"
                                        class="form-check-input"> Ya
                                    <input type="radio" wire:model.defer="aktif" value="N" name="aktif"
                                        class="form-check-input"> Tidak

                                    @error('aktif')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
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