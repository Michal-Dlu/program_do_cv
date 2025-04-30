<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<fieldset>
    <form method="post" action="skrypt.php" ENCTYPE="multipart/form-data">
        <input type="text" placeholder="Wprowadz imię" name="name" require value='<?php if($_SESSION["name"])print $_SESSION["name"]?>'><br>
        <input type="text" placeholder="Wprowadz nazwisko" name="surname" require><br>
        <input type="text" placeholder="Wprowadź datę urodzenia" name="born" require><br>
        <input type="text" placeholder="Wprowadz adres zamieszkania" name="adress" require><br>
        <input type="email" placeholder="Wprowadz adres email" name="email" require><br>
        <input type="tel" placeholder="123 456 789" name="phone" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" require><br>
        <textarea placeholder="Opisz swój profil zawodowy" name="professional_profile" require></textarea>
        Zdjęcie: <input type="file" name="foto" require>
        <input type="submit" value="Wyślij" name='ok'><input type="reset" value="Wyczyść">
    </form>
    </fieldset>
</body>
</html>