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
    header('Content-Disposition: attachment;filename=rekap_insiden_unit_'.$data_tahun.'.xls');
    ?>


    <center>
        <h4>REKAP INSIDEN UNIT {{ $data_tahun }}</h4>
    </center>


    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Unit</th>
                <th>Insiden Keselamantan Pasien</th>
                <th>Insiden Umum</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        {{ $no++ }}</td>
                    <td>
                        {{ $item->nama_insiden_unit }}</td>
                    <td>
                        {{ rekap_insiden_medis($item->id, $data_tahun) }}
                    </td>
                    <td>
                        {{ rekap_insiden_nonmedis($item->id, $data_tahun) }}
                    </td>
                    <td>
                        {{ rekap_insiden_nonmedis($item->id, $data_tahun) + rekap_insiden_medis($item->id, $data_tahun) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
