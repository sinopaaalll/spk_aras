<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <center>
        <h2>Hasil Akhir Perhitungan</h2>
    </center>
    <table border="1" cellspacing="0" cellpadding="10" width="100%">
        <tr>
            <th>Alternatif</th>
            <th>Hasil K<sub>i</sub></th>
            <th>Ranking</th>
        </tr>
        <?php foreach ($result as $key => $value) {
            if ($value->ranking == 1) {
                $data = [
                    'alternatif' => $value->alternative_name,
                    'desc' => $value->description,
                    'hasil' => $value->result,
                ];
            } ?>
            <tr>
                <td><?= $value->description ?></td>
                <td><?= $value->result ?></td>
                <td><?= $value->ranking ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <hr>
    <center>
        <h2>Kesimpulan</h2>
    </center>
    <p>
        * Dari nilai K<sub>i</sub> ini dapat dilihat bahwa <?= $data['alternatif'] ?> memiliki nilai terbesar. Sehingga dapat disimpulkan bahwa <?= $data['alternatif'] ?> akan dipilih. Dengan kata lain, <?= $data['desc'] ?> menjadi alternatif paling tepat untuk supplai barang TB. BINA ELANG PERKASA CAMPAKA.
    </p>

    <script>
        window.print()
    </script>
</body>

</html>