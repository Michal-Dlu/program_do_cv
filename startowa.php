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
    <title>Witamy na stronie Curriculum Vitae</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<header>
    <h1>Witamy na stronie Curriculum Vitae</h1>
</header>
<main>
<section id="question1">
    <h2>Jesteś tu pierwszy raz?</h2>
    <p>Proszę kliknąć na przycisk poniżej, aby przejść do formularza aplikacyjnego.</p>
</section>
<section id="qusetion2">
<form method="post" action="Strona_1.php">
    <input type="submit" value="Tak, przejdź dalej" aria-label="Przejdź dalej do wpypełniania aplikacji">
</form>
<br>
<h3>Jestem tu po raz kolejny</h3>
<p>Proszę wypełnić pola formularza poniżej wpisanymi wcześniej danymi, aby przejść do gotowego CV.</p>
<form method="post" action="warunek.php" id="myForm">
    <label for = "name">Imię: </label>
    <input type = "text" placeholder="Wpisz imię" name="user_name" id="name" required aria-label="Imię" aria-describedby="name-error">
    <span id="name-error" class="error-message" aria-live="assertive"></span><br><br>
    <label for = "surname">Nazwisko: </label><input type = "text" placeholder="Wpisz nazwisko" name="user_surname" id="surname" required aria-label="Nazwisko" aria-describedby="surname-error">
    <span id="surname-error" class="error-message" aria-live="assertive"></span><br><br>
    <br><br>
    <label for = "password">Hasło: </label><input type = "password" placeholder="Wpisz min.8-znakowe hasło" name="password" id="password" required aria-label="Hasło" aria-describedby="password-error">
    <span id="password-error" class="error-message" aria-live="assertive"></span><br><br>
    <br><br>
    Zatwierdź formularz: <button type = "button" name="start" id="btn" aria-label="Zatwierdź formularz">Przejdź do gotowego CV</button><br><br>
    <label for = "reset">Wyczyść dane: </label><input type = "reset" value="Wyczyść" id="reset" aria-label="Wyczyść dane formularza">
</form>
</section>
</main>
</body>
</html>
<script>
    let pass = document.getElementById('password');
    let btn = document.getElementById('btn');
   
    let name = document.getElementById('name');
    let surname = document.getElementById('surname');

    const inpName = document.getElementById('name');
    const errName = document.getElementById('name-error');

    inpName.addEventListener('blur', function(){
        if(!inpName.value){
             errName.textContent="Imię jest wymagane!";
        }
        else errName.textContent="";
    })

    const inpSurname = document.getElementById('surname');
    const errSurname = document.getElementById('surname-error');

    inpSurname.addEventListener('blur', function(){
        if(!inpSurname.value){
             errSurname.textContent="Nazwisko jest wymagane!";
        }
        else errSurname.textContent="";
    })

    
    const inpPass = document.getElementById('password');
    const errPass = document.getElementById('password-error');

    inpPass.addEventListener('blur', function(){
        if(!inpPass.value){
             errPass.textContent="Hasło jest wymagane!";
        }
        else errPass.textContent="";
    })

    btn.addEventListener('click', function (){
     if(pass.value.length<8){
    alert(`Brakuje ${8-pass.value.length} znaków`);return;}
    if(name.value=="" || surname.value==""){alert('Imię i nazwisko nie mogą być puste!');return;}
    else{document.getElementById('myForm').submit();<?php $_SESSION['start']="start";?>}
}
   )
</script>
    
    

