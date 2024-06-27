<!DOCTYPE html>
<html>

<head>
    <title>Data Produk Berkah Rosita Mandiri</title>
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
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Link</th>
        </tr>
        <?php
        $no = 1;
        foreach ($products as $product) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $product['nama_produk'] ?></td>
                <td><?= $product['deskripsi'] ?></td>
                <td><?= $product['harga'] ?></td>
                <td><?= $product['stok'] ?></td>
                <td><?= $product['link'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>