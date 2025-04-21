<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>ZbigZ Clone</title>
</head>
<body>
    <h2>Adicionar torrent</h2>
    <form action="add_torrent.php" method="post" enctype="multipart/form-data">
        <label>Magnet link:</label><br>
        <input type="text" name="magnet" size="70"><br><br>
        <label>Ou envie um arquivo .torrent:</label><br>
        <input type="file" name="torrent_file" accept=".torrent"><br><br>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>