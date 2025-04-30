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
<h1>Doświadczenie zawodowe</h1>
<form method="post" action="skrypt.php">
    <input type="text" placeholder="Lata: " name="work"><br> 
    <input type="text" placeholder="Zakład pracy" name="work_place"><br>
    <textarea placeholder="Opisz zakres obowiązków" name="experience"></textarea>
    <input type="submit" value="Dodaj kolejną pozycję" name="Add_experience"><input type="submit" value="Wyślij" name="ok3"><input type="reset" value="Wyczyść"> 
</form>
</body>
</html>