<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fromularz doświadczenia zawodowego aplikacji CV</title>
    <meta name="author" content="Michał Dłubak">
    <link rel="stylesheet" href="style.css">
</head>
<?php

if(!isset($_SESSION['corr']) && (isset($_SESSION['flaga']))){
 
if($_SESSION['flaga']=="strona2"){
print "
<body>
<header>
<h1>Doświadczenie zawodowe</h1>
</header>
<main>
<form method='post' action='skrypt.php'>
<fieldset><legend>Formularz doświadczenia zawodowego</legend>
    <label for='work'>Lata pracy: </label><input type='text' placeholder='Lata: ' name='work' id='work' aria-label='lata pracy'><br> 
    <label for='work_place'>Zakład pracy: </label><input type='text' placeholder='Zakład pracy' name='work_place' id='work_place' aria-label='miejsce pracy'><br>
    <label for='experience'>Zakres obowiązków: </label><textarea placeholder='Opisz zakres obowiązków' name='experience' id='experience' aria-label='zakres obowiązków'></textarea><br>
    <input type='submit' value='Dodaj kolejną pozycję' name='Add_experience' aria-label='dodaj kolejną pracę'><br><br>
    Po dodaniu już wszystkich pozycji doświadczenia zawodowego kliknij 'Przejdź dalej'<br><br>
    <input type='submit' value='Przejdź dalej' name='ok3' aria-label='przejdź dalej'><br><br>
    <label>Wyczyść wpisane dane<input type='reset' value='Wyczyść wpisane dane' aria-label='wyczyść wpisane dane'></label>
</fieldset> 
</form>
";}

else{header('location:Strona_1.php');}
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
        <label for="correction">Wybierz do poprawy</label><select name="del" style="font-size:10px;" id="corr_select" aria-label="wybierz do poprawy" id="correction">';
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
</form>
';

print '<form action="skrypt.php" method="POST">
    <fieldset>
    <legend>Dodaj kolejną pozycję</legend>  
    <label for="work0">Lata pracy: </label><input type="text" placeholder="Lata: " name="work" id="work0" aria-label="lata pracy"><br> 
    <label for="work_place0">Zakład pracy: </label><input type="text" placeholder="Zakład pracy" name="work_place" id="work_place0" aria-label="miejsce pracy"><br>
    <label for="experience0">Zakres obowiązaków: </label><textarea placeholder="Opisz zakres obowiązków " name="experience" id="experience0" aria-label="zakres obowiązków"></textarea>
    <input type="submit" value="Dodaj kolejną pozycję" name="add_next_experience" aria-label="dodaj kolejną pracę"><br><br>
    Po dodaniu już wszystkich pozycji doświadczenia zawodowego kliknij "Przejdź dalej"<br><br>
    <input type="submit" value="Przejdź dalej" name="next_ok" aria-label="przejdź dalej"><br><br>
    <label>Wyczyść wpisane dane<input type="reset" value="Wyczyść wpisane dane" aria-label="wyczyść wpisane dane"></label> 
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
    <label for='work1'>Lata pracy: </label><input type='text' placeholder='Lata: ' name='work' value='$work' id='work1' aria-label='lata pracy'><br> 
    <label for='work_place1'>Miejsce pracy: </label><input type='text' placeholder='Zakład pracy' name='work_place' value='$work_place' aria-label='miejsce pracy' id='work_place1'><br>
    <label for='experience1'>Opisz zakres obowiązków: </label><textarea placeholder='Opisz zakres obowiązków' name='experience' id='experience1' aria-label='zakres obowiązków'>$experience</textarea>
  
    <input type='submit' value='Popraw' name='input_correct' aria-label='popraw dane'>
</fieldset>
</form>
";}    
  }else{header('location:Strona_1.php');}
}
else{ header('location:Strona_1.php');}

?>
</main>
</body>
</html>
