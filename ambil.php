<?php
$file = "voucher.json";

$fp = fopen($file, 'c+');
flock($fp, LOCK_EX);

$data = json_decode(file_get_contents($file), true);

// ambil voucher
$raw = array_shift($data);

// simpan kembali
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

flock($fp, LOCK_UN);
fclose($fp);

if (!$raw) {
    echo json_encode(["error" => "Voucher habis"]);
    exit;
}

// ambil bagian sebelum "=" saja (kode voucher)
list($voucher, $ignore) = explode("=", $raw);

// kirim
echo json_encode([
    "voucher" => $voucher
]);
?>
