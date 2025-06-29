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
 
if($_SESSION['flaga']=="strona2"){
print "
<body>
<h1>Doświadczenie zawodowe</h1>

<form method='post' action='skrypt.php'>
<fieldset>
    <input type='text' placeholder='Lata: ' name='work'><br> 
    <input type='text' placeholder='Zakład pracy' name='work_place'><br>
    <textarea placeholder='Opisz zakres obowiązków' name='experience'></textarea><br>
    <input type='submit' value='Dodaj kolejną pozycję' name='Add_experience'><br><br>
    Po dodaniu już wszystkich pozycji doświadczenia zawodowego kliknij 'Wyślij'<br><br>
    <input type='submit' value='Wyślij' name='ok3'><input type='reset' value='Wyczyść'>
</fieldset> 
</form>";}
else{;header('location:Strona_1.php');}
exit();
}




if(isset($_SESSION['corr']) && isset($_SESSION['flaga'])){
  if($_SESSION['flaga']=="strona2") {
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

    $sql="Select * from doswiadczenie where cv = ? order by id desc";
    $params = [$_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);
    $i=1;
    print '<h1>Doświadczenie zawodowe</h1>
    Zmień liniję: <br><br>
<form action="" method="POST"> 
        <fieldset><legend>Poraw wcześniejszy wpis</legend>
        <select name="del" style="font-size:10px;" id="corr_select">';
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id= $result['id'];
        $work = $result['work'];
        $work_place = $result['work_place'];
        $experience = $result['experience'];
        $cv= $result['cv'];    
       
        print '<option value="'.$id.'">'.$i."."." ".$work." ".$work_place." ".$experience.'<br>'.'</option>';        
       $i++;
    }
        print'</select>';
                         
        print '<p><input type="submit" name= "inp_corr" value="Do poprawy"></p>
  </fieldset>
</form>';

print '<form action="skrypt.php" method="POST">
    <fieldset>
    <legend>Dodaj kolejną pozycję</legend>  
    <input type="text" placeholder="Lata: " name="work"><br> 
    <input type="text" placeholder="Zakład pracy" name="work_place"><br>
    <textarea placeholder="Opisz zakres obowiązków " name="experience"></textarea>
    <input type="submit" value="Dodaj kolejną pozycję" name="add_next_experience"><br><br>
    Po dodaniu już wszystkich pozycji doświadczenia zawodowego kliknij "Przejdź dalej"<br><br>
    <input type="submit" value="Przejdź dalej" name="next_ok"><input type="reset" value="Wyczyść"> 
    </fieldset> 
    </form>';

 if(isset($_POST['inp_corr'])){
    unset($_SESSION['corr_id']);
    $corr_id = $_POST['del'];
    $_SESSION['corr_id']=$corr_id;
    $sql="Select * from doswiadczenie where id = ? and cv = ?";
    $params = [$corr_id, $_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
$work=$result['work'];
$work_place=$result['work_place'];
$experience=$result['experience'];
}
print"
<body>
<h1>Doświadczenie zawodowe</h1>

<form method='post' action='skrypt.php'>
<fieldset>
<legend>Poraw wcześniejszy wpis</legend>
    <input type='text' placeholder='Lata: ' name='work' value='$work'><br> 
    <input type='text' placeholder='Zakład pracy' name='work_place' value='$work_place'><br>
    <textarea placeholder='Opisz zakres obowiązków' name='experience'>$experience</textarea>
  
    <input type='submit' value='Popraw' name='input_correct'>
</fieldset>
</form>
";}    
  }else{header('location:Strona_1.php');}
}
else{ header('location:Strona_1.php');}

?>
</body>
</html>

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
 
if($_SESSION['flaga']=="strona2"){
print "
<body>
<h1>Doświadczenie zawodowe</h1>

<form method='post' action='skrypt.php'>
<fieldset>
    <input type='text' placeholder='Lata: ' name='work'><br> 
    <input type='text' placeholder='Zakład pracy' name='work_place'><br>
    <textarea placeholder='Opisz zakres obowiązków' name='experience'></textarea><br>
    <input type='submit' value='Dodaj kolejną pozycję' name='Add_experience'><br><br>
    Po dodaniu już wszystkich pozycji doświadczenia zawodowego kliknij 'Wyślij'<br><br>
    <input type='submit' value='Wyślij' name='ok3'><input type='reset' value='Wyczyść'>
</fieldset> 
</form>";}
else{;header('location:Strona_1.php');}
exit();
}




if(isset($_SESSION['corr']) && isset($_SESSION['flaga'])){
  if($_SESSION['flaga']=="strona2") {
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

    $sql="Select * from doswiadczenie where cv = ? order by id desc";
    $params = [$_SESSION['id']];
    $stmt=$pdo->prepare($sql);
    $stmt->execute($params);
    $i=1;
    print '<h1>Doświadczenie zawodowe</h1>
    Zmień liniję: <br><br>
<form action="" method="POST"> 
        <fieldset><legend>Poraw wcześniejszy wpis</legend>
        <select name="del" style="font-size:10px;" id="corr_select">';
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id= $result['id'];
        $work = $result['work'];
        $work_place = $result['work_place'];
        $experience = $result['experience'];
        $cv= $result['cv'];    
       
        print '<option value="'.$id.'">'.$i."."." ".$work." ".$work_place." ".$experience.'<br>'.'</option>';        
       $i++;
    }
        print'</select>';
                         
        print '<p><input type="submit" name= "inp_corr" value="Do poprawy"></p>
  </fieldset>
</form>';

print '<form action="skrypt.php" method="POST">
    <fieldset>
    <legend>Dodaj kolejną pozycję</legend>  
    <input type="text" placeholder="Lata: " name="work"><br> 
    <input type="text" placeholder="Zakład pracy" name="work_place"><br>
    <textarea placeholder="Opisz zakres obowiązków " name="experience"></textarea>
    <input type="submit" value="Dodaj kolejną pozycję" name="add_next_experience"><br><br>
    Po dodaniu już wszystkich pozycji doświadczenia zawodowego kliknij "Przejdź dalej"<br><br>
    <input type="submit" value="Przejdź dalej" name="next_ok"><input type="reset" value="Wyczyść"> 
    </fieldset> 
    </form>';

 if(isset($_POST['inp_corr'])){
    unset($_SESSION['corr_id']);
    $corr_id = $_POST['del'];
    $_SESSION['corr_id']=$corr_id;
    $sql="Select * from doswiadczenie where id = ? and cv = ?";
    $params = [$corr_id, $_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);

while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
$work=$result['work'];
$work_place=$result['work_place'];
$experience=$result['experience'];
}
print"
<body>
<h1>Doświadczenie zawodowe</h1>

<form method='post' action='skrypt.php'>
<fieldset>
<legend>Poraw wcześniejszy wpis</legend>
    <input type='text' placeholder='Lata: ' name='work' value='$work'><br> 
    <input type='text' placeholder='Zakład pracy' name='work_place' value='$work_place'><br>
    <textarea placeholder='Opisz zakres obowiązków' name='experience'>$experience</textarea>
  
    <input type='submit' value='Popraw' name='input_correct'>
</fieldset>
</form>
";}    
  }else{header('location:Strona_1.php');}
}
else{ header('location:Strona_1.php');}

?>
</body>
</html>

