<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
    <h1>SZKOLENIA</h1>
    </header>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'szkolenia');
    $q = 'SELECT kod, nazwa, cena FROM kursy ORDER BY cena ASC';
    $mq = mysqli_query($db, $q);
    echo "<main>";
    echo "<section id = 'lewy' >";
    echo "<table>";
    echo "<th>Kurs</th><th>Nazwa</th><th>Cena</th>";
    while($row = mysqli_fetch_assoc($mq)){
        echo "<tr>";
        echo "<td>"."<img src = '".$row['kod'].".jpg' alt = 'kurs'>"."</td>";
        echo "<td>".$row['nazwa']."</td>";
        echo "<td>".$row['cena']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</section>";


    echo "<section id = 'prawo'>";
    echo "<h2>Zapisy na kursy</h2>";
    echo "<form method = 'POST'>";
    echo "<label>Imię</label><br>";
    echo "<input type='text' name = 'imie'><br>";

    echo "<label>Nazwisko</label><br>";
    echo "<input type='text' name = 'nazwisko'><br>";

    echo "<label>Wiek</label><br>";
    echo "<input type='number' name = 'wiek'><br>";

    echo "<label>Rodzaj kursu</label><br>";
    $q2 = 'SELECT nazwa FROM kursy';
    $mq2 = mysqli_query($db, $q2);
    echo "<select name='rodzaj'>";
        while($row2 = mysqli_fetch_assoc($mq2)){
            echo "<option value = '".$row2['nazwa']."'>".$row2['nazwa']."</option>";
        }
    echo "</select><br>";

    echo "<button type='submit' name = 'dodaj' >Dodaj dane</button>";

    echo "</form>";
        if(isset($_POST['dodaj'])){
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $wiek = $_POST['wiek'];
        $rodzaj = $_POST['rodzaj'];
        if($imie == "" || $nazwisko == "" || $wiek == null){
            echo "Wprowadz dane";
        }
        else{
            
            $q3 = 'INSERT INTO uczestnicy (imie, nazwisko, wiek) VALUES ("'.$imie.'", "'.$nazwisko.'", "'.$wiek.'")';
            mysqli_query($db, $q3); 
            echo "Dane uczestnika ".$imie." ".$nazwisko." zostały dodane";
        }
    }
    echo "</section>";
    echo "</main>";

    mysqli_close($db);
    ?>
    <footer><p>Strone wykonał: 00000000000</p></footer>
</body>
</html>