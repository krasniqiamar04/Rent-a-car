<?php
include_once 'includes/header.php';
include_once 'includes/sqlFunctions.php';
?>

<section class="list-entity container">
    <div class="image">
        <img src="img/car7.jpg" alt="">
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Kategoria</th>
            <th>Numri i regjistrimit</th>
            <th>Pershkrimi</th>
            <th>Kostoja</th>
            <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
            <th>Modifiko</th>
            <th>Fshiej</th>
            <?php endif; ?>

        </tr>
        </thead>
        <tbody>

        <?php
        $automjetet = merrAutomjetet();
        while ($automjeti = mysqli_fetch_assoc($automjetet)) :
            ?>
            <tr>
                <td><?php echo $automjeti['emri']; ?></td>
                <td><?php echo $automjeti['kategoria']; ?></td>
                <td><?php echo $automjeti['nr_regjistrimi']; ?></td>
                <td><?php echo $automjeti['pershkrimi']; ?></td>
                <td><?php echo $automjeti['kostoja']; ?> &euro; / per dite</td>

                <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
                    <td id="modifiko">
                        <a href="shto_modifiko_automjete.php?automjetiid=<?php echo $automjeti['automjetiid']; ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td id="fshiej">
                        <form action="lib/automjet.php" method="post">
                            <input type="text" name="automjetiid" hidden
                                   value="<?php echo $automjeti['kategoriaid'] ?>">
                            <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                                    name="btnFshij" onclick="return fshijKategori()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <script>
                            function fshijKategori() {
                                $confirm = confirm('A jeni te sigurt qe doni ta fshini automjetin?');
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
        <?php endwhile; ?>
        </tbody>
    </table>
    <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
        <a href="shto_modifiko_automjete.php" id="add_entity"><i class="fas fa-plus"></i> Shto Automjet</a>
    <?php endif; ?>

</section>

<?php include_once 'includes/footer.php' ?>
