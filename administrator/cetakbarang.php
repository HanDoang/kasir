<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Print Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="text.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>



<body>

    <div class="row">
        <div class="col-12 text-center">
            <address>
                <i class="fas fa-shopping-cart fa-3x text-primary"></i>
                <font size="6" class="text-primary">
                    <a style="text-decoration:none" href="index.php">HanGunShop</a>
                </font>
                <br>
                <strong class="text-warning">
                    Butuh senjata kesini aja
                </strong>
                <br>
                <strong>
                    <i style="color: white;">Pasaman Barat</i>
                </strong><br>
                <strong>
                    <i style="color: white;">+6282284906722</i>
                </strong><br>
            </address>
        </div>










        <div class="">
            <div class="content">


                <div class="card mt-2">
                    <div class="card-body">
                        <table id="dt" class="table align-middle table cell-border table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from produk");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $d['NamaProduk']; ?>
                                        </td>
                                        <td>Rp.
                                            <?php echo number_format($d['Harga'], 0) ?>
                                        </td>
                                        <td>
                                            <?php echo $d['Stok']; ?>
                                        </td>

                                    </tr>

                                    <!-- Modal Edit Data-->
                                    <div class="modal fade" id="edit-data<?php echo $d['ProdukID']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="proses_update_barang.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama Produk</label>
                                                            <input type="hidden" name="ProdukID"
                                                                value="<?php echo $d['ProdukID']; ?>">
                                                            <input type="text" name="NamaProduk" class="form-control"
                                                                value="<?php echo $d['NamaProduk']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga Produk</label>
                                                            <input type="number" name="Harga" class="form-control"
                                                                value="<?php echo $d['Harga']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Stok Produk</label>
                                                            <input type="number" name="Stok" class="form-control"
                                                                value="<?php echo $d['Stok']; ?>">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Hapus Data-->
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                    <div class="mt-3">
                        <a href="index.php">
                            <btn class="btn btn-primary btn-lg" style="margin-left: 20px;"><i class="fa-solid fa-house">
                                    Beranda</i></btn>
                        </a>
                        <a href="cetakbeli.php">
                            <btn class="btn btn-success btn-lg" style="margin-left: 900px;"><i
                                    class="fa-solid fa-print"> Cetak</i></btn>
                        </a>
                    </div>


</body>

</html>