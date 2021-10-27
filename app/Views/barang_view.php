<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Barang</title>
</head>

<body>
    <a href="/crud/tambah">Tambah Barang</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($barang as $list) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $list['barang_name']; ?></td>
                    <td><?= $list['barang_price']; ?></td>
                    <td>
                        <a href="/crud/edit/<?= $list['barang_id']; ?>">Edit</a>
                        ||
                        <a href="/crud/hapus/<?= $list['barang_id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>