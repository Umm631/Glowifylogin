<?php
    require_once('db.php');

    $query='SELECT * FROM beauty';
    $result=mysqli_query($conn, $query);
    $rows=mysqli_num_rows($result);
    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <div class="container">
        <br></br>    
        <h2>Data Persediaan</h2>
        <a href="create_data.php">
            <button type="button" class="btn btn-primary">Tambah Data</button>
        </a>
        <br></br>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">MERK</th>
                  <th scope="col">HARGA</th>
                  <th scope="col">TAHUN</th>
                  <th scope="col">KATEGORI</th>
                  <th scope="col">STOK</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">TINDAKAN</th>  
                </tr>
            </thead>
            <tbody>
                <?php
                    for($index=0; $index<$rows; $index++){
                ?>
                        <tr>
                            <td><?php echo $data[$index]['merk']?></td>
                            <td><?php echo $data[$index]['harga']?></td>
                            <td><?php echo $data[$index]['tahun']?></td>
                            <td><?php echo $data[$index]['kategori']?></td>
                            <td><?php echo $data[$index]['stok']?></td>
                            <td><img src="uploaded/<?php echo $data[$index]['image']?>" class="img-thumbnail" width="100" height="100" alt="..."></td>
                            <td>
                                <a href="update_data.php?id=<?php echo $data[$index]['id']?> ">
                                    <button type="button" class="btn btn-warning">Ubah Data</button>
                                </a>
                                <a href="delete.php?id=<?php echo $data[$index]['id']?>&image=<?php echo $data[$index]['image']?>">
                                    <button type="button" class="btn btn-danger">Hapus Data</button>
                                </a>
                            </td>
                        </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</body>
</html>