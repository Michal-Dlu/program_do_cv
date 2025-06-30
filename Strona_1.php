<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Dłubak">
    <title>Formularz wstępny aplikacji CV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Formularz wstępny aplikacji CV</h1>
</header>
<main>
<?php
session_start();
$flaga="strona1";
$_SESSION['flaga']=$flaga;
unset($_SESSION['programsData']);
?>
    <?php
    $name="";
    $surname = "";
    $born = "";
    $adress="";
    $email="";
    $phone="";
    $professional_profile="";
    $val="Wyślij";
    $input="<label for='reset'>Wyczyść dane formularza</label><input type='reset' value='Wyczyść' id='reset'  >";
    $inp_name="ok";
    $password ="";
    $disabled="";

        if(isset($_POST['correct'])){
    try{
    $host='localhost';
    $dbname = 'curiculum';
    $user = 'root';
    $password = "";
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    $pdo-> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die('Błąd połącznia z bazą danych: '.$e->Message());
    }

    $sql="Select * from cv where id = ? order by id desc";
    $params = [$_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id= $result['id'];
        $name = $result['name'];
        $surname = $result['surname'];
        $born = $result['born'];
        $adress= $result['adres'];
        $email=$result['email'];
        $phone=$result['phone'];
        $professional_profile=$result['professional_profile'];
        $password="";
        
        
    }
    $val="Popraw";
    $input="";
    $inp_name="corr";
    $disabled = "disabled";
}
    
print"

    <form method='post' action='skrypt.php' ENCTYPE='multipart/form-data' .form-container>
    <fieldset><legend>Formularz wstępny</legend>
        <label for='name'>Imię: </label><input type='text' placeholder='Wprowadz imię' name='name' required value='$name' aria-label='Imię' id='name'><br><br>
        <label for='surname'>Nazwisko: </label><input type='text' placeholder='Wprowadz nazwisko' name='surname' required value='$surname' aria-label='Nazwisko' id='surname'><br><br>
        <label for='password'>Hasło: </label><input type='password' placeholder='Wpisz min.8-znakowe hasło' name='password' $disabled reqiured value='$password' pattern='.{8,}' title='Hasło musi mieć 8 znaków' aria-label='Hasło' id='password'><br><br>
        <label for='born'>Rok  urodzenia: </label><input type='text' placeholder='Wprowadź rok urodzenia' name='born' required value='$born' id='born'><br><br>
        <label for='adress'>Adres zamieszkania: </label><input type='text' placeholder='Wprowadz adres zamieszkania' name='adress' required value='$adress' id='adress'><br><br>
        <label for='mail'>Email: </label><input type='email' placeholder='Wprowadz adres email' name='email' required value='$email' aria-label='Email' id='mail'><br><br>
        <label for='phone'>Telefon: </label><input type='tel' placeholder='123 456 789' name='phone' pattern='[0-9]{3} [0-9]{3} [0-9]{3}' required value='$phone' aria-label='Telefon' id='phone'><br><br>
        <label for='prof'>Profil zawodowy: </label><textarea placeholder='Opisz swój profil zawodowy' name='professional_profile' required  rows='6' cols='50' aria-label='Opisz profil zawodowy' id='prof' >$professional_profile</textarea><br><br><br>
        <label for='foto'>Zdjęcie: </label><input type='file' name='foto' required id='foto' aria-label='Fotografia' id='foto'><br><br>
        <label for='send'>Zatwierdź i wyślij dane: </label><input type='submit' value='$val' name='$inp_name' aria-label='Zatwierdź formularz' id='send'><br><br>$input
    </fieldset>
        </form>
";

?>
</main>
</body>

</html>
