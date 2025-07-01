<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class='container'>
        <br></br>
        <h2>Update Data</h2>
        

        <form action='create.php' enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="merk" class="form-label">Merk Barang</label>
                <input type="text" class="form-control" id="merk" placeholder="Wardah" name='merk'>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="number" step='1' class="form-control" id="harga" placeholder="20000" name='harga'>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Barang</label>
                <input type="number" step='1' class="form-control" id="tahun" placeholder="2021" name='tahun'>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Barang</label>
                <select class="form-select" aria-label="Default select example" id="kategori" name='kategori'>
                    <option value="baru">Baru</option>
                    <option value="seken">Seken</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Barang</label>
                <input type="number" step='1' class="form-control" id="stok" placeholder="34" name='stok'>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" step='1' class="form-control" id="image" name='image'>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>