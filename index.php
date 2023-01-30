<?php
require_once('koneksi.php');
$stmt = $koneksi->prepare("CALL RankingPerJur(:input1)");
$stmt->bindParam(':input1', $input1, PDO::PARAM_STR);
$input1 = $_POST["kode_jurusan"];
$stmt->execute();
if(isset($_POST["cari"])){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>NIM</th>";
    echo "<th>Nama</th>";
    echo "<th>Kode Jurusan</th>";
    echo "<th>IP</th>";
    echo "</tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(!empty($input1)){
            echo "<tr>";
            echo "<td>" . $row['NIM'] . "</td>";
            echo "<td>" . $row['Nama'] . "</td>";
            echo "<td>" . $row['kodeMK'] . "</td>";
            echo "<td>" . $row['IP'] . "</td>";
            echo "</tr>";
        }
    }
}
echo "</table>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="kode_jurusan">
        <br>        
        <button type="submit" name="cari">execute</button>
    </form>
    
</body>
</html>