<?php
session_start();
$flaga="strona1";
$_SESSION['flaga']=$flaga;
unset($_SESSION['programsData']);
var_dump($_SESSION);
var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $name="";
    $surname = "";
    $born = "";
    $adress="";
    $email="";
    $phone="";
    $professional_profile="";
    $val="Wyślij";
    $input="<input type='reset' value='Wyczyść'>";
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

    <form method='post' action='skrypt.php' ENCTYPE='multipart/form-data'>
    <fieldset>
        <input type='text' placeholder='Wprowadz imię' name='name' required value='$name'><br>
        <input type='text' placeholder='Wprowadz nazwisko' name='surname' required value='$surname'><br>
        <input type='password' placeholder='Wpisz min.8-znakowe hasło' name='password' $disabled reqiured value='$password' pattern='.{8,}' title='Hasło musi mieć 8 znaków'><br>
        <input type='text' placeholder='Wprowadź rok urodzenia' name='born' required value='$born'><br>
        <input type='text' placeholder='Wprowadz adres zamieszkania' name='adress' required value='$adress'><br>
        <input type='email' placeholder='Wprowadz adres email' name='email' required value='$email'><br>
        <input type='tel' placeholder='123 456 789' name='phone' pattern='[0-9]{3} [0-9]{3} [0-9]{3}' required value='$phone'><br>
        <textarea placeholder='Opisz swój profil zawodowy' name='professional_profile' required  rows='6' cols='50'>$professional_profile</textarea><br><br>
        Zdjęcie: <input type='file' name='foto' required ><br><br>
        <input type='submit' value='$val' name='$inp_name'>$input
    </fieldset>
        </form>
";

?>


</body>

</html>