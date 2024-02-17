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
<title>Print Pembelian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="text.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Data Tables -->
    <!-- Data Tables -->

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


        <div class="card mt-2">
            <div class="card-body">
                <table id="dt" class="table align-middle table cell-border table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
                        while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $d['PelangganID']; ?>
                                </td>
                                <td>
                                    <?php echo $d['NamaPelanggan']; ?>
                                </td>
                                <td>
                                    <?php echo $d['NomorTelepon']; ?>
                                </td>
                                <td>
                                    <?php echo $d['Alamat']; ?>
                                </td>
                                <td>Rp.
                                    <?php echo $d['TotalHarga']; ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

                <script type="text/javascript">
                    window.print();
                </script>

</body>

</html>