<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = intval($_POST['id']);
        $status = intval($_POST['status']);

        if ($status >= 0 && $status <= 2) {
            $stmt = $koneksi->prepare("UPDATE transaksi SET transaksi_status = ? WHERE transaksi_id = ?");
            $stmt->bind_param("ii", $status, $id);

            if ($stmt->execute()) {
                header("Location: transaksi.php"); // kembali ke daftar
                exit();
            } else {
                echo "Gagal mengubah status.";
            }
        } else {
            echo "Status tidak valid.";
        }
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
