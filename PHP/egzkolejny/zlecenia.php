<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header><h1>Malowanie i gipsowanie</h1></header>
    <main>
        <nav>
        <a href="kontakt.html">Kontakt</a>
        <a href="https://remonty.pl" target = "_blank">Partnerzy</a>
        </nav>
                <aside>
        <img src="tapeta_lewa.png" alt="uslugi">
        <img src="tapeta_prawa.png" alt="uslugi">
        <img src="tapeta_lewa.png" alt="uslugi">
    </aside>
    <section id = "lewa">
        <h2>Dla klientow</h2>
    <form method = "POST">
    <label>Ilu conajmniej pracownikow potrzebujesz?</label><br>
    <input type="number" name = "liczbap">
    <button type = 'submit' name = "szukaj">Szukaj</button> <br> <br> <br>
    </form>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'remonty');

    if(isset($_POST['szukaj'])){
        $liczbap = $_POST['liczbap'];
        if($liczbap == null){

        }
        else{
        $q = 'SELECT nazwa_firmy, liczba_pracownikow from wykonawcy where liczba_pracownikow >= "'.$liczbap.'"';
        $mq = mysqli_query($db, $q);
        while($row = mysqli_fetch_assoc($mq)){
            echo "<p>".$row['nazwa_firmy'].", ".$row['liczba_pracownikow']." pracowników"."</p>";
        }
        }
    }
    ?>
    </section>
    <section id="srodkowa">
        <h2>Dla wykonawców</h2>
    <form method = "POST">
    <select name="miasto">
    <?php
        $q2 = "SELECT DISTINCT miasto from klienci ORDER By miasto ASC";
        $mq2 = mysqli_query($db, $q2);
        while($row2 = mysqli_fetch_assoc($mq2)){
            echo "<option value = '".$row2['miasto']."'>".$row2['miasto']."</option>";
        }
    ?>
    </select> <br>
    <input type="radio" value = "malowanie" name = "radio1" checked>malowanie <br>
    <input type="radio" value = "gipsowanie" name = "radio1">gipsowanie <br> <br>
    <button type = "submit" name="szukaj2">Szukaj klientow</button>
    </form>
    <?php
    if(isset($_POST['szukaj2'])){
        $miasto = $_POST['miasto'];
        $rodzaj = $_POST['radio1'];
        $q3 = "SELECT klienci.imie, zlecenia.cena from klienci JOIN zlecenia ON klienci.id_klienta = zlecenia.id_klienta where klienci.miasto = '".$miasto."' and zlecenia.rodzaj = '".$rodzaj."'";
        $mq3 = mysqli_query($db,$q3);
        echo "<ul>";
            while($row3 = mysqli_fetch_assoc($mq3)){
                echo "<li>".$row3['imie']." - ".$row3['cena']."</li>";
            }
        echo "</ul>";
    }
    mysqli_close($db);
    ?>
    </section>

    </main>
    <footer><b>Stronę wykonał: 00000000000</b></footer>
</body>
</html>