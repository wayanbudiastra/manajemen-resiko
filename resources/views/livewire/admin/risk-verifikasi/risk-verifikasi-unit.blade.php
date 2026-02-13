<div>   
        <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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

                                <div class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                                    {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                                    <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                        Data Profil Resiko Unit
                                    </h2>

                                  
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
                                   <button wire:click="kembali"
                                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                    class="fas fa-fw fa-arrow-up"></i>Kembali
                                                            </button>
                                    <div class="w-full overflow-x-auto mt-5">

                                        <table
                                            class="table-auto w-full border border-gray-200 text-left text-sm text-gray-700p"
                                            wire:loading.remove>
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="px-4 py-3">No</th>
                                                     <th class="px-4 py-3">Unit Kerja</th>
                                                    <th class="px-4 py-3">Aktivitas Kerja</th>
                                                    <th class="px-4 py-3">Kategori Resiko</th>
                                                    <th class="px-4 py-3">Kontrol</th>
                                                    <th class="px-4 py-3">Resiko</th>
                                                    <th class="px-4 py-3">Akar Masalah</th>
                                                    <th class="px-4 py-3">Tindak Lanjut</th>
                                                    <th class="px-4 py-3">Penanggung jawab</th>
                                                    <th class="px-4 py-3">Evaluasi</th>
                                                    <th class="px-4 py-3">Aktif</th>
                                                     <th class="px-4 py-3">Laporan Singkat</th>
                                                    <th class="px-4 py-3">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                       <td class="px-4 py-3">
                                                            {{ $no++ }}</td>
                                                             <td class="px-4 py-3">
                                                            {{ $item->unit->nama_insiden_unit }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->aktivitas_kerja }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->risk_kategori->nama_kategori }}
                                                        </td>
                                                        
                                                        <td class="px-4 py-3">
                                                            @if ($item->matrik_kontrol_grade == 1)
                                                                <div
                                                                    class="bg-green-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sangat Rendah <br> {{$item->matrik_kontrol_rpn}} </div>
                                                            @elseif($item->matrik_kontrol_grade == 2)
                                                                <div
                                                                    class="bg-yellow-400 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Rendah <br> {{$item->matrik_kontrol_rpn}}
                                                                </div>
                                                            @elseif($item->matrik_kontrol_grade == 3)
                                                                <div
                                                                    class="bg-orange-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sedang <br> {{$item->matrik_kontrol_rpn}}
                                                                </div>
                                                            @elseif($item->matrik_kontrol_grade == 4)
                                                                <div
                                                                    class="bg-red-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Tinggi <br> {{$item->matrik_kontrol_rpn}} </div>
                                                            @elseif($item->matrik_kontrol_grade == 5)
                                                                <div
                                                                    class="bg-red-900 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sangat Tinggi <br> {{$item->matrik_kontrol_rpn}} </div>
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->resiko }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->akar_masalah }}</td>
                                                             <td class="px-4 py-3">
                                                            {{ $item->rencana_tindak_lanjut }}
                                                        </td>
                                                         <td class="px-4 py-3">
                                                            {{ $item->penanggung_jawab }}
                                                        </td>
                                                            <td class="px-4 py-3">
                                                            @if ($item->matrik_monitoring_grade == 1)
                                                                <div
                                                                    class="bg-green-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sangat Rendah <br> {{$item->matrik_monitoring_rpn}} </div>
                                                            @elseif($item->matrik_monitoring_grade == 2)
                                                                <div
                                                                    class="bg-yellow-400 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Rendah <br> {{$item->matrik_monitoring_rpn}}
                                                                </div>
                                                            @elseif($item->matrik_monitoring_grade == 3)
                                                                <div
                                                                    class="bg-orange-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sedang <br>{{$item->matrik_monitoring_rpn}}
                                                                </div>
                                                            @elseif($item->matrik_monitoring_grade == 4)
                                                                <div
                                                                    class="bg-red-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Tinggi <br> {{$item->matrik_monitoring_rpn}} </div>
                                                            @elseif($item->matrik_monitoring_grade == 5)
                                                                <div
                                                                    class="bg-red-900 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sangat Tinggi <br> {{$item->matrik_monitoring_rpn}} </div>
                                                            @endif
                                                        </td>
                                                        

                                                        <td class="px-4 py-3">
                                                         {{ $item->aktif }}  </td>
                                                          <td class="px-4 py-3">
                                                         {{ $item->laporan_singkat }}  </td>
                                                        <td class="px-4 py-2 border text-center whitespace-nowrap">
                                                            <button onclick="confirmAktif({{ $item->id }})"
                                                                class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-sky-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                                    class="fas fa-fw fa-pencil"></i>Aktifkan
                                                            </button>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                </div>
 
</div>

{{--
                            </div> --}}

                             @push('scripts')
                        <script>
                            function confirmAktif(id) {
                                Swal.fire({
                                    title: 'Yakin ingin aktivasi data?',
                                    text: 'Data Resiko Unit akan di aktifkan.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    buttonsStyling: false, // Penting: agar class kustom Tailwind digunakan
                                    confirmButtonText: 'Ya',
                                    cancelButtonText: 'Batal',
                                    customClass: {
                                        popup: 'rounded-xl shadow-lg',
                                        title: 'text-lg font-bold text-gray-800',
                                        htmlContainer: 'text-sm text-gray-600',
                                        confirmButton: 'bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none',
                                        cancelButton: 'bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 ml-2 focus:outline-none'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        Livewire.emit('aktifConfirmed', id);

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Diproses!',
                                            text: 'Data sudah aktif.',
                                            timer: 1500,
                                            showConfirmButton: false,
                                            customClass: {
                                                popup: 'rounded-xl shadow-lg',
                                                title: 'text-lg font-bold text-green-700',
                                                htmlContainer: 'text-sm text-green-600'
                                            }
                                        });
                                    }
                                });
                            }
  </script>
                    @endpush

