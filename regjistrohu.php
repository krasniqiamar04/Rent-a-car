<?php include_once 'includes/sqlFunctions.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rent a Car</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>



<body id="loginPage">

<header class="header">
    <div class="logo">
        <a href="index.php">
            <h3>Rent A Car</h3>
        </a>
    </div>
</header>

mail
<div class="loginForma container">
    <div class="formaLogin">
        <h1>Regjistrohu</h1>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">
            <div>
                <input type="text" name="emri" placeholder="Emri"> <br>
                <input type="mbiemri" name="mbiemri" placeholder="Mbiemri">
            </div>
            <div>
                <input type="email" name="email" placeholder="email"> <br>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <input type="tel" name="telefoni" placeholder="telefoni">
                <input type="number" name="nr_personal" placeholder="Numri personal"> <br>
            </div>
            <div>
                <input type="text" name="adresa" placeholder="Adresa">
            </div>
            <div class="loginFormFooter">
                <button id="login" name="btn-regjistrohu">Regjistrohu</button>
            </div>
        </form>
    </div>
</div>

</body>

</html>
