<?php include_once 'includes/header.php' ?>
<?php include_once 'includes/sqlFunctions.php' ?>

<section class="list-entity container">
    <div class="image">
        <img src="img/car9.jpg" alt="">
    </div>

    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Pershkrimi</th>
            <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
                <th style="width: 10%;">Modifiko</th>
                <th style="width: 10%;">Fshiej</th>
            <?php else : ?>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php
        $kategorit = merrKategorit();

        while ($kategoria = mysqli_fetch_assoc($kategorit)) { ?>
            <tr>
                <td><?php echo $kategoria['emri']; ?></td>
                <td><?php echo $kategoria['pershkrimi']; ?></td>
                <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
                    <td id="modifiko">
                        <a href="shto_modifiko_kategori.php?kategoriaid=<?php echo $kategoria['kategoriaid']; ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td id="fshiej">
                        <form action="lib/kategori.php" method="post">
                            <input type="text" name="kategoriaid" hidden value="<?php echo $kategoria['kategoriaid']?>">
                            <button type="submit" style="border: none;background-color:transparent;cursor:pointer;" name="btnFshij" onclick="return fshijKategori()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <script>
                            function fshijKategori() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini kategorine?');
                                if ($confirm) {
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        </script>
                    </td>
                <?php endif; ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
        <a href="shto_modifiko_kategori.php" id="add_entity"><i class="add_entity fas fa-plus"></i> Shto Kategori</a>
    <?php endif; ?>
</section>

<?php include_once 'includes/footer.php' ?>
