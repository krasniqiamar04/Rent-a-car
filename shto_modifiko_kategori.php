<?php include_once 'includes/header.php'?>
<?php include_once 'includes/sqlFunctions.php'?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car9.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <?php if (!isset($_GET['kategoriaid'])){?>
        <h1>Forma per shtimin e Kategorisë</h1>
        <?php } else {?>
        <h1>Forma per modifikimin e Kategorisë</h1>
        <?php
            $kategoria =mysqli_fetch_assoc(merrKategoriId($_GET['kategoriaid']));
        }?>
        <br>
        <form method="post" action="lib/kategori.php">
            <input style="display: none" type="text"  name="kategoriaid" value="<?php if (isset($_GET['kategoriaid'])){ echo $_GET['kategoriaid'];} ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" value="<?php if(isset($_GET['kategoriaid'])) echo $kategoria['emri'];?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <textarea id="pershkrimi" name="pershkrimi" rows="10"><?php if(isset($_GET['kategoriaid'])) echo $kategoria['pershkrimi'];?></textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php if (!isset($_GET['kategoriaid'])){?>
                        <button id="shtoKategori" name="shtoKategori" class="shtoModifiko">Shto Kategori</button>
                    <?php } else {?>
                        <button id="modifikoKategori" name="modifikoKategori" class="shtoModifiko">Modifiko Kategori</button> <br>
                    <?php }?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once 'includes/footer.php'?>

