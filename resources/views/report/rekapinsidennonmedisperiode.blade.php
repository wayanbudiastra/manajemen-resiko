<html>

<head>
    <title>Rekap Insiden Unit</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>
    <?php
    header('Content-type: application/vnd-ms-excel');
    header('Content-Disposition: attachment;filename=rekap_insiden_umum_periode'.$data_tahun.'.xls');
    ?>


    <center>
        <h4>REKAP INSIDEN UMUM</h4>
    </center>


    <hr>

    <table>
        <thead>
            
            <tr>
                                                    <th>No</th>
                                                    <th>Judul Insiden</th>
                                                    <th>Tanggal Insiden / Pelapor</th>
                                                    <th>Jenis Insiden</th> 
                                                    <th>Data Pasien / Tempat</th>
                                                    <th>Kronologi</th>
                                                    <th>Katagori Insiden</th>
                                                    <th>Unit Terkait</th> --}}
                                                    <th>Tindak Lanjut</th>
                                                    <th>Deadline/Status</th>
                                                   
                                                </tr>
           
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                <td>{{ $item->judul_insiden }}</td>
                <td>{{ tgl_indo($item->tgl_insiden) }}/ {{ get_nama_user($item->users_id)}} </td>
                <td> {{ $item->insiden_jenis->nama_insiden_jenis }}</td>
                <td>
                                                        Lokasi : {{ $item->insiden_ruangan->nama_insiden_ruangan }}
                </td>
                                                   
                
                                                    <td>
                                                        {{$item->kronologi_kejadian}}
                                                    </td>
                                                    <td>
                                                        @foreach (get_kategori_non_medis($item->id) as $dd )
                                                        {{$dd->insiden_kategori->nama_insiden_kategori}}
                                                        @endforeach
                                                        
                                </td>
                                                    
                                                    <td>
                                                        @foreach (get_unit_non_medis($item->id) as $dd )
                                                        {{$dd->insiden_unit->nama_insiden_unit}}
                                                        @endforeach
                                                        
                                </td>
                                <td>
                                    {{$item->rencana_tindak_lanjut}}
                                </td>
                                                    <td>
                                                        {{ tgl_indo($item->deadline) }}/ <br>
                                                        {{$item->insiden_status->nama_insiden_status}}

                                                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
