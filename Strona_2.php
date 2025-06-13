<<<<<<< HEAD
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

if(!isset($_SESSION['corr']) && (isset($_SESSION['flaga']))){
if($_SESSION['flaga']=="strona1"){

print'

<body>
<h1>Wykształcenie</h1>

    <form action="skrypt.php" method="POST">
    <fieldset>  
    <input type="text" placeholder="Lata: " name="study"><br> 
    <input type="text" placeholder="Szkoła lub uczelnia" name="school"><br>
    <textarea placeholder="Opisz kierunek, tytuł naukowy" name="academic"></textarea>
    <input type="submit" value="Dodaj kolejną szkołę" name="Add_data"><br><br>
    Gdy wszystkie szkoły już zostały dodane kliknij wyślij<br><br>
    <input type="submit" value="Przejdź dalej" name="ok1"><input type="reset" value="Wyczyść"> 
    </fieldset> 
    </form>

</body>
</html>';}
else{header('location:Strona_1.php');}
}
else if(isset($_SESSION['corr']) && isset($_SESSION['flaga'])){
  if($_SESSION['flaga']=="strona1") {
   
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

    $sql="Select * from wyksztalcenie where cv = ? order by id desc";
    $params = [$_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);
    $i=1;
    print '<h1>Wykształcenie</h1>
    Zmień liniję: <br><br>
<form action="" method="POST"> 
        <fieldset>
        <legend>Wybierz wcześniejsze wpisy do poprawy</legend>
        <select name="del" style="font-size:10px;" id="corr_select">';
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id= $result['id'];
        $study = $result['study'];
        $school = $result['school'];
        $academic = $result['academic'];
        $cv= $result['cv'];    
       
        print '<option value="'.$id.'">'.$i."."." ".$study." ".$school." ".$academic.'<br>'.'</option>';        
       $i++;
    }
        print'</select>';
                         
        print '<p><input type="submit" name= "inp_corr" value="Do poprawy"></p>
  </fieldset>
</form><br><br><br>';

print '<form action="skrypt.php" method="POST">
    <fieldset>
    <legend>Dodaj kolejną pozycję</legend>  
    <input type="text" placeholder="Lata: " name="study"><br> 
    <input type="text" placeholder="Szkoła lub uczelnia" name="school"><br>
    <textarea placeholder="Opisz kierunek, tytuł naukowy" name="academic"></textarea>
    <input type="submit" value="Dodaj kolejną szkołę" name="Add_next_data"><br><br>
    Gdy wszystkie szkoły już zostały dodane kliknij wyślij<br><br>
    <input type="submit" value="Przejdź dalej" name="next_ok1"><input type="reset" value="Wyczyść"> 
    </fieldset> 
    </form>';


if(isset($_POST['inp_corr'])){
    $corr_id = $_POST['del'];
    $_SESSION['corr_id']=$corr_id;
    $sql="Select * from wyksztalcenie where id = ? and cv = ?";
    $params = [$corr_id, $_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
$study=$result['study'];
$school=$result['school'];
$academic=$result['academic'];
}
print"
<body>
<h1>Wykształcenie</h1>

    <form action='skrypt.php' method='POST'><br>
    <fieldset> <legend>Popraw pozycję</legend>  
    
    <input type='text' placeholder='Lata: ' name='study'  value='$study'><br> 
    <input type='text' placeholder='Szkoła lub uczelnia' name='school'  value='$school'><br>

    <textarea placeholder='Opisz kierunek, tytuł naukowy' name='academic' >$academic</textarea><br>
    
    <input type='submit' value='Popraw' name='input_corr'><br><br><br>
    </fieldset>
</form>";


print "</body>
</html>";
}    
}
else{header('location:Strona_1.php');}
}
else{header('location:Strona_1.php');}

?>

=======
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

if(!isset($_SESSION['corr']) && (isset($_SESSION['flaga']))){
if($_SESSION['flaga']=="strona1"){

print'

<body>
<h1>Wykształcenie</h1>

    <form action="skrypt.php" method="POST">
    <fieldset>  
    <input type="text" placeholder="Lata: " name="study"><br> 
    <input type="text" placeholder="Szkoła lub uczelnia" name="school"><br>
    <textarea placeholder="Opisz kierunek, tytuł naukowy" name="academic"></textarea>
    <input type="submit" value="Dodaj kolejną szkołę" name="Add_data"><br><br>
    Gdy wszystkie szkoły już zostały dodane kliknij wyślij<br><br>
    <input type="submit" value="Przejdź dalej" name="ok1"><input type="reset" value="Wyczyść"> 
    </fieldset> 
    </form>

</body>
</html>';}
else{header('location:Strona_1.php');}
}
else if(isset($_SESSION['corr']) && isset($_SESSION['flaga'])){
  if($_SESSION['flaga']=="strona1") {
   
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

    $sql="Select * from wyksztalcenie where cv = ? order by id desc";
    $params = [$_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);
    $i=1;
    print '<h1>Wykształcenie</h1>
    Zmień liniję: <br><br>
<form action="" method="POST"> 
        <fieldset>
        <legend>Wybierz wcześniejsze wpisy do poprawy</legend>
        <select name="del" style="font-size:10px;" id="corr_select">';
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id= $result['id'];
        $study = $result['study'];
        $school = $result['school'];
        $academic = $result['academic'];
        $cv= $result['cv'];    
       
        print '<option value="'.$id.'">'.$i."."." ".$study." ".$school." ".$academic.'<br>'.'</option>';        
       $i++;
    }
        print'</select>';
                         
        print '<p><input type="submit" name= "inp_corr" value="Do poprawy"></p>
  </fieldset>
</form><br><br><br>';

print '<form action="skrypt.php" method="POST">
    <fieldset>
    <legend>Dodaj kolejną pozycję</legend>  
    <input type="text" placeholder="Lata: " name="study"><br> 
    <input type="text" placeholder="Szkoła lub uczelnia" name="school"><br>
    <textarea placeholder="Opisz kierunek, tytuł naukowy" name="academic"></textarea>
    <input type="submit" value="Dodaj kolejną szkołę" name="Add_next_data"><br><br>
    Gdy wszystkie szkoły już zostały dodane kliknij wyślij<br><br>
    <input type="submit" value="Przejdź dalej" name="next_ok1"><input type="reset" value="Wyczyść"> 
    </fieldset> 
    </form>';


if(isset($_POST['inp_corr'])){
    $corr_id = $_POST['del'];
    $_SESSION['corr_id']=$corr_id;
    $sql="Select * from wyksztalcenie where id = ? and cv = ?";
    $params = [$corr_id, $_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
$study=$result['study'];
$school=$result['school'];
$academic=$result['academic'];
}
print"
<body>
<h1>Wykształcenie</h1>

    <form action='skrypt.php' method='POST'><br>
    <fieldset> <legend>Popraw pozycję</legend>  
    
    <input type='text' placeholder='Lata: ' name='study'  value='$study'><br> 
    <input type='text' placeholder='Szkoła lub uczelnia' name='school'  value='$school'><br>

    <textarea placeholder='Opisz kierunek, tytuł naukowy' name='academic' >$academic</textarea><br>
    
    <input type='submit' value='Popraw' name='input_corr'><br><br><br>
    </fieldset>
</form>";


print "</body>
</html>";
}    
}
else{header('location:Strona_1.php');}
}
else{header('location:Strona_1.php');}

?>

>>>>>>> 32768ff769e9ac4d274f228495da083fca9dd3ce
