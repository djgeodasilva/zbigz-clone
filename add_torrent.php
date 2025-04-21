<?php
function send_to_rtorrent($rpc_method, $param) {
    $url = "http://localhost/RPC2";
    $payload = xmlrpc_encode_request($rpc_method, [$param]);
    $context = stream_context_create([
        'http' => [
            'method' => "POST",
            'header' => "Content-Type: text/xml",
            'content' => $payload
        ]
    ]);
    $response = file_get_contents($url, false, $context);
    return $response !== false;
}

if (!empty($_POST['magnet'])) {
    $magnet = trim($_POST['magnet']);
    if (send_to_rtorrent("load_start", $magnet)) {
        echo "Magnet adicionado com sucesso! <a href='/rutorrent/'>Ver no ruTorrent</a>";
    } else {
        echo "Erro ao adicionar o magnet link.";
    }
} elseif (!empty($_FILES['torrent_file']['tmp_name'])) {
    $tmpPath = $_FILES['torrent_file']['tmp_name'];
    $torrentDir = '/tmp/uploads';
    if (!is_dir($torrentDir)) mkdir($torrentDir, 0777, true);
    $filename = $torrentDir . '/' . basename($_FILES['torrent_file']['name']);
    move_uploaded_file($tmpPath, $filename);
    if (send_to_rtorrent("load_start", "file://" . $filename)) {
        echo "Arquivo .torrent adicionado com sucesso! <a href='/rutorrent/'>Ver no ruTorrent</a>";
    } else {
        echo "Erro ao adicionar o arquivo .torrent.";
    }
} else {
    echo "Por favor, envie um magnet link ou um arquivo .torrent.";
}