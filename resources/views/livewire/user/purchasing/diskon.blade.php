<div class="container px-6 md:container md:mx-auto mt-4">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-6 sm:px-0  justify-between text-center">
                    <h3 class="text-lg font-medium leading-8 text-gray-900">
                        Tambah Diskon
                    </h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Nomor
                                        PR</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="nomor_pr" wire:model.defer="nomor_pr"
                                        readonly>
                                    @error('nomor_pr')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Tanggal
                                        Request</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="tgl_request"
                                        wire:model.defer="tgl_request" readonly>
                                    @error('tgl_request')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Sub
                                        Total</label>
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="sub_total"
                                        wire:model.defer="sub_total" readonly>
                                    @error('sub_total')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Tambahan Diskon</label>
                                    {{-- <select class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="portal_vendor_id"
                                        wire:model.defer="portal_vendor_id">
                                        <option value="">-- K--</option>
                                        @foreach ($portal_vendor as $item)
                                        <option value="{{$item->id}}">{{$item->nama_vendor}}</option>
                                        @endforeach

                                    </select> --}}
                                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="diskon" wire:model.defer="diskon">
                                    @error('diskon')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0"
                                        class="form-label inline-block mb-2 text-gray-700">Tambahan Diskon</label>
                                    {{-- <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="description"
                                        wire:model.defer="description"> --}}
                                    <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="description"
                                        wire:model.defer="description" cols="30" rows="5" readonly></textarea>
                                    @error('description')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button wire:click="updateDiskon"
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