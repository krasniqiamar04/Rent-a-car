<?php

function connection()
{
    $dbcon = mysqli_connect('localhost', 'root', '', 'rent-a-car');
    if (!$dbcon) {
        die(mysqli_error($dbcon));
    }
    return $dbcon;
}

connection();

function register($emri, $mbiemri, $email, $password, $telefoni, $nr_personal, $adresa)
{
    $dbcon = connection();

    $sql = "SELECT * FROM perdoruesit WHERE email = '$email'";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO perdoruesit(emri, mbiemri, email, password, nrpersonal, telefoni, adresa, role)";
            $sql .= "VALUES('$emri','$mbiemri','$email','$password',$nr_personal, '$telefoni','$adresa','Klient')";
            $result1 = mysqli_query($dbcon, $sql);
            if ($result1) {
                header('Location: login.php');
            }
        } else {
            echo "<script>alert('Ekziston nje llogari me kete email!');</script>";
        }
    }
}

function login($email, $password)
{
    $dbcon = connection();
    $sql = "SELECT * FROM perdoruesit WHERE email = '$email'";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        $res = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            if (password_verify($password, $res['password'])) {
                header("Location: index.php");
                session_start();
                $_SESSION['id'] = $res['perdoruesiid'];
                $_SESSION['emri'] = $res['emri'];
                $_SESSION['mbiemri'] = $res['mbiemri'];
                $_SESSION['roli'] = $res['role'];
            } else {
                echo "<script>alert('Email ose Password nuk jane ne rregull!');</script>";
            }
        }
    }
}

function merr5KlientetEFundit()
{
    $dbcon = connection();
    $sql = "SELECT * FROM perdoruesit WHERE role = 'Klient' ORDER BY perdoruesiid DESC limit 5";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function merrKategorit()
{
    $dbcon = connection();
    $sql = "SELECT * FROM kategorite";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function shtoKategori($emri, $pershkrimi)
{
    $dbcon = connection();
    $sql = "INSERT INTO kategorite(emri, pershkrimi) VALUES('$emri', '$pershkrimi')";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        header('Location: ../kategorite.php');
    }
}

function modifikoKategori($kategoriaid, $emri, $pershkrimi)
{
    $dbcon = connection();
    $sql = "UPDATE kategorite SET emri = '$emri', pershkrimi = '$pershkrimi' WHERE kategoriaid = $kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        header('Location: ../kategorite.php');
    }
}

function merrKategoriId($kategoriaid)
{
    $dbcon = connection();
    $sql = "SELECT * FROM kategorite WHERE kategoriaid = $kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function fshijKategori($kategoriaid)
{
    $dbcon = connection();
    $sql = "DELETE FROM kategorite WHERE kategoriaid = $kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}


function shtoAutomjet($emri, $kategoriaid, $nr_regjistrimit, $pershkrimi, $kostoja)
{
    $dbcon = connection();


    $sql = "INSERT INTO automjetet(emri, kategoriaid, nr_regjistrimi, pershkrimi, kostoja) VALUES
            ('$emri', $kategoriaid, '$nr_regjistrimit', '$pershkrimi', $kostoja)";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        header('Location: ../automjetet.php');
    }
}

function merrAutomjetet(){
    $dbcon = connection();
    $sql = "SELECT a.*, k.emri as kategoria FROM automjetet a INNER JOIN kategorite k ON a.kategoriaid = k.kategoriaid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function merrAutomjetinId($automjetiid){
    $dbcon = connection();
    $sql = "SELECT * FROM automjetet WHERE automjetiid = $automjetiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}


function modifikoAutomjet($automjetiid, $emri, $kategoriaid, $nr_regjistrimit, $pershkrimi, $kostoja){
    $dbcon = connection();
    $sql = "UPDATE automjetet SET emri = '$emri', kategoriaid = $kategoriaid, nr_regjistrimi = '$nr_regjistrimit', pershkrimi = '$pershkrimi', kostoja = $kostoja where automjetiid = $automjetiid" ;
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: ../automjetet.php');
    }
}

function fshijAutomjet($automjetiid)
{
    $dbcon = connection();
    $sql = "DELETE FROM automjetet WHERE automjetiid = $automjetiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

//
function shtoRezervim($automjetiid, $perdoruesiid, $datamarrjes, $datakthimit)
{
    $dbcon = connection();
    $sql = "INSERT INTO rezervimet(automjetiid, perdoruesiID, dataemarrjes, dataekthimit ) VALUES
            ($automjetiid, $perdoruesiid, '$datamarrjes', '$datakthimit')";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        header('Location: ../rezervimet.php');
    }
}

function merrRezervimet(){
    $dbcon = connection();
    $sql = "SELECT r.*, a.emri as emri_atomjetit, a.nr_regjistrimi, k.emri as emri_kategoria, p.emri as emri_perdoruei, p.mbiemri
                FROM rezervimet r 
                    INNER JOIN automjetet a 
                        ON r.automjetiid = a.automjetiid 
                    INNER JOIN kategorite k 
                        ON k.kategoriaid = a.kategoriaid 
                    INNER JOIN perdoruesit p 
                        ON p.perdoruesiid = r.perdoruesiID";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}

function merrRezervimetId($rezervimiid){
    $dbcon = connection();
    $sql = "SELECT *
                FROM rezervimet 
                WHERE rezervimiid = $rezervimiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}


function modifikoRezervim($rezervimiid, $automjetiid, $perdoruesiid, $datamarrjes, $datakthimit){
    $dbcon = connection();
    $sql = "UPDATE rezervimet SET automjetiid = '$automjetiid', perdoruesiID = $perdoruesiid, dataemarrjes = '$datamarrjes', dataekthimit = '$datakthimit' where rezervimiid = $rezervimiid" ;
    $result = mysqli_query($dbcon, $sql);
    if($result){
        header('Location: ../rezervimet.php');
    }
}

function fshijrezervim($rezerviiid)
{
    $dbcon = connection();
    $sql = "DELETE FROM rezervimet WHERE rezervimiid = $rezerviiid";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}


//perdoruesit

function merrKlientet(){
    $dbcon = connection();
    $sql = "SELECT * FROM perdoruesit
                WHERE role = 'Klient' ";
    $result = mysqli_query($dbcon, $sql);
    return $result;
}
