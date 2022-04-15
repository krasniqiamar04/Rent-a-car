<?php
include_once('../includes/sqlFunctions.php');

if (isset($_POST['shtoKategori'])) {
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    shtoKategori($emri, $pershkrimi);
}

if (isset($_POST['modifikoKategori'])) {
    $kategoriaid = $_POST['kategoriaid'];
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    modifikoKategori($kategoriaid, $emri, $pershkrimi);
}

if (isset($_POST['btnFshij'])) {
    $kategoriaid = $_POST['kategoriaid'];
    $result = fshijKategori($kategoriaid);
    if($result){
        header("Location: ../kategorite.php");
    }
}
?>
