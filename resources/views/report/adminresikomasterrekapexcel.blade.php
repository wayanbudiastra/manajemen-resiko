<html>

<head>
    <title>Rekap Risk Register Unit</title>
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
    header('Content-Disposition: attachment;filename=resiko-unit-rekap-excel_' . $pilih_tahun . '.xls');
    ?>


    <center>
        <h4>REKAP RISK REGISTER UNIT {{ $pilih_tahun }}</h4>
    </center>


    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Unit Kerja</th>
                <th>Aktivitas Kerja</th>
                <th>Kategori Resiko</th>
                <th>Kontrol</th>
                <th>Grade Kontrol</th>
                <th>Resiko</th>
                <th>Akar Masalah</th>
                <th>Tindak Lanjut</th>
                <th>Penanggung jawab</th>
                <th>Evaluasi</th>
                <th>Grade Evaluasi</th>
                <th>Aktif</th>
                <th>Laporan Singkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                                                       <td>
                                                            {{ $no++ }}</td>
                                                             <td>
                                                            {{ $item->unit->nama_insiden_unit }}</td>
                                                        <td>
                                                            {{ $item->aktivitas_kerja }}</td>
                                                        <td>
                                                            {{ $item->risk_kategori->nama_kategori }}
                                                        </td>
                                                        
                                                        <td>
                                                            @if ($item->matrik_kontrol_grade == 1)
                                                                    Sangat Rendah 
                                                            @elseif($item->matrik_kontrol_grade == 2)
                                                                    Rendah 
                                                            @elseif($item->matrik_kontrol_grade == 3)
                                                                    Sedang 
                                                            @elseif($item->matrik_kontrol_grade == 4)
                                                                    Tinggi 
                                                            @elseif($item->matrik_kontrol_grade == 5)
                                                                    Sangat Tinggi 
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->matrik_kontrol_grade == 1)
                                                               {{$item->matrik_kontrol_rpn}} 
                                                            @elseif($item->matrik_kontrol_grade == 2)
                                                                {{$item->matrik_kontrol_rpn}}
                                                            @elseif($item->matrik_kontrol_grade == 3)
                                                               {{$item->matrik_kontrol_rpn}} 
                                                            @elseif($item->matrik_kontrol_grade == 4)
                                                                {{$item->matrik_kontrol_rpn}} 
                                                            @elseif($item->matrik_kontrol_grade == 5)
                                                                {{$item->matrik_kontrol_rpn}} 
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $item->resiko }}</td>
                                                        <td>
                                                            {{ $item->akar_masalah }}</td>
                                                             <td>
                                                            {{ $item->rencana_tindak_lanjut }}
                                                        </td>
                                                         <td>
                                                            {{ $item->penanggung_jawab }}
                                                        </td>
                                                            <td>
                                                            @if ($item->matrik_monitoring_grade == 1)
                                                                    Sangat Rendah 
                                                            @elseif($item->matrik_monitoring_grade == 2)                    
                                                                    Rendah 
                                                            @elseif($item->matrik_monitoring_grade == 3)
                                                                    Sedang 
                                                            @elseif($item->matrik_monitoring_grade == 4)
                                                                    Tinggi 
                                                            @elseif($item->matrik_monitoring_grade == 5)
                                                                    Sangat Tinggi 
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->matrik_monitoring_grade == 1)
                                                               {{$item->matrik_monitoring_rpn}} 
                                                            @elseif($item->matrik_monitoring_grade == 2)
                                                                {{$item->matrik_monitoring_rpn}}
                                                            @elseif($item->matrik_monitoring_grade == 3)
                                                                {{$item->matrik_monitoring_rpn}}
                                                            @elseif($item->matrik_monitoring_grade == 4)
                                                                 {{$item->matrik_monitoring_rpn}} 
                                                            @elseif($item->matrik_monitoring_grade == 5)
                                                                 {{$item->matrik_monitoring_rpn}} 
                                                            @endif
                                                        </td>
                                                        

                                                        <td>
                                                         {{ $item->aktif }}  </td>
                                                          <td>
                                                         {{ $item->laporan_singkat }}  </td>
                                                        
                                                    </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
