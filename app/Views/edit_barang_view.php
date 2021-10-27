<!DOCTYPE html>
<html lang="en">

<head>
        
    <meta charset="UTF-8">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Barang</title>
</head>

<body>
        <form action="/crud/update" method="post">
                <input type="text" name="barang_name" value="<?= $barang->barang_name; ?>">
                <input type="text" name="barang_price" value="<?= $barang->barang_price; ?>">
                <input type="hidden" name="barang_id" value="<?= $barang->barang_id; ?>">
                <button type="submit">Edit</button>
            </form>
</body>

</html>