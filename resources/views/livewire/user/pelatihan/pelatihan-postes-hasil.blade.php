<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="container px-6 mx-auto md:container md:mx-auto ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="col-md-12">
                        <div class="card">
                            {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                                <div class="w-full overflow-x-auto">
                                    <div>
                                        <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <div class="flex flex-col">
                                                <div
                                                    class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                                    <div class="flex flex-row">
                                                    </div>
                                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                                        <div class="w-full overflow-x-auto">
                                                            <table class="min-w-full whitespace-no-wrap"
                                                                wire:loading.remove>
                                                                <thead>
                                                                    <tr
                                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                        <th class="px-4 py-3">#Id</th>
                                                                        <th class="px-4 py-3">Paramter</th>
                                                                        <th class="px-4 py-3">Keterangan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <th class="px-4 py-3">1
                                                                        </th>
                                                                        <td class="px-4 py-3">
                                                                            Nama Pelatihan</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $nama_pelatihan }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <th class="px-4 py-3">2
                                                                        </th>
                                                                        <td class="px-4 py-3">
                                                                            jenis Pelatihan</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $jenis_pelatihan }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <th class="px-4 py-3">3
                                                                        </th>
                                                                        <td class="px-4 py-3">
                                                                            Skill Pelatihan</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $pelatihan_skill }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <th class="px-4 py-3">4
                                                                        </th>
                                                                        <td class="px-4 py-3">
                                                                            Total Jam / Limit Akses</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $total_jam }}/({{ $limit_akses }})
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <th class="px-4 py-3">5
                                                                        </th>
                                                                        <td class="px-4 py-3">
                                                                            Total Bobot / Kelulusan</td>
                                                                        <td class="px-4 py-3">
                                                                            {{ $total_bobot }}/({{ $kelulusan }})
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <button wire:click="kembali"
                                                        class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                            class="fas fa-fw fa-arrow-left"></i>Kembali</button>
                                                    <div>
                                                        @if (session()->has('success'))
                                                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                                            role="alert">
                                                            <span class="font-medium">Success!</span> {{
                                                            session('success') }}
                                                        </div>
                                                        @endif
                                                        @if (session()->has('error'))
                                                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                            role="alert">
                                                            <span class="font-medium">Danger alert!</span> {{
                                                            session('error') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                                        <div class="w-full overflow-x-auto">
                                                            <table class="min-w-full" wire:loading.remove>
                                                                <thead>
                                                                    <tr
                                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                        <th class="px-4 py-3">No</th>
                                                                        <th width="55%">Pertanyaan</th>
                                                                        <th class="px-4 py-3">Jawaban</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($log_soal as $item )
                                                                    @php
                                                                    $checked_a = '';
                                                                    $checked_b = '';
                                                                    $checked_c = '';
                                                                    $checked_d = '';
                                                                    @endphp
                                                                    @php
                                                                    $checked_a = cek_jawaban_a($item->id);
                                                                    $checked_b = cek_jawaban_b($item->id);
                                                                    $checked_c = cek_jawaban_c($item->id);
                                                                    $checked_d = cek_jawaban_d($item->id);
                                                                    @endphp


                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <th class="px-4 py-3" rowspan="4" width="5%">
                                                                            {{$no++}}
                                                                        </th>
                                                                        <td rowspan="4" width="55%">
                                                                            {{$item->pelatihan_soal->pertanyaan}}</td>
                                                                        <td class="px-4 py-3">
                                                                            A. <input type="radio"
                                                                                name="jawabanSelected[{{$item->id}}]"
                                                                                value="A" class="form-check-input"
                                                                                {{$checked_a}}>{{
                                                                            $item->pelatihan_soal->jawaban_a }}

                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class="px-4 py-3">
                                                                            B. <input type="radio"
                                                                                name="jawabanSelected[{{$item->id}}]"
                                                                                value="B" class="form-check-input"
                                                                                {{$checked_b}}>{{
                                                                            $item->pelatihan_soal->jawaban_b }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class="px-4 py-3">
                                                                            C. <input type="radio"
                                                                                name="jawabanSelected[{{$item->id}}]"
                                                                                value="C" class="form-check-input"
                                                                                {{$checked_c}}>{{
                                                                            $item->pelatihan_soal->jawaban_c }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class="px-4 py-3">
                                                                            D. <input type="radio"
                                                                                name="jawabanSelected[{{$item->id}}]"
                                                                                value="D" class="form-check-input"
                                                                                {{$checked_d}}>
                                                                            {{
                                                                            $item->pelatihan_soal->jawaban_d }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr
                                                                        class="text-gray-700 dark:text-gray-400  bg-gray-50">
                                                                        <td colspan="3">
                                                                            @if ($item->lulus=='Y')
                                                                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                                                                role="alert">
                                                                                <span
                                                                                    class="font-medium">Success!</span>
                                                                                Jawaban anda benar
                                                                            </div>
                                                                            @else
                                                                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                                role="alert">
                                                                                <span class="font-medium">Danger
                                                                                    alert!</span> Jawaban Anda Salah
                                                                            </div>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <tr
                                                                        class="text-gray-700 dark:text-gray-400  bg-gray-50">
                                                                        <td colspan="2"> Hasil Postes </td>
                                                                        <td>{{$log->hasil}}</td>
                                                                    </tr>
                                                                    <tr
                                                                        class="text-gray-700 dark:text-gray-400  bg-gray-50">
                                                                        <td colspan="2"> Keterangan </td>
                                                                        <td>{{$log->keterangan}}</td>
                                                                    </tr>
                                                                    <tr
                                                                        class="text-gray-700 dark:text-gray-400  bg-gray-50">
                                                                        <td colspan="2"> Sisa Limit </td>
                                                                        <td>{{$sisa_limit}}</td>
                                                                    </tr>
                                                                    <thead>
                                                                        <tr
                                                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                            <th class="px-4 py-3" colspan="3">
                                                                                @if ($sisa_limit != 0)
                                                                                <button wire:click="ulang"
                                                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                                                        class="fas fa-fw fa-save"></i>Ulang?</button>
                                                                                @endif
                                                                            </th>

                                                                        </tr>
                                                                    </thead>
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