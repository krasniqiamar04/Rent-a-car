<?php
include_once 'includes/header.php';
include_once 'includes/sqlFunctions.php'
?>
<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car8.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <?php if(isset($_GET['automjetiid'])) {
            $automjeti = mysqli_fetch_assoc(merrAutomjetinId($_GET['automjetiid']));
            ?>
            <h1>Forma per modifikimin e Automjetit</h1>
        <?php
            $kategoria =mysqli_fetch_assoc(merrKategoriId($_GET['automjetiid']));
        } else { ?>
            <h1>Forma per shtimin e Automjetit</h1>
        <?php } ?>
        <br>

        <form method="post" action="lib/automjet.php">
            <input type="hidden" name="automjetiid" value="<?php if(isset($_GET['automjetiid'])) echo $_GET['automjetiid']; ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" value=" <?php if(isset($_GET['automjetiid'])) echo $automjeti['emri']; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select id="kategoria" name="kategoriaid">
                    <?php $kategorite = merrKategorit();
                    while ($kategoria = mysqli_fetch_assoc($kategorite)) : ?>
                        <option value="<?php echo $kategoria['kategoriaid']; ?>" <?php if(isset($_GET['automjetiid']))if($kategoria['kategoriaid'] == $automjeti['kategoriaid']) echo 'selected' ; ?> ><?php echo $kategoria['emri']; ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="nrRegjistrimit">Numri i regjistrimit</label> <br>
                <input type="text" id="nrRegjistrimit" name="nr_regjistrimit" value="<?php if(isset($_GET['automjetiid'])) echo $automjeti['nr_regjistrimi']; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi" value="<?php if(isset($_GET['automjetiid'])) echo $automjeti['pershkrimi']; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kostoja">Kostoja</label> <br>
                <input type="text" id="kostoja" name="kostoja" value="<?php if(isset($_GET['automjetiid'])) echo $automjeti['kostoja']; ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php if(isset($_GET['automjetiid'])) : ?>
                        <button id="modifikoAutomjet" name="modifikoAutomjet" class="shtoModifiko">Modifiko Automjet</button>
                    <?php else : ?>
                        <button id="ShtoAutomjet" name="shtoAutomjet" class="shtoModifiko">Shto Automjet</button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once 'includes/footer.php'?>
