{{-- <div class="container px-6 md:container md:mx-auto mt-4"> --}}
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="col-md-12">
            <div class="card">

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="md:col-span-1">
                            <div class="px-6 sm:px-0  justify-between text-center">
                                <h3 class="text-lg font-medium leading-8 text-gray-900">
                                    Add Data Item
                                </h3>
                            </div>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6">
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Item Name</label>
                                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="nama_barang"
                                            wire:model.defer="nama_barang">
                                        @error('nama_barang')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Kategori</label>
                                        <select class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="portal_request_kategori_id"
                                            wire:model.defer="portal_request_kategori_id">
                                            <option value="">-- Kategori--</option>
                                            @foreach ($portal_request_kategori as $item)
                                            <option value="{{$item->id}}">{{$item->nama_request_kategori}}</option>
                                            @endforeach

                                        </select>
                                        @error('portal_request_kategori_id')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Qty</label>
                                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="qty" wire:model.defer="qty">
                                        @error('qty')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Price</label>
                                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="harga_satuan"
                                            wire:model.defer="harga_satuan">
                                        @error('harga_satuan')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Discount</label>
                                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="discount"
                                            wire:model.defer="discount">
                                        @error('discount')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleText0"
                                            class="form-label inline-block mb-2 text-gray-700">Note</label>
                                        {{-- <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                    focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="description"
                                            wire:model.defer="description"> --}}
                                        <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                            aria-label="Default select example" name="keterangan"
                                            wire:model.defer="keterangan" cols="30" rows="5"></textarea>
                                        @error('keterangan')
                                        <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium"></span>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div>
                                    <button wire:click="store"
                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                            class="fas fa-fw fa-save"></i>save</button>
                                    <button wire:click="batal"
                                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                            class="fas fa-fw fa-arrow-right"></i>back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>