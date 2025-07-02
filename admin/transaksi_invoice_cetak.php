<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location: ../index.php?pesan=belum_login");
    exit;
}

include '../koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']); // lebih aman dari SQL injection

$stmt = $koneksi->prepare("SELECT * FROM transaksi 
    JOIN pelanggan ON transaksi_pelanggan = pelanggan_id 
    WHERE transaksi_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SISTEM INFORMASI RUMAH LAUNDRY</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        @media print {
            .btn, .pull-right {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <?php while ($t = $result->fetch_assoc()) { ?>
            <center><h2>RUMAH LAUNDRY</h2></center>
            <h3 class="text-center">INVOICE TRANSAKSI LAUNDRY</h3>
            <a href="#" onclick="window.print();" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-print"></i> CETAK</a>
            <br><br>

            <table class="table">
                <tr>
                    <th width="20%">No. Invoice</th><th>:</th>
                    <td>INVOICE-<?php echo $t['transaksi_id']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Laundry</th><th>:</th>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th><th>:</th>
                    <td><?php echo htmlspecialchars($t['pelanggan_nama']); ?></td>
                </tr>
                <tr>
                    <th>Hp</th><th>:</th>
                    <td><?php echo htmlspecialchars($t['pelanggan_hp']); ?></td>
                </tr>
                <tr>
                    <th>Alamat</th><th>:</th>
                    <td><?php echo htmlspecialchars($t['pelanggan_alamat']); ?></td>
                </tr>
                <tr>
                    <th>Berat Cucian (kg)</th><th>:</th>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Selesai</th><th>:</th>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th>Status</th><th>:</th>
                    <td>
                        <?php
                        $status = $t['transaksi_status'];
                        if ($status == "0") echo "<span class='label label-warning'>PROSES</span>";
                        elseif ($status == "1") echo "<span class='label label-info'>DI CUCI</span>";
                        elseif ($status == "2") echo "<span class='label label-success'>SELESAI</span>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Harga</th><th>:</th>
                    <td><?php echo "Rp. " . number_format($t['transaksi_harga']) . ",-"; ?></td>
                </tr>
            </table>

            <h4 class="text-center">Daftar Cucian</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>
                <?php
                $stmt2 = $koneksi->prepare("SELECT * FROM pakaian WHERE pakaian_transaksi = ?");
                $stmt2->bind_param("i", $id);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                while ($p = $result2->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($p['pakaian_jenis']); ?></td>
                        <td><?php echo $p['pakaian_jumlah']; ?></td>
                    </tr>
                <?php } ?>
            </table>

            <br>
            <p class="text-center"><i>"SALAM BERSIH, SALAM WANGI."</i></p>
        <?php } ?>
    </div>
</div>

<!-- jQuery & Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
