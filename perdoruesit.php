<?php include_once 'includes/header.php'?>

<section class="list-entity container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="filter">
        <form action="">
            <input type="radio" name="filter" id="te_gjithe" checked>
            <label for="te_gjithe">Te gjith | </label>
            <input type="radio" name="filter">
            <label for="te_gjithe">Klientet | </label>
            <input type="radio" name="filter">
            <label for="te_gjithe">Staf | </label>
            <input type="radio" name="filter">
            <label for="te_gjithe">Administratoret</label>
            <input type="submit" class="btn-filtro" value="Filtro">
        </form>
    </div>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Roli</th>
            <th>Nr personal</th>
            <th>Email</th>
            <th>Nr telefonit</th>
            <th>Modifiko</th>
            <th>Fshiej</th>
        </tr>
        </thead>
        <tbody>
        <tr class="active-row">
            <td>Filan</td>
            <td>Fisteku</td>
            <td>Staf</td>
            <td>234234234</td>
            <td>filan@fisteku.com</td>
            <td>044-111-222</td>
            <td><a href="shto_modifiko_perdorues.php"><i class="fas fa-edit"></i></a></td>
            <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
        </tr>
        <tr class="active-row">
            <td>Filan</td>
            <td>Fisteku</td>
            <td>Staf</td>
            <td>234234234</td>
            <td>filan@fisteku.com</td>
            <td>044-111-222</td>
            <td><a href="shto_modifiko_perdorues.php"><i class="fas fa-edit"></i></a></td>
            <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
        </tr>
        </tbody>
    </table>
    <a href="shto_modifiko_perdorues.php" id="add_entity"><i class="fas fa-plus"></i> Shto Perdorues</a>
</section>

<?php include_once 'includes/footer.php'?>
