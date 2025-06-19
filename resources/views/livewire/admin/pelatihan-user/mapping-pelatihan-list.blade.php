<div>
    <div class="container px-6 mx-auto md:container md:mx-auto mt-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class=" my-6 text-2xl font-semibold text-gray-700
            dark:text-gray-200">
                DATA PELATIHAN - USER MAPPING
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
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap" wire:loading.remove>
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">#Id</th>
                                        <th class="px-4 py-3">Nama Pelatihan</th>
                                        <th class="px-4 py-3">Jenis Pelatihan</th>
                                        <th class="px-4 py-3 text-center">Pelatihan Skill </th>
                                        <th class="px-4 py-3">Total Jam</th>
                                        <th class="px-4 py-3">Bobot/ Kelulusan </th>
                                        <th class="px-4 py-3">Jumlah User</th>
                                        <th class="px-4 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $dd)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <th class="px-4 py-3">{{ $no++ }}</th>
                                            <td class="px-4 py-3">{{ $dd->nama_pelatihan }}</td>
                                            <td class="px-4 py-3">{{ $dd->kelas_jenis->nama_kelas_jenis }}</td>
                                            <td class="px-4 py-3">{{ $dd->kelas_skill->nama_kelas_skill }}</td>
                                            <td class="px-4 py-3">{{ $dd->total_jam }}</td>
                                            <td class="px-4 py-3">{{ $dd->total_bobot }}/({{ $dd->kelulusan }})</td>
                                            <td class="px-4 py-3">
                                                {{ get_total_user($dd->id) }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <button wire:click="lanjut({{ $dd->id }})"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-lg active:bg-yellow-400 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-red"><i
                                                        class="fas fa-fw fa-arrow-right"></i>Setup</button>
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
                        <div class="px-4 py-3 mb-5 mt-5 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        </div>
                    </div>

                    <!-- Modal -->
                </div>
            </div>

        </div>
    </div>

</div>
