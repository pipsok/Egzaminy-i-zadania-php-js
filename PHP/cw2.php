
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,th{
        border: solid 1px black;
        padding: 20px;
        border-collapse: collapse;
        margin: auto;
        }
    </style>
</head>
<body>
    <form method="POST">
    Marka: <select name="id_m">
        <?php
        $editmodel = "hello";
        $db = mysqli_connect('localhost', 'root', '', 'auta');
        $q = "SELECT id,marka FROM marki";
        $mq = mysqli_query($db,$q);
        while($row = mysqli_fetch_assoc($mq)){
            echo "<option value = '".$row['id']."'>".$row['marka']."</option>";
        }
        mysqli_close($db);
        ?>
    </select> <br> <br>
    <input type="text" name="model" placeholder="Model"> <br> <br>
    <input type="number" name="cena" placeholder="Cena"> <br> <br>
    Kraj: <select name="id_k">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'auta');
        $q = "SELECT id,kraj FROM pochodzenie";
        $mq = mysqli_query($db,$q);
        while($row = mysqli_fetch_assoc($mq)){
            echo "<option value = '".$row['id']."'>".$row['kraj']."</option>";
        }
        mysqli_close($db);
        ?>
    </select> <br> <br>
    <input type="text" name="kolor" placeholder="Kolor"> <br> <br>

    <button type="submit" name="dodaj">Dodaj auto</button>

    </form>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'auta');
    if(isset($_POST['dodaj'])){
        $model = $_POST['model'];
        $cena = $_POST['cena'];
        $kolor = $_POST['kolor'];
        $id_m = $_POST["id_m"];
        $id_k = $_POST["id_k"];
        $q = "INSERT INTO auto (id_m, model, cena, id_k, kolor) VALUES ('$id_m', '$model', '$cena', '$id_k', '$kolor')";    
        mysqli_query($db,$q);
        header("Location: cw2.php");
    }

    if(isset($_POST['usun'])){
        $id = $_POST['usun'];
        $q2 = "DELETE FROM auto WHERE id = $id";
        mysqli_query($db, $q2);
        header("Location: cw2.php");
    }

if(isset($_POST['zapisz'])){
                    $id = $_POST['zapisz'];
                    $editmodel = $_POST['editmodel'];
                    $editcena = $_POST['editcena'];
                    $editkolor = $_POST['editkolor'];
                    $editmarka = $_POST['editmarka'];
                    $editkraj = $_POST['editkraj'];
                    //$qupdate = "UPDATE auto SET id_m = '$editmarka', model = '$editmodel', cena = $editcena, id_k = $editkraj, kolor = $editkolor WHERE id = $id";
                    $qupdate = "UPDATE auto SET model = '$editmodel' , kolor = '$editkolor' , cena = $editcena, id_m = $editmarka, id_k = $editkraj WHERE id = $id";
                    mysqli_query($db, $qupdate);
                    header("Location: cw2.php");
                }

    $q1 = "SELECT auto.id,marki.marka,model,cena,pochodzenie.kraj,kolor FROM auto JOIN marki ON marki.id = auto.id_m JOIN pochodzenie ON pochodzenie.id = auto.id_k";
    $mq = mysqli_query($db,$q1);
    $id_edytowany = null;

    if(isset($_POST['edytuj'])){
        $id_edytowany = $_POST['edytuj'];
    }
    echo "<table>";
    echo "<tr><th>ID</th><th>Marka</th><th>Model</th><th>Cena</th><th>Kraj</th><th>Kolor</th><th>Usun</th><th>Edytuj</th></tr>";
        while($row = mysqli_fetch_assoc($mq)){

            echo "<tr>";
            if($row['id'] == $id_edytowany){
                echo "<form method='POST'>";
                echo "<td>".$row['id']."</td>";

                echo "<td>";
                    $qmarka = "SELECT id, marka FROM marki";
                    $mqmarka = mysqli_query($db, $qmarka);
                    echo "<select name='editmarka'>";
                        while($rowmarka = mysqli_fetch_assoc($mqmarka)){
                            $selected = ($rowmarka['id'] == $row['id_m']) ? "selected" : "";
                            echo "<option value='".$rowmarka['id']."'>".$rowmarka['marka']."</option>";
                        }
                    echo "</select>";
                echo "</td>";

                echo "<td>"."<input type='text' name = 'editmodel' value = '".$row['model']."'>"."</td>";
                echo "<td>"."<input type='number' name = 'editcena' value = '".$row['cena']."'>"."</td>";
                echo "<td>";
                    $qkraj = "SELECT id, kraj FROM pochodzenie";
                    $mqkraj = mysqli_query($db, $qkraj);

                    echo "<select name='editkraj' >";
                        while($rowkraj = mysqli_fetch_assoc($mqkraj)){
                            $selected = ($rowkraj['id'] == $row['id_k']) ? "selected" : "";
                            echo "<option value='".$rowkraj['id']."'>".$rowkraj['kraj']."</option>";
                        }
                    echo "</select>";
                echo "</td>";
                echo "<td>"."<input type='text' name = 'editkolor' value = '".$row['kolor']."'>"."</td>";
                echo "<td>"."<button type='submit' name='usun' value='".$row['id']."'>Usun</button>"."</td>";
                echo "<td>"."<button type='submit' name='zapisz' value='".$row['id']."'>zapisz</button>"."</td>";
                echo "</form>";
                
            }
            else{
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['marka']."</td>";
                echo "<td>".$row['model']."</td>";
                echo "<td>".$row['cena']."</td>";
                echo "<td>".$row['kraj']."</td>";
                echo "<td>".$row['kolor']."</td>";
                echo "<td>"."<form method='POST'>"."<button type='submit' name='usun' value='".$row['id']."'>Usun</button>"."</form>"."</td>";
                echo "<td>"."<form method='POST'>"."<button type='submit' name='edytuj' value='".$row['id']."'>Edytuj</button>"."</form>"."</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>
</body>
</html>