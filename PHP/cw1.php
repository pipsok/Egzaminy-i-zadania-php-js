<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">

<input type="text" name="imie" placeholder="Imię">
<input type="number" name="wiek" placeholder="Wiek">

<button type="submit" name= "przycisk">Wyślij</button>

</form>
    <?php
        if(isset($_POST['przycisk'])){
            $imie = $_POST['imie'];
            $wiek = $_POST['wiek'];

            echo "Hej ".$imie." masz ".$wiek." lat";
        }
    ?>
</body>
</html>