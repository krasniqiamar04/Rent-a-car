<?php
include_once 'includes/header.php';
include_once 'includes/sqlFunctions.php'
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car10.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <?php if(isset($_GET['rezervimiid'])) {
        $rezervimi = mysqli_fetch_assoc(merrRezervimetId($_GET['rezervimiid']));
        $test = 'test';
        ?>
            <h1>Forma per modifikimin e Rezervimit</h1>
        <?php
        } else { ?>
            <h1>Forma per shtimin e Rezervimit</h1>
        <?php } ?>
        <br>
        <form method="post" action="lib/rezervim.php">
            <?php
            if (isset($_GET['rezervimiid'])){
                echo "<input type='hidden' name='rezervimiid' value=' ".$_GET['rezervimiid']."'>";
            }
            ?>
            <div class="inputAndLabels">
                <label for="klienti">Klienti</label> <br>
                <select id="klienti" name="klienti">
                    <?php $klientet = merrKlientet();
                    while ($klient = mysqli_fetch_assoc($klientet)) : ?>
                        <option value="<?php echo $klient['perdoruesiid']; ?>" <?php if(isset($_GET['rezervimiid']))if($klient['perdoruesiid'] == $rezervimi['perdoruesiID']) echo 'selected' ; ?> ><?php echo $klient['emri']." ".$klient['mbiemri']; ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="automjeti">Automjeti</label> <br>
                <select id="automjeti" name="automjetiid">
                    <?php $automjetet = merrAutomjetet();
                    while ($automjeti = mysqli_fetch_assoc($automjetet)) : ?>
                        <option value="<?php echo $automjeti['automjetiid']; ?>" <?php if(isset($_GET['rezervimiid']))if($automjeti['automjetiid'] == $rezervimi['automjetiid']) echo 'selected'; ?>><?php echo $automjeti['emri']; ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="data_e_marrjes">Data e marrjes</label> <br>
                <input type="date" id="data_e_marrjes" name="data_e_marrjes" value="<?php if(isset($_GET['rezervimiid'])) echo $rezervimi['dataemarrjes']; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="data_e_kthimit">Data e kthimit</label> <br>
                <input type="date" id="data_e_kthimit" name="data_e_kthimit" value="<?php if(isset($_GET['rezervimiid'])) echo $rezervimi['dataekthimit']; ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php if(isset($_GET['rezervimiid'])) : ?>
                        <button id="modifikoRezervim" name="modifikoRezervim" class="shtoModifiko">Modifiko Rezerviim</button>
                    <?php else : ?>
                        <button id="shtoReservim" name="shtoReservim" class="shtoModifiko">Shto Rezervim</button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once 'includes/footer.php'?>

