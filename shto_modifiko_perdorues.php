<?php include_once 'includes/header.php'?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Perdorues</h1>
        <h1>Forma per editimin e Perdorues</h1>
        <br>
        <form action="#">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri">
            </div>
            <div class="inputAndLabels">
                <label for="roli">Roli</label> <br>
                <select id="roli" name="roli">
                    <option value="Klient">Klient</option>
                    <option value="Staf">Staf</option>
                    <option value="Administrator">Administrator</option>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="nrPersonal">Nr personal</label> <br>
                <input type="text" id="nrPersonal" name="nrPersonal">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email">
            </div>
            <div class="inputAndLabels">
                <label for="tel">Nr telefonit</label> <br>
                <input type="tel" id="tel" name="nr_telefonit">
            </div>
            <div class="inputAndLabels">
                <label for="adresa">Adresa</label> <br>
                <input type="text" id="adresa" name="adresa">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <a href="#" id="modifikoPerdorues" name="modifikoPerdorues" style="display: none"
                       class="shtoModifiko">Modifiko Perdorues</a> <br>
                    <a href="#" id="shtoPerdorues" name="shtoPerdorues" class="shtoModifiko">Shto Perdorues</a>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include_once 'includes/footer.php'?>

