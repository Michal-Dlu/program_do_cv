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
<html lang="pl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body dir="ltr">
<section id="banner">
    <h1>Witamy na stronie Curriculum Vitae</h1>
</section>
<section id="question1">
    <h2>Jesteś tu pierwszy raz?</h2>
    <p>Proszę kliknąć na przycisk poniżej, aby przejść do formularza aplikacyjnego.</p>
</section>
<section id="qusetion2">
<form method="post" action="Strona_1.php">
    <input type="submit" value="Tak, przejdź dalej" aria-label="Przejdź dalej">
</form>
<br>
<h2>Jestem tu po raz kolejny</h2>
<p>Proszę wypełnić pola formularza poniżej wpisanymi wcześniej danymi, aby przejść do gotowego CV.</p>
<form method="post" action="warunek.php" id="myForm">
    <label for = "name">Imię: </label><input type = "text" placeholder="Wpisz imię" name="user_name" id="name" required aria-label="Imię"><br><br>
    <label for = "surname">Nazwisko: </label><input type = "text" placeholder="Wpisz nazwisko" name="user_surname" id="surname" required aria-label="Nazwisko"><br><br>
    <label for = "password">Hasło: </label><input type = "password" placeholder="Wpisz min.8-znakowe hasło" name="password" id="password" required aria-label="Hasło"><br><br>
    <label for = "btn">Zatwierdź: </label><button type = "button" name="start" id="btn" aria-label="Zatwierdź">Przejdź do gotowego CV</button><br><br>
    <label for = "reset">Wyczyść dane: </label><input type = "reset" value="Wyczyść" id="reset" aria-label="Wyczyść dane formularza">
</form>
</section>
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
    
    

