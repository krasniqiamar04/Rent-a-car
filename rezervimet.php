<?php
include_once 'includes/header.php';
include_once 'includes/sqlFunctions.php';
?>
<section class="list-entity container">
    <div class="image">
        <img src="img/car10.png" alt="">
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemer</th>
            <th>Automobili</th>
            <th>Nr. regjistrimit</th>
            <th>Kategoria</th>
            <th>Data e marrjes</th>
            <th>Data e kthimit</th>
            <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
            <th>Modifiko</th>
            <th>Fshiej</th>
            <?php endif; ?>

        </tr>
        </thead>
        <tbody>
        <?php
        $rezervimet = merrRezervimet();
        While ($rezervimi = mysqli_fetch_assoc($rezervimet)) :
        ?>
        <tr class="active-row">
            <td><?php echo $rezervimi['emri_perdoruei']?></td>
            <td><?php echo $rezervimi['mbiemri']?></td>
            <td><?php echo $rezervimi['emri_atomjetit']?></td>
            <td><?php echo $rezervimi['nr_regjistrimi']?></td>
            <td><?php echo $rezervimi['emri_kategoria']?></td>
            <td><?php echo $rezervimi['dataemarrjes']?></td>
            <td><?php echo $rezervimi['dataekthimit']?></td>
            <?php if (isset($_SESSION['id']) && $_SESSION['roli'] == 'Administrator') : ?>
            <td><a href="shto_modifiko_rezervim.php?rezervimiid=<?php echo $rezervimi['rezervimiid']?>"><i class="fas fa-edit"></i></a></td>
            <td id="fshiej">
                <form action="lib/rezervim.php" method="post">
                    <input type="text" name="rezervimiid" hidden
                           value="<?php echo $rezervimi['rezervimiid'] ?>">
                    <button type="submit" style="border: none;background-color:transparent;cursor:pointer;"
                            name="btnFshij" onclick="return fshijrezervim()">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
                <script>
                    function fshijrezervim() {
                        $confirm = confirm('A jeni te sigurt qe doni ta fshini rezervim?');
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
    <a href="shto_modifiko_rezervim.php" id="add_entity"><i class="fas fa-plus"></i> Shto Rezervim</a>
</section>

<?php include_once 'includes/footer.php'?>
