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
    header('Content-Disposition: attachment;filename=resiko-kontrol-evaluasi-rekap-excel_' . $tahun . '.xls');
    ?>


    <center>
        <h4>RISK REGISTER REKAP KONTROL EVALUASI {{ $tahun }}</h4>
    </center>


    <hr>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Bulan</th>
                <th colspan="2">Sangat Rendah</th>
                <th colspan="2">Rendah </th>
                <th colspan="2">Sedang</th>
                <th colspan="2">Tinggi</th>
                <th colspan="2">Tinggi Sekali</th>
                

            </tr>
            <tr>
                <th>Kontrol</th>
                <th>Evaluasi</th>
                <th>Kontrol</th>
                <th>Evaluasi</th>
                <th>Kontrol</th>
                <th>Evaluasi</th>
                <th>Kontrol</th>
                <th>Evaluasi</th>
                <th>Kontrol</th>
                <th>Evaluasi</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1 </td>
                <td> Januari </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '01', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '01', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '01', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '01', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '01', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '01', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '01', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '01', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '01', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '01', 5) }}</td>
            </tr>
            <tr>
                <td> 2 </td>
                <td> February </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '02', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '02', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '02', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '02', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '02', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '02', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '02', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '02', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '02', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '02', 5) }}</td>
            </tr>
            <tr>
                <td> 3 </td>
                <td> Maret </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '03', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '03', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '03', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '03', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '03', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '03', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '03', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '03', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '03', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '03', 5) }}</td>
            </tr>
            <tr>
                <td> 4 </td>
                <td> April </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '04', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '04', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '04', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '04', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '04', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '04', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '04', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '04', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '04', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '04', 5) }}</td>
            </tr>
            <tr>
                <td> 5 </td>
                <td> Mei </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '05', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '05', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '05', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '05', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '05', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '05', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '05', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '05', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '05', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '05', 5) }}</td>
            </tr>
            <tr>
                <td> 6 </td>
                <td> Juni </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '06', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '06', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '06', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '06', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '06', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '06', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '06', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '06', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '06', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '06', 5) }}</td>
            </tr>
            <tr>
                <td> 7 </td>
                <td> Juli </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '07', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '07', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '07', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '07', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '07', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '07', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '07', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '07', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '07', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '07', 5) }}</td>
            </tr>
            <tr>
                <td> 8 </td>
                <td> Agustus </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '08', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '08', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '08', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '08', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '08', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '08', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '08', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '08', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '08', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '08', 5) }}</td>
            </tr>
            <tr>
                <td> 9 </td>
                <td> September </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '09', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '09', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '09', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '09', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '09', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '09', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '09', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '09', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '09', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '09', 5) }}</td>
            </tr>

            <tr>
                <td> 10 </td>
                <td> Oktober </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '10', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '10', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '10', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '10', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '10', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '10', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '10', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '10', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '10', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '10', 5) }}</td>
            </tr>
            <tr>
                <td> 11 </td>
                <td> November </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '11', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '11', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '11', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '11', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '11', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '11', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '11', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '11', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '11', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '11', 5) }}</td>
            </tr>
            <tr>
                <td> 12 </td>
                <td> Desember </td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '12', 1) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '12', 1) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '12', 2) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '12', 2) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '12', 3) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '12', 3) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '12', 4) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '12', 4) }}</td>
                <td>{{ rekap_risk_unit_kontrol_all($tahun, '12', 5) }}</td>
                <td>{{ rekap_risk_unit_all($tahun, '12', 5) }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
