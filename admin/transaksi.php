<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h2><center><b>Data Transaksi Laundry</b></center></h2>
        </div>
        <div class="panel-body">
            <a href="transaksi_tambah.php" class="btn btn-sm btn-info pull-right">Transaksi Baru</a>
            <br/><br/>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="300">OPSI</th>
                </tr>

                <?php
                include '../koneksi.php';
                $query = "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = pelanggan_id ORDER BY transaksi_id DESC";
                $result = $koneksi->query($query);

                if ($result) {
                    $no = 1;
                    while ($d = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                            <td><?= htmlspecialchars($d['transaksi_tgl']); ?></td>
                            <td><?= htmlspecialchars($d['pelanggan_nama']); ?></td>
                            <td><?= htmlspecialchars($d['transaksi_berat']); ?></td>
                            <td><?= htmlspecialchars($d['transaksi_tgl_selesai']); ?></td>
                            <td><?= "Rp. " . number_format($d['transaksi_harga']) . " ,-"; ?></td>
                            <td>
                                <?php
                                if ($d['transaksi_status'] == "0") {
                                    echo "<span class='label label-warning'>PROSES</span>";
                                } elseif ($d['transaksi_status'] == "1") {
                                    echo "<span class='label label-info'>DICUCI</span>";
                                } elseif ($d['transaksi_status'] == "2") {
                                    echo "<span class='label label-success'>SELESAI</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="transaksi_invoice.php?id=<?= $d['transaksi_id']; ?>" target="_blank" class="btn btn-sm btn-warning">Invoice</a>

                                <!-- Dropdown Button untuk Ubah Status -->
                                <div class="dropdown" style="display:inline-block;">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        Ubah Status <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form action="transaksi_status_update.php" method="POST" style="margin: 0;">
                                                <input type="hidden" name="id" value="<?= $d['transaksi_id']; ?>">
                                                <input type="hidden" name="status" value="0">
                                                <button type="submit" class="dropdown-item btn btn-link">PROSES</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="transaksi_status_update.php" method="POST" style="margin: 0;">
                                                <input type="hidden" name="id" value="<?= $d['transaksi_id']; ?>">
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="dropdown-item btn btn-link">DICUCI</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="transaksi_status_update.php" method="POST" style="margin: 0;">
                                                <input type="hidden" name="id" value="<?= $d['transaksi_id']; ?>">
                                                <input type="hidden" name="status" value="2">
                                                <button type="submit" class="dropdown-item btn btn-link">SELESAI</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                                <a href="transaksi_hapus.php?id=<?= $d['transaksi_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan transaksi ini?')">Batalkan</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Data tidak tersedia</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
