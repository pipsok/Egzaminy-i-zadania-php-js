<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <a href="wczasy.html">Wczasy</a>
        <a href="wycieczki.html">Wycieczki</a>
        <a href="allinclusive.html">All inclusive</a>
    </nav>
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form action="index.php" method = "POST">
                <label for="lista1">Miejsce wycieczki</label> <br>
                <select name="lista1" id="lista1">
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'wyprawy');
                        $q = 'SELECT nazwa FROM miejsca ORDER BY nazwa ASC';
                        $mq = mysqli_query($db,$q);
                        while($row = mysqli_fetch_assoc($mq)){
                            echo "<option value = '".$row['nazwa']."'>".$row['nazwa']."</option>";
                        }
                    ?>
                </select>
                <label for="dorosli">Ile dorosłych?</label> <br> 
                <input type="number" name = "dorosli" id = "dorosli"> <br>
                <label for="dzieci">Ile dzieci?</label> <br>
                <input type="number" name = "dzieci" id = "dzieci"> <br>
                <label for="dataw">Termin</label> <br>
                <input type="date" name = "dataw" id = "dataw"> <br>
                <button type = "submit" id = "symulacja" name = "symulacja">Symulacja ceny</button>
            </form>
            <h4>Koszt wycieczki</h4>
            <?php
                if(isset($_POST['symulacja'])){
                    $lista1 = $_POST['lista1'];
                    $dorosli = $_POST['dorosli'];
                    $dzieci = $_POST['dzieci'];
                    $dataw = $_POST['dataw'];
                    $q2 = 'SELECT cena FROM miejsca WHERE nazwa = "'.$lista1.'"';
                    $mq2 = mysqli_query($db, $q2);
                    while($row2 = mysqli_fetch_assoc($mq2)){
                        $cena = ($dorosli * $row2['cena']) + ($dzieci * $row2['cena'])*0.5 ;
                        echo "<p>"."W dniu: ".$dataw."</p>";
                        echo "<p>".$cena." złotych"."</p>";
                    }
                }
            ?>
        </aside>
        <section>
            <h3>Wycieczki</h3>
            <?php
                $q3 = 'SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE "0%"';
                $mq3 = mysqli_query($db,$q3);
                while($row3 = mysqli_fetch_assoc($mq3)){
                    echo "<div class = 'wycieczka'>"
                    ."<img src = '".$row3['link_obraz']."' alt = 'zdjęcie z wycieczki'>".
                    "<h2>".$row3['nazwa']."</h2>".
                    "<p>".$row3['cena']."</p>".
                    "</div>";
                }
                mysqli_close($db);
            ?>
        </section>
        <footer>
            <p>Autor: 00000000000</p>
        </footer>
    </main>
</body>
</html>