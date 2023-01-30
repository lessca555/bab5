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
        <select name="NIM" id="">
    <?php
        require_once('koneksi.php');
        $sql = "SELECT * FROM mahasiswa";
        $row = $koneksi->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        foreach($hasil as $isi){
    ?>
            <option value="<?= $isi['NIM'] ?>"><?= $isi['NIM'] ?></option>
            <?php } ?>
        </select>

        <br>

        <select name="kodemk" id="">
    <?php
        require_once('koneksi.php');
        $sql = "SELECT * FROM matkul";
        $row = $koneksi->prepare($sql);
        $row->execute();
        $hasil = $row->fetchAll();
        foreach($hasil as $isi){
    ?>
            <option value="<?= $isi['kodeMK'] ?>"><?= $isi['kodeMK'] ?></option>
            <?php } ?>
        </select>
        <br>
        
        <input type="number" name="nilaiuts">
        <br>
        <input type="number" name="nilaiuas">

        <br>
        <br>
        <button type="submit" name="input">inputken</button>
    </form>
</body>
</html>

<?php 
require_once('koneksi.php');
if(isset($_POST["input"])){
    $stmt = $koneksi->prepare("INSERT INTO krs (NIM, kodeMK, NilaiUTS, NilaiUAS) VALUES (:value1, :value2, :value3, :value4)");
    $stmt->bindParam(':value1', $value1);
    $stmt->bindParam(':value2', $value2);
    $stmt->bindParam(':value3', $value3);
    $stmt->bindParam(':value4', $value4);
    $value1 = $_POST["NIM"];
    $value2 = $_POST["kodemk"];
    $value3 = $_POST["nilaiuts"];
    $value4 = $_POST["nilaiuas"];
    $stmt->execute();
    echo "Data inserted successfully.";
}
?>