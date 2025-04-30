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
<h1>Wykszatłcenie</h1>
    <form action="skrypt.php" method="POST">  
    <input type="text" placeholder="Lata: " name="study" require><br> 
    <input type="text" placeholder="Szkoła lub uczelnia" name="school" require><br>
    <textarea placeholder="Opisz kierunek, tytuł naukowy" name="academic" require></textarea>
    <input type="submit" value="Dodaj kolejną szkołę" name="Add_data"><input type="submit" value="Wyślij" name="ok1"><input type="reset" value="Wyczyść"> 

</form>
</body>
</html>