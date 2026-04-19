<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <nav>
        <div onclick = "blok1()" id = "blok1">Baza<!--skryptjs--></div>    
        <div onclick = "blok2()" id = "blok2">Opisy<!--skryptjs--></div>
        <div onclick = "blok3()" id = "blok3">Galeria<!--skryptjs--></div>
    </nav>
    <main>

        <section name = "sekcja1" id = "sekcja1"> 
            <h3>Baza Smoków</h3>
            <form action="smoki.php" method = "POST">
                <select name="lista">
                    <?php
                        $db = mysqli_connect('localhost','root', '', 'smoki');
                        $q = 'SELECT DISTINCT pochodzenie FROM smok GROUP BY pochodzenie ASC';
                        $mq = mysqli_query($db, $q);
                        while($row = mysqli_fetch_assoc($mq)){
                            echo "<option value = '".$row['pochodzenie']."'>".$row['pochodzenie']."</option>";
                        }
                    ?>
                </select>
                <button type = "submit" name = "szukaj">Szukaj</button>
            </form>
            <table>
                <th>Nazwa</th><th>Długość</th><th>Szerokość</th>
                    <?php
                        if(isset($_POST['szukaj'])){
                            $kraj = $_POST["lista"];
                            $q2 = 'SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = "'.$kraj.'"';
                            $mq2 = mysqli_query($db, $q2);
                            while($row2 = mysqli_fetch_assoc($mq2)){
                                echo "<tr>";
                                echo "<td>".$row2['nazwa']."</td>";
                                echo "<td>".$row2['dlugosc']."</td>";
                                echo "<td>".$row2['szerokosc']."</td>";
                                echo "</tr>";
                            }
                        }
                        //PAMIETAC O TYM UKLADZIE TABELI PIERDOLONYM!!!!!!!!!!!!!!
            mysqli_close($db);
            ?>
            </table>
        </section>

        <section name = "sekcja2" id = "sekcja2">
            <h3>Opisy smoków</h3>
            <!--LISTA DEFINICJI PAMIETAC-->
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
  
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>

                <dt>Smok niebieski </dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>

        </section>

        <section name = "sekcja3" id = "sekcja3">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 00000000000</p>
    </footer>
    <script>
        let blok11 = document.getElementById("blok1");
        let blok22 = document.getElementById("blok2");
        let blok33 = document.getElementById("blok3");
        let sekcja1 = document.getElementById("sekcja1");
        let sekcja2 = document.getElementById("sekcja2");
        let sekcja3 = document.getElementById("sekcja3");

        function blok1(){
            blok11.style.backgroundColor = "mistyrose";
            blok22.style.backgroundColor = "#FFAEA5";
            blok33.style.backgroundColor = "#FFAEA5";
            sekcja1.style.display = "block";
            sekcja2.style.display = "none";
            sekcja3.style.display = "none";
        }
        function blok2(){
            blok11.style.backgroundColor = "#FFAEA5";
            blok22.style.backgroundColor = "mistyrose";
            blok33.style.backgroundColor = "#FFAEA5";
            sekcja1.style.display = "none";
            sekcja2.style.display = "block";
            sekcja3.style.display = "none";
        }
        function blok3(){
            blok11.style.backgroundColor = "#FFAEA5";
            blok22.style.backgroundColor = "#FFAEA5";
            blok33.style.backgroundColor = "mistyrose";
            sekcja1.style.display = "none";
            sekcja2.style.display = "none";
            sekcja3.style.display = "block";
        }
    </script>
</body>
</html>