<div>

    <div class="container px-6 mx-auto md:container md:mx-auto mt-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class=" my-6 text-2xl font-semibold text-gray-700
            dark:text-gray-200">
                DATA SERTIFIKAT PELATIHAN
            </h2>
            <div class="col-md-12">
                <div class="card">
                    <div>
                        @if (session()->has('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                            role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}
                        </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            <span class="font-medium">Danger alert!</span> {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    {{-- <button wire:click="add"
                        class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                            class="fas fa-fw fa-plus"></i>Tambah</button> --}}
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap" wire:loading.remove>
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Nama Pelatihan</th>
                                        <th class="px-4 py-3">Nama Peserta</th>
                                        <th class="px-4 py-3">Kelas </th>

                                        <th class="px-4 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $dd)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <th class="px-4 py-3">{{ $no++ }}</th>
                                        <td class="px-4 py-3">{{ $dd->lokasi }}</td>
                                        <td class="px-4 py-3">{{ $dd->nama_user }}</td>
                                        <td class="px-4 py-3">{{
                                            $dd->pelatihan_user->pelatihan->kelas_jenis->nama_kelas_jenis }}</td>
                                        </td>


                                        <td class="px-4 py-3">
                                            <a href="{{ url('/pelatihan-user-sertifikat-view/' . $dd->pelatihan_user_id) }}"
                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                                                target="_BLANK"><i class="fas fa-fw fa-eye"></i>View
                                                Sertifikat</a>
                                            {{-- <button wire:click="view_sertifikat({{$param}})"
                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                                <i class="fas fa-fw fa-eye"></i>View
                                                Sertifikat</button> --}}
                                            <button wire:click="edit_sertifikat({{$dd->id}})"
                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                                <i class="fas fa-fw fa-pencil"></i>Edit
                                                Sertifikat</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th>No Results</th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- Modal -->
                </div>
            </div>

        </div>
    </div>

</div>