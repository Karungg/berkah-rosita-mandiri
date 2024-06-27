<!DOCTYPE html>
<html>

<head>
    <title>Data Pembayaran Berkah Rosita Mandiri</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Tanggal Pembayaran</th>
            <th>Metode Pembayaran</th>
            <th>Total</th>
        </tr>
        <?php
        $no = 1;
        foreach ($payments as $payment) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $payment['nama_pembeli'] ?></td>
                <td><?= $payment['alamat'] ?></td>
                <td><?= $payment['no_telp'] ?></td>
                <td><?= $payment['tgl_pembayaran'] ?></td>
                <td><?= $payment['metode_pembayaran'] ?></td>
                <td><?= $payment['total'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>