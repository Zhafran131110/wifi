<?php
$file = "voucher.json";

// baca file JSON
$data = json_decode(file_get_contents($file), true);

// ambil voucher pertama
$voucher = array_shift($data);

// simpan kembali (voucher terpakai dihapus)
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

// kirim ke browser
echo json_encode($voucher);
?>
