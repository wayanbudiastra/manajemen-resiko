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
    header('Content-Disposition: attachment;filename=resiko-kategori-rekap-excel_'.$pilih_tahun.'_'.$pilih_bulan.'.xls');
    ?>


    <center>
        <h4>REKAP RISK REGISTER KATEGORI {{ $pilih_tahun }}</h4>
    </center>


    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Sangat Rendah</th>
                <th>Rendah</th>
                <th>Sedang</th>
                <th>Tinggi</th>
                <th>Sangat Tinggi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>

                    <td>{{ $no++ }} </td>
                    <td>{{ $item->nama_kategori }} </td>
                    <td>{{  rekap_risk_kategori_detail($item->id, $pilih_tahun, $pilih_bulan, 1) }}</td>
                    <td>{{  rekap_risk_kategori_detail($item->id, $pilih_tahun, $pilih_bulan, 2) }}</td>
                    <td>{{  rekap_risk_kategori_detail($item->id, $pilih_tahun, $pilih_bulan, 3) }}</td>
                    <td>{{  rekap_risk_kategori_detail($item->id, $pilih_tahun, $pilih_bulan, 4) }}</td>
                    <td>{{  rekap_risk_kategori_detail($item->id, $pilih_tahun, $pilih_bulan, 5) }}</td>
                    <td>{{  rekap_risk_kategori_total($item->id, $pilih_tahun, $pilih_bulan) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
