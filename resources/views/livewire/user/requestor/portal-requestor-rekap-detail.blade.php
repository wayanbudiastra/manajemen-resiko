<div>
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="container px-6 mx-auto md:container md:mx-auto ">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"> --}}
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

                                                <div
                                                    class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                                    {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                                        --}}
                                                        <h2 class=" my-6 text-2xl font-semibold text-gray-700">Data
                                                            Purchase Request
                                                        </h2>
                                                        <div class="w-full overflow-x-auto">
                                                            <table class="min-w-full whitespace-no-wrap"
                                                                wire:loading.remove>
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
                                                                            {{ $data->nomor_pr }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Tgl Request</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ tgl_indo($data->tgl_request) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                                        <td class="px-4 py-3">
                                                                            Description</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $data->description }}
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

                                                            </table>
                                                        </div>


                                                        <button wire:click="kembali"
                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                class="fas fa-fw fa-arrow-right"></i>Kembali</button>

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
                                                        <div class="w-full overflow-x-auto mt-5">
                                                            <table class="min-w-full whitespace-no-wrap"
                                                                wire:loading.remove>
                                                                <thead>
                                                                    <tr
                                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                        <th class="px-4 py-3">No</th>
                                                                        <th class="px-4 py-3">Catagory</th>
                                                                        <th class="px-4 py-3">Item Price</th>
                                                                        <th class="px-4 py-3">Price</th>
                                                                        <th class="px-4 py-3">Qty</th>
                                                                        <th class="px-4 py-3">Discount %</th>
                                                                        <th class="px-4 py-3">Net Price</th>
                                                                        <th class="px-4 py-3">Total Price</th>
                                                                        <th class="px-4 py-3">Note</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($data_detail as $item)
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class="px-4 py-3">
                                                                            {{ $no++ }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{
                                                                            $item->portal_request_kategori->nama_request_kategori
                                                                            }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $item->nama_barang }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ rupiah($item->harga_satuan) }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $item->qty }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $item->discount }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ rupiah($item->harga_net) }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ rupiah($item->total_harga) }}</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $item->keterangan }}</td>


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
                                    {{--
                                </div> --}}