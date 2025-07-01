<?php
    require_once('db.php');

    $merk=$_POST['merk'];
    $harga=$_POST['harga'];
    $tahun=$_POST['tahun'];
    $kategori=$_POST['kategori'];
    $stok=$_POST['stok'];

    $image =uniqid().'.'. pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded/'. $image);

    $query = "INSERT INTO beauty(merk, harga, tahun, kategori, stok, image)
                VALUES('$merk', '$harga', '$tahun','$kategori', '$stok', '$image')";

    mysqli_query($conn, $query);

    echo "<script>alert('Proses Tambah Data Berhasil')</script>";
    echo "<script>window.location.href='read.php'</script>";
?>