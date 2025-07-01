<?php
    require_once('db.php');

    $id =$_GET['id'];

    $query="SELECT *FROM beauty
                WHERE id='$id'";
    $result=mysqli_query($conn, $query);
    
    $rows=mysqli_num_rows($result);
    $data=mysqli_fetch_assoc($result);

    if ($rows==0){
        echo "<script>alert('Data Not Found')</script>";
        echo "<script>window.location.href='read.php'</script>";
    }
?>



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
        

        <form action='update.php?id=<?php echo $data['id']?>' method="post">
            <div class="mb-3">
                <label for="merk" class="form-label">Merk Barang</label>
                <input type="text" class="form-control" id="merk" placeholder="Wardah" name='merk' value="<?php echo $data['merk']?>">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="number" step='1' class="form-control" id="harga" placeholder="20000" name='harga' value="<?php echo $data['harga']?>">
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Barang</label>
                <input type="number" step='1' class="form-control" id="tahun" placeholder="2021" name='tahun' value="<?php echo $data['tahun']?>">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Barang</label>
                <select class="form-select" aria-label="Default select example" id="kategori" name='kategori' >
                    <option value="baru"<?php if ($data['kategori']=='baru')echo "selected"?>>Baru</option>
                    <option value="seken"<?php if ($data['kategori']=='seken')echo "selected"?>>Seken</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Barang</label>
                <input type="number" step='1' class="form-control" id="stok" placeholder="34" name='stok' value="<?php echo $data['stok']?>">
            </div>
        

            <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>