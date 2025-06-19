<div class="container px-6 md:container md:mx-auto mt-4">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-6 sm:px-0  justify-between text-center">
                    <h3 class="text-lg font-medium leading-8 text-gray-900">
                        Proses Approval Request
                    </h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <div class="w-full overflow-x-auto">
                                    <table class="min-w-full whitespace-no-wrap" wire:loading.remove>
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                                <th class="px-4 py-3">Parameter</th>
                                                <th class="px-4 py-3">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-gray-700 dark:text-gray-400">

                                                <td class="px-4 py-3">
                                                    Nomor PR</td>
                                                <td class="px-4 py-3">
                                                    {{ $nomor_pr }}
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">

                                                <td class="px-4 py-3">
                                                    Tgl Request</td>
                                                <td class="px-4 py-3">
                                                    {{ tgl_indo($tgl_request) }}
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">

                                                <td class="px-4 py-3">
                                                    Description</td>
                                                <td class="px-4 py-3">
                                                    {{ $description }}
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">

                                                <td class="px-4 py-3">
                                                    Vendor</td>
                                                <td class="px-4 py-3">
                                                    {{ $nama_vendor }}
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">

                                                <td class="px-4 py-3">
                                                    Grand Total</td>
                                                <td class="px-4 py-3">
                                                    {{ rupiah($grand_total) }}
                                                </td>
                                            </tr>
                                            <tr class="text-gray-700 dark:text-gray-400">

                                                <td class="px-4 py-3">
                                                    Requestor</td>
                                                <td class="px-4 py-3">
                                                    {{ get_nama_user($users_id) }}
                                                </td>
                                            </tr>
                                    </table>
                                </div>

                                <hr>
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">PPN
                                        11%</label>
                                    <input type="radio" wire:model.defer="ppn" value="Y" name="ppn"
                                        class="form-check-input"> Ya
                                    <input type="radio" wire:model.defer="ppn" value="N" name="ppn"
                                        class="form-check-input"> Tidak

                                    @error('aktif')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Request
                                        Status</label>
                                    <input type="radio" wire:model.defer="portal_status_id" value="5"
                                        name="portal_status_id" class="form-check-input"> Approve
                                    <input type="radio" wire:model.defer="portal_status_id" value="4"
                                        name="portal_status_id" class="form-check-input"> Reject

                                    @error('aktif')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Request
                                        Status</label>
                                    <select class="form-select form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none"
                                        aria-label="Default select example" name="portal_status_id"
                                        wire:model.defer="portal_status_id">
                                        <option value="">-- Status--</option>
                                        @foreach ($portal_request_status as $item)
                                        <option value="{{$item->id}}">{{$item->status_request}}</option>
                                        @endforeach
                                    </select>
                                    @error('portal_status_id')
                                    <div class="mb-2 text-sm text-red-700  rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium"></span>{{ $message }}
                                    </div>
                                    @enderror
                                </div> --}}
                                <div class="mb-5">
                                    <label for="exampleText0"
                                        class="mt-5 form-label inline-block mb-2 text-gray-700">Keterangan</label>
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