<?php
session_start();
if(isset($_SESSION['alert'])){print $_SESSION['alert'];session_unset();}
else {print "";

unset($_SESSION['corr']);
unset($_SESSION['id']);
unset($_SESSION['corr_id']);
unset($_SESSION['start']);
$_SESSION['flaga']="strona4";}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Witamy na stronie Curriculum Vitae</h1>
    <h4>Jesteś tu pierwszy raz?</h4>
<form method="post" action="Strona_1.php">
    <input type="submit" value="Tak, przejdź dalej">
</form>
<br>
<h4>Jestem tu poraz kolejny</h4>
<form method="post" action="warunek.php" id="myForm">
    <input type = "text" placeholder="Wpisz imię" name="user_name" id="name" required>
    <input type = "text" placeholder="Wpisz nazwisko" name="user_surname" id="surname" required>
    <input type = "password" placeholder="Wpisz 8-znakowe hasło" name="password" id="password" required>
    <button type = "button" name="start" id="btn">Przejdź do gotowego CV</button><br>
    <input type = "reset" value="Wyczyść">
</form>
</body>
</html>
<script>
    let pass = document.getElementById('password');
    let btn = document.getElementById('btn');
   
    let name = document.getElementById('name');
    let surname = document.getElementById('surname');

    btn.addEventListener('click', function (){
     if(pass.value.length<8){
    alert(`Brakuje ${8-pass.value.length} znaków`);return;}
    if(name.value=="" || surname.value==""){alert('Imię i nazwisko nie mogą być puste!');return;}
    else{document.getElementById('myForm').submit();<?php $_SESSION['start']="start";?>}
}
   )
</script>
    
    

