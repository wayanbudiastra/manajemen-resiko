<div>
    @if ($modeAddPdf == true)
        @include('livewire.admin.pelatihan-materi.tambah-pdf')
    @elseif($modeAddVideo == true)
        @include('livewire.admin.pelatihan-materi.tambah-video')
    @else
        <div class="flex flex-col">
            <div class="w-full overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="container px-6 mx-auto md:container md:mx-auto ">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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
                                <div class="overflow-x-auto">
                                    <div class="w-full p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <div class="flex flex-col">
                                            <div
                                                class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                                {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                                                <h2 class=" my-6 text-2xl font-semibold text-gray-700">Data Pelatihan
                                                </h2>
                                                <div class="w-full overflow-x-auto">
                                                    <table class="min-w-full whitespace-no-wrap" wire:loading.remove>
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                                                <th class="px-4 py-3">Paramter</th>
                                                                <th class="px-4 py-3">Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3">
                                                                    Nama Pelatihan</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $nama_pelatihan }}
                                                                </td>
                                                            </tr>
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <td class="px-4 py-3">
                                                                    jenis Pelatihan</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $jenis_pelatihan }}
                                                                </td>
                                                            </tr>
                                                            <tr class="text-gray-700 dark:text-gray-400">

                                                                <td class="px-4 py-3">
                                                                    Skill Pelatihan</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $pelatihan_skill }}
                                                                </td>
                                                            </tr>
                                                            <tr class="text-gray-700 dark:text-gray-400">

                                                                <td class="px-4 py-3">
                                                                    Total Jam / Limit Akses</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $total_jam }}/({{ $limit_akses }})
                                                                </td>
                                                            </tr>
                                                            <tr class="text-gray-700 dark:text-gray-400">

                                                                <td class="px-4 py-3">
                                                                    Total Bobot / Kelulusan</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $total_bobot }}/({{ $kelulusan }})
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <h2 class=" my-6 text-2xl font-semibold text-gray-700">Data User
                                                </h2>
                                                <button wire:click="addPdf"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                        class="fas fa-fw fa-plus"></i>Materi Pdf</button>
                                                <button wire:click="addVideo"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                        class="fas fa-fw fa-arrow-up"></i>Materi Video</button>
                                                <button wire:click="kembali_index({{ $param }})"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                        class="fas fa-fw fa-arrow-left"></i>Kembali</button>
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
                                                    <table class="min-w-full whitespace-no-wrap" wire:loading.remove>
                                                        <thead>
                                                            <tr
                                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">No</th>
                                                                <th class="px-4 py-3">Nama Materi</th>
                                                                <th class="px-4 py-3">Type Materi</th>
                                                                <th class="px-4 py-3">Sumber Data</th>
                                                                <th class="px-4 py-3">File</th>
                                                                <th class="px-4 py-3">Aktif</th>
                                                                <th class="px-4 py-3">Manage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $item)
                                                                <tr class="text-gray-700 dark:text-gray-400">
                                                                    <td class="px-4 py-3">
                                                                        {{ $no++ }}</td>
                                                                    <td class="px-4 py-3">
                                                                        {{ $item->nama_materi }}</td>
                                                                    <td class="px-4 py-3">
                                                                        {{ $item->materi_type->nama_materi_type }}</td>
                                                                    <td class="px-4 py-3">
                                                                        {{ $item->sumber_data }}</td>
                                                                    <td class="px-4 py-3">
                                                                        <a href="#"
                                                                            wire:click="view_materi({{ $item->id }})"
                                                                            title="View Materi">{{ $item->sumber_daya }}</a>
                                                                    </td>
                                                                    <td class="px-4 py-3">
                                                                        {{ $item->aktif }}</td>
                                                                    <td class="px-4 py-3">

                                                                        <button
                                                                            onclick="return confirm('Apakah yakin akan menghapus data ini?') || event.stopImmediatePropagation();"
                                                                            wire:click="delete({{ $item->id }})"
                                                                            class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                                class="fas fa-fw fa-trash"></i>delete</button>
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
    @endif
</div>

{{-- </div> --}}
