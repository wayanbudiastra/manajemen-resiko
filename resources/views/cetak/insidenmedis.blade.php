<html>

<head>
    <title>Insiden Report Medis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    {{-- <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        h5 {
            font-size: 9pt;
        }

        h4 {
            font-size: 12pt;
        }
    </style> --}}

    <h2 class="text-3xl font-bold mb-5">
        Data Insiden Medis
    </h2>
    <div class="container mt-10">
        <table class="table-auto">
            <tr>
                <td class="px-3 py-2" width="35%">
                    <h4 class="text-xl font-bold">Paramter</h4>
                    </th>
                <td class="px-3 py-2">
                    <h4 class="text-xl font-bold">Keterangan</h4>
                    </th>
            </tr>


            <tr>

                <td class="px-3 py-2">
                    Nomor Insiden</td>
                <td class="px-3 py-2">
                    {{ $data->nomor_insiden }}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Judul Insiden </td>
                <td class="px-3 py-2">
                    {{$data->judul_insiden}}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Tanggal Insiden </td>
                <td class="px-3 py-2">
                    {{ tgl_indo($data->tgl_insiden)}}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Sudah Pernah Terjadi</td>
                <td class="px-3 py-2">
                    {{$data->sudah_pernah_terjadi}}
                </td>
            </tr>

            <tr>
                <td class="px-3 py-2">
                    Inisial Pasien</td>
                <td class="px-3 py-2">
                    {{$data->inisial_pasien}}
                </td>
            </tr>
            <tr>
                <td class="px-3 py-2">
                    Umur Pasien</td>
                <td class="px-3 py-2">
                    {{$data->umur}}
                </td>
            </tr>
            <tr>
                <td class="px-3 py-2">
                    Jenis Kelamin</td>
                <td class="px-3 py-2">
                    {{$data->jenis_kelamin == 'L' ? 'Laki-Laki':'Perempuan' }}
                </td>
            </tr>
            <tr>
                <td class="px-3 py-2">
                    Tgl Masuk RS</td>
                <td class="px-3 py-2">
                    {{tgl_indo($data->tgl_masuk_rs)}}
                </td>
            </tr>
            <tr>
                <td class="px-3 py-2">
                    Penanggung Biaya</td>
                <td class="px-3 py-2">
                    {{$data->insiden_penanggung_biaya->nama_insiden_penanggung_biaya}}
                </td>
            </tr>

            <tr>
                <td class="px-3 py-2">
                    Tindakan dilakukan oleh</td>
                <td class="px-3 py-2">
                    {{$data->tindakan_dilakukan_oleh}}
                </td>
            </tr>


            <tr>

                <td class="px-3 py-2">
                    Tempat Kejadian </td>
                <td class="px-3 py-2">
                    {{ $data->insiden_ruangan->nama_insiden_ruangan}}

                </td class="px-3 py-2">
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Kronologi Kejadian</td>
                <td class="px-3 py-2">
                    {{$data->kronologi_kejadian}}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Tindakan Segera Dilakukan</td>
                <td class="px-3 py-2">
                    {{$data->tindakan_segera_dilakukan}}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Jenis Insiden</td>
                <td class="px-3 py-2">
                    {{$data->insiden_jenis->nama_insiden_jenis}}
                </td>
            </tr>

            <tr>
                <td class="px-3 py-2">
                    Unit Terkait</td>
                <td class="px-3 py-2">
                    @foreach (get_unit_medis($data->id) as $dd )
                    {{$dd->insiden_unit->nama_insiden_unit}}
                    <br>
                    @endforeach


                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Dampak</td>
                <td class="px-3 py-2">
                    {{$data->insiden_dampak->nama_insiden_dampak}}
                </td>
            </tr>
            <tr>
                <td class="px-3 py-2">
                    Kategori Insiden</td>
                <td class="px-3 py-2">
                    @foreach (get_kategori_medis($data->id) as $dd )
                    {{$dd->insiden_kategori->nama_insiden_kategori}}
                    <br>
                    @endforeach


                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    Grade</td>
                <td class="px-3 py-2">

                    {{$data->insiden_grade->nama_insiden_grade}}
                </td class="px-3 py-2">
            </tr>
            {{-- <tr>
                <td>
                    Frekuensi</td>
                <td>
                    {{$data->insiden_frekuensi->nama_insiden_frekuensi}}

                </td>
            </tr> --}}
            <tr>
                <td class="px-3 py-2">
                    Scroring Insiden</td>
                <td class="px-3 py-2">
                    {{$data->score_insiden}}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">

                    Akar Masalah
                </td>
                <td class="px-3 py-2">
                    {{$data->akar_masalah = 'Y' ? '5 WHYS':'RCA'}}



                </td>
            </tr>

            <tr>

                <td class="px-3 py-2">
                    Akar Masalah Lengkap</td>
                <td class="px-3 py-2">
                    {{$data->akar_masalah_lengkap}}


                </td>
            </tr>

            <tr>

                <td class="px-3 py-2">
                    Rencana Tindak Lanjut</td>
                <td class="px-3 py-2">
                    {{$data->rencana_tindak_lanjut}}
                </td>
            </tr>

            <tr>

                <td class="px-3 py-2">
                    Deadline</td>
                <td class="px-3 py-2">
                    {{tgl_indo($data->deadline)}}
                </td>
            </tr>
            <tr>

                <td class="px-3 py-2">
                    PIC Insiden</td>
                <td class="px-3 py-2">
                    {{get_nama_user($data->pic_insiden_users_id)}}
                </td>
            </tr>

        </table>
    </div>
</body>

</html>