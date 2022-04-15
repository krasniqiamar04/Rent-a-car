<?php
include_once('../includes/sqlFunctions.php');

if (isset($_POST['shtoAutomjet'])) {
    $emri = $_POST['emri'];
    $kategoriaid = $_POST['kategoriaid'];
    $nr_regjistrimit = $_POST['nr_regjistrimit'];
    $pershkrimi = $_POST['pershkrimi'];
    $kostoja = $_POST['kostoja'];
    shtoAutomjet($emri, $kategoriaid, $nr_regjistrimit, $pershkrimi, $kostoja);
}

if (isset($_POST['modifikoAutomjet'])) {
    $automjetiid = $_POST['automjetiid'];
    $emri = $_POST['emri'];
    $kategoriaid = $_POST['kategoriaid'];
    $nr_regjistrimit = $_POST['nr_regjistrimit'];
    $pershkrimi = $_POST['pershkrimi'];
    $kostoja = $_POST['kostoja'];
    modifikoAutomjet($automjetiid, $emri, $kategoriaid, $nr_regjistrimit, $pershkrimi, $kostoja);
}

if (isset($_POST['btnFshij'])) {
    $automjetiid = $_POST['automjetiid'];
    $result = fshijAutomjet($automjetiid);
    if ($result) {
        header("Location: ../automjetet.php");
    }
}
?>
