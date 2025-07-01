<?php
session_start();

if((isset($_SESSION['flaga']) && (!isset($_SESSION['corr'])))){
if($_SESSION['flaga']=="strona3"){   
    
    print '
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularze umiejętności technicznych apilkacji CV</title>
    <meta name="author" content="Michał Dłubak">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Umiejętności techniczne</h1>
</header>
<main>
<form method="post" action="skrypt.php" >

<div id="this_field" class="this_field_in">  
    
<h2>Języki programowania i technologie</h2>     
    <label for="php" style="padding-right:38px">PHP       </label><input type="checkbox" name="php" id="php"><br>
    <label for="js"  >JavaScript</label><input type="checkbox" name="javascript" id="js"><br>
    <label for="html" style="padding-right:22px">HTML      </label><input type="checkbox" name="html" id="html"><br>
    <label for="css" style="padding-right:39px">CSS       </label><input type="checkbox" name="css" id="css"><br>
    <p arial-label="Po zaznaczeniu dostępnych opcji języków programowania kliknij .'."Przejdź dalej".'.">Po zaznaczeniu dostępnych opcji języków programowania kliknij "Przejdź dalej"<br><br>
    <button id="go" type="button">Przejdź dalej</button>
</div>

<div id="this_field2" class="this_field_out">
    
<h2>Języki programowania i technologie</h2> 
<label for="inny">Inny język</label><input type="checkbox" id="inny"><br><br>
    <label class="other" for="prog" style="display:none">Wpisz inne języki programowania </label><input type="text" placeholder="Wpisz inne języki programowania" class="other" style="display:none" id="prog">   <br><br>    
    <button type="button" class="other" style="display:none" id="add_prog">Dodaj kolejny język programowania</button><br><br>
    <p class="other" style="display:none">Po pisaniu wszystkich języków  programowania kliknij "Przejdź dalej"</p>
<button id="go2" type="button">Przejdź dalej</button>
</div>


<div id="this_field3"  class="this_field_out">

<h2>Języki programowania i technologie</h2>   
    <label for="mysql" style="padding-right:26px">MySQL</label><input type="checkbox" name="mysql" id="mysql"><br><br>    
    <label for="postgresql">PostgreSQL</label><input type="checkbox" name="postgresql" id="postgresql"><br><br>
    Po zaznaczeniu dostępnych opcji technologii kliknij "Przejdź dalej"<br><br>
<button id="go3" type="button">Przejdź dalej</button>
</div>

<div id="this_field4" class="this_field_out">
 
<h2>Języki programowania i technologie</h2>   
<label for="tech">Inna technologia</label><input type="checkbox" id="tech"><br><br>
    <label for="other_technol" class="other_tech" style="display:none">Wpisz inne technologie</label>
    <input type="text" id="other_technol" placeholder="Wpisz inne technologie" class="other_tech" style="display:none"><br><br>
   <button type="button" id="next_tech" class="other_tech" style="display:none">Dodaj  kolejną technologię</button><br><br>
 <button id="go4" type="button">Przejdź dalej</button>
</div>

<div id="this_field5" class="this_field_out">
 
<h2>Frameworki i środowiska:</h2>
    <label for="Symfony" style="padding-right:64px">Symfony</label><input type="checkbox" name="Symfony" id="Symfony"><br>
    <label for="Laravel" style="padding-right:74px">Laravel</label><input type="checkbox" name="Laravel" id="Laravel"><br>
    <label for="visual" >Visual Studio 2022</label><input type="checkbox" name="Visual" id="visual"><br>
    <label for="android" style="padding-right:24px">Android Studio</label><input type="checkbox" name="Android" id="android"><br>
    <label for="React"  style="padding-right:87px">React</label><input type="checkbox" name="React" id="React"><br>
    <label for="Angular" style="padding-right:71px">Angular</label><input type="checkbox" name="Angular" id="Angular"><br><br>
    Po zaznaczeniu dostępnych opcji frameworków kliknij "Przejdź dalej"<br><br>
    <button id="go5" type="button">Przejdź dalej</button>  
</div>

<!--frameworki-->
<div id="this_field6" class="this_field_out">

<h2>Frameworki i środowiska:</h2>

<label for="frame">Inny framework</label><input type="checkbox" id="frame"><br>
    <label for="this_frame" style="display:none" class="other_frame">Wpisz inne frameworki </label><input type="text" id="this_frame" placeholder="Inne frameworki" style="display:none" class="other_frame">
    <button type="button" id="next_frame" class="other_frame" style="display:none">Dodaj inny framework</button><br> 

<label for="skill">Inne umiejętności</label><input type="checkbox" id="skill"><br>   
    <label for="this_skill" class="other_skill" style="display:none">Wpisz inne umiejętności </label><input type="text" id="this_skill" placeholder="Inne umiejętności" class="other_skill" style="display:none">
    <button type="button" id="next_skill" class="other_skill" style="display:none">Dodaj inną umiejętność</button><br> 

<button id="go6" type="button">Przejdź dalej</button>
</div>

<div id="this_field7" class="this_field_out">
 
<h2>Języki obce</h2>
    <label for="ang">Angielski</label><input type="checkbox" id="ang"><br>
<select name="lang_ang" class="this_field_out" id="l_ang">
    <optgroup label="Język angielski">
    <option value="Angielski A1">Angielski A1</option>
    <option value="Angielski A2">Angielski A2</option>
    <option value="Angielski B1">Angielski B1</option>
    <option value="Angielski B2">Angielski B2</option>
    <option value="Angielski C1">Angielski C1</option>
    <option value="Angielski C2">Angielski C2</option>
</select>
    <label for="de">Niemiecki</label><input type="checkbox" id="de"><br>
<select name="lang_deu" class="this_field_out" id="l_de">
    <optgroup label="Język niemiecki">
    <option value="Niemiecki A1">Niemiecki A1</option>
    <option value="Niemiecki A2">Niemiecki A2</option>
    <option value="Niemiecki B1">Niemiecki B1</option>
    <option value="Niemiecki B2">Niemiecki B2</option>
    <option value="Niemiecki C1">Niemiecki C1</option>
    <option value="Niemiecki C2">Niemiecki C2</option>
</select>
    <label for="fr">Francuski</label><input type="checkbox" id="fr"><br>
<select name="lang_fr" class="this_field_out" id="l_fr">
    <optgroup label="Język francuski">
    <option value="Francuski A1">Francuski A1</option>
    <option value="Francuski A2">Francuski A2</option>
    <option value="Francuski B1">Francuski B1</option>
    <option value="Francuski B2">Francuski B2</option>
    <option value="Francuski C1">Francuski C1</option>
    <option value="Francuski C2">Francuski C2</option>
</select>
    <label for="ru">Rosyjski</label><input type="checkbox" id="ru"><br>
<select name="lang_ru" class="this_field_out" id="l_ru">
    <optgroup label="Język rosyjski">
    <option value="Rosyjski A1">Rosyjski A1</option>
    <option value="Rosyjski A2">Rosyjski A2</option>
    <option value="Rosyjski B1">Rosyjski B1</option>
    <option value="Rosyjski B2">Rosyjski B2</option>
    <option value="Rosyjski C1">Rosyjski C1</option>
    <option value="Rosyjski C2">Rosyjski C2</option>
</select>
    <label for="la">Włoski</label><input type="checkbox" id="la"><br>
<select name="wl" class="this_field_out" id="l_la">
    <optgroup label="Język włoski">
    <option value="Włoski A1">Włoski A1</option>
    <option value="Włoski A2">Włoski A2</option>
    <option value="Włoski B1">Włoski B1</option>
    <option value="Włoski B2">Włoski B2</option>
    <option value="Włoski C1">Włoski C1</option>
    <option value="Włoski C2">Włoski C2</option>
</select>
<p arial-label="Po wybraniu wszystkich języków z opcji kiknij "Wybierz język"">Po wybraniu wszystkich języków z opcji kiknij "Wybierz język"</p>
<button id="add_lang" type="button" arial-label="wybierz język">Wybierz język</button><br><br>
<p arial-label="Wyślij kompletne dane">Wyślij kompletne dane do CV</p>
<input type="submit" value="Wyślij kompletne dane" name="send"><br><br>

</div>
</form>

</main>
</body>
</html>';}
else{header('location:Strona_1.php');}
}

else if((isset($_SESSION['flaga']) && (isset($_SESSION['corr'])))){
if($_SESSION['flaga']=="strona3"){  

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
    
   //programs 
    print'
    <form action="skrypt.php" method="post">
    <h3>Języki programowania i technologie</h3>';

    

    $sql="Select * from programms where cv = ?";
    $params = [$_SESSION['id']];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params); 
    
    $arr=[];
    $php=$js=$html=$css=$mysql=$postg="";

    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){$arr[]=$result['progr'];}
     
    foreach($arr as $prog){ 
   if($prog=="PHP")$php="checked";
   if($prog=="JavaScript")$js="checked";
   if($prog=="HTML")$html="checked";
   if($prog=="CSS")$css="checked";
   if($prog=="MySQL")$mysql="checked";
   if($prog=="PostgreSQL")$postg="checked";}

     

print'
    <label for="php1">PHP</label><input type="checkbox" name="php" value="PHP" '.$php.' id="php1"><br>
    <label for="js1">JavaScript</label><input type="checkbox" name="javascript" value="JavaScript" '.$js.' id="js1"><br>
    <label for="html1">HTML</label><input type="checkbox" name="html" value="HTML" '.$html.' id="html1"><br>
    <label for="css1">CSS</label><input type="checkbox" name="css" value="CSS" '.$css.' id="css1"><br>
    <label for="mysql1">MySQL</label><input type="checkbox" name="mysql" value="MySQL" '.$mysql.' id="mysql1"><br>
   <label for="postgresql1">PostgreSQL</label><input type="checkbox" name="postgresql" value="PostgreSQL" '.$postg.' id="postgresql1"><br>';

    if(isset($_SESSION['add_prog'])){
    if(!empty($_SESSION['add_prog'])){
    foreach($_SESSION['add_prog'] as $prog){
$sql = "Insert into programms (progr, cv) values (?,?)";
$params = [$prog, $_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);}}}

    $sql="Select * from programms where cv = ?";
    $params = [$_SESSION['id']];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
       $i=0;
      
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            
        if(!in_array($result['progr'],["PHP","JavaScript","HTML","CSS","MySQL","PostgreSQL"])) {
           print '<label for="'.$result["progr"].'">' . $result["progr"] . '</label><input type="checkbox" name="prog['.$i.']" value="'.$result["progr"].'" checked id="'.$result["progr"].'"><br>';
          $i++;
        }}  
        
    print '<button type="button" id="plus">Dodaj kolejny język programowania</button><br>';
    print '<div class="plus"></div><br>';
   
//frameworks

    print '<h3>Frameworki i środowiska</h3>';
    $sql="Select * from frameworks where cv = ?";
    $params = [$_SESSION['id']];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

     $fr_arr=[];
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){  
       $fr_arr[]=$result['frame']; 
    }

    $sf=$lv=$vis=$ar=$ra=$ag="";
    foreach($fr_arr as $frame){
   if($frame=="Symfony")$sf="checked";
   if($frame=="Laravel")$lv="checked";
   if($frame=="Visual Studio 2022")$vis="checked";
   if($frame=="Android Studio")$ar="checked";
   if($frame=="React")$ra="checked";
   if($frame=="Angular")$ag="checked";}
    
    
   print '<label for="sf">Symfony</label><input type="checkbox" name="symfony" value="Symfony" '.$sf.' id="sf"><br>
    <label for="lv">Laravel</label><input type="checkbox" name="laravel" value="Laravel" '.$lv.' id="lv"><br>
    <label for="vis">Visual Studio 2022</label><input type="checkbox" name="visual" value="Visual Studio 2022" '.$vis.' id="vis"><br>
    <label for="ar">Android Studio</label><input type="checkbox" name="android" value="Android Studio" '.$ar.' id="ar"><br>
    <label for="ra">React</label><input type="checkbox" name="react" value="React" '.$ra.' id="ra"><br>
    <label for="ag1">Angular</label><input type="checkbox" name="angular" value="Angular" '.$ag.' id="ag1 "><br>';

    $sql = "Select * from frameworks where cv = ?";
    $params = [$_SESSION['id']];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
        $j = 0;        
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
     if(!in_array($result['frame'],["Symfony","Laravel","Visual Studio 2022","Android Studio","React","Angular"])){
        print '<label for="'.$result['frame'].'">'.$result['frame'].'</label><input type="checkbox" name="frame['.$j.']" value="'.$result['frame'].'" checked id="'.$result['frame'].'"><br>';
        $j++;
     }    
    }
 

    print '<button type="button" id="plus_fram">Dodaj kolejny framework</button><br>';
    print '<div class="plus"></div><br>';
//inne umiejętności


$sql = "Select * from skills where cv = ?";
    $params = [$_SESSION['id']];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

  print '<h3>Inne umiejętności</h3>';

  $k=0;  
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    if(!empty($result['id'])>0){
    print '<label for="'.$result["skill"].'">'.$result["skill"].'</label><input type="checkbox" name="skill['.$k.']" value="'.$result["skill"].'" checked id="'.$result["skill"].'"><br>';
$k++;
}
else{
    print"";
}
}


print "<br>";
print '<button type="button" id="plus_skill">Dodaj kolejną umiejętność</button><br>';
print '<div class="plus"></div><br>';

//języki

$sql = "Select * from languages where cv = ?";
$params = [$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$lang=[];
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $lang[]=$result['lang'];}

print'<br>
<h3>Języki obce</h3>
<select name="lang_ang">
    <optgroup label="Język angielski">';
    
$ang=$angA1=$angA2=$angB1=$angB2=$angC1=$angC2="";
foreach($lang as $find_lang){
    if($find_lang == "Angielski")$ang='selected';
    if($find_lang == "Angielski A1")$angA1='selected';
    if($find_lang == "Angielski A2")$angA2='selected';
    if($find_lang == "Angielski B1")$angB1='selected';
    if($find_lang == "Angielski B2")$angB2='selected';
    if($find_lang == "Angielski C1")$angC1='selected';
    if($find_lang == "Angielski C2")$angC2='selected';
}

print "<option $ang value=''>Angielski</option>;
       <option value='Angielski A1' $angA1>Angielski A1</option>
       <option value='Angielski A2' $angA2>Angielski A2</option>
       <option value='Angielski B1' $angB1>Angielski B1</option>
       <option value='Angileski B2' $angB2>Angielski B2</option> 
       <option value='Angielski C1' $angC1>Angielski C1</option>
       <option value='Angielski C2' $angC2>Angielski C2</option>";
    print '</select><br><br>';


 print'<select name="lang_deu">
    <optgroup label="Język niemiecki">';
    
$deu=$deuA1=$deuA2=$deuB1=$deuB2=$deuC1=$deuC2="";
foreach($lang as $find_lang){
    if($find_lang == "Niemiecki")$ang='selected';
    if($find_lang == "Niemiecki A1")$deuA1='selected';
    if($find_lang == "Niemiecki A2")$deuA2='selected';
    if($find_lang == "Niemiecki B1")$deuB1='selected';
    if($find_lang == "Niemiecki B2")$deuB2='selected';
    if($find_lang == "Niemiecki C1")$deuC1='selected';
    if($find_lang == "Niemiecki C2")$deuC2='selected';
}

print "<option $ang value=''>Niemiecki</option>;
       <option value='Niemiecki A1' $deuA1>Niemiecki A1</option>
       <option value='Niemiecki A2' $deuA2>Niemiecki A2</option>
       <option value='Niemiecki B1' $deuB1>Niemiecki B1</option>
       <option value='Niemiecki B2' $deuB2>Niemiecki B2</option> 
       <option value='Niemiecki C1' $deuC1>Niemiecki C1</option>
       <option value='Niemiecki C2' $deuC2>Niemiecki C2</option>";
    print '</select><br><br>';

print'<select name="lang_fra">
    <optgroup label="Język francuski">';
    
$fra=$fraA1=$fraA2=$fraB1=$fraB2=$fraC1=$fraC2="";
foreach($lang as $find_lang){
    if($find_lang == "Francuski")$fra='selected';
    if($find_lang == "Francuski A1")$fraA1='selected';
    if($find_lang == "Francuski A2")$fraA2='selected';
    if($find_lang == "Francuski B1")$fraB1='selected';
    if($find_lang == "Francuski B2")$fraB2='selected';
    if($find_lang == "Francuski C1")$fraC1='selected';
    if($find_lang == "Francuski C2")$fraC2='selected';
}

print "<option $fra value=''>Francuski</option>;
       <option value='Francuski A1' $fraA1>Francuski A1</option>
       <option value='Francuski A2' $fraA2>Francuski A2</option>
       <option value='Francuski B1' $fraB1>Francuski B1</option>
       <option value='Francuski B2' $fraB2>Francuski B2</option> 
       <option value='Francuski C1' $fraC1>Francuski C1</option>
       <option value='Francuski C2' $fraC2>Francuski C2</option>";
    print '</select><br><br>';


    print'<select name="lang_ru">
    <optgroup label="Język rosyjski">';
    
$ru=$ruA1=$ruA2=$ruB1=$ruB2=$ruC1=$ruC2="";
foreach($lang as $find_lang){
    if($find_lang == "Rosyjski")$ru='selected';
    if($find_lang == "Rosyjski A1")$ruA1='selected';
    if($find_lang == "Rosyjski A2")$ruA2='selected';
    if($find_lang == "Rosyjski B1")$ruB1='selected';
    if($find_lang == "Rosyjski B2")$ruB2='selected';
    if($find_lang == "Rosyjski C1")$ruC1='selected';
    if($find_lang == "Rosyjski C2")$ruC2='selected';
}

print "<option $ru value=''>Rosyjski </option>;
       <option value='Rosyjski A1' $ruA1>Rosyjski A1</option>
       <option value='Rosyjski A2' $ruA2>Rosyjski A2</option>
       <option value='Rosyjski B1' $ruB1>Rosyjski B1</option>
       <option value='Rosyjski B2' $ruB2>Rosyjski B2</option> 
       <option value='Rosyjski C1' $ruC1>Rosyjski C1</option>
       <option value='Rosyjski C2' $ruC2>Rosyjski C2</option>";
    print '</select><br><br>';

  print'<select name="lang_la">
    <optgroup label="Język włoski">';
    
$la=$laA1=$laA2=$laB1=$laB2=$laC1=$laC2="";
foreach($lang as $find_lang){
    if($find_lang == "Włoski")$la='selected';
    if($find_lang == "Włoski A1")$laA1='selected';
    if($find_lang == "Włoski A2")$laA2='selected';
    if($find_lang == "Włoski B1")$laB1='selected';
    if($find_lang == "Włoski B2")$laB2='selected';
    if($find_lang == "Włoski C1")$laC1='selected';
    if($find_lang == "Włoski C2")$laC2='selected';
}

print "<option value='' $la >Włoski</option>;
       <option value='Włoski A1' $laA1>Włoski A1</option>
       <option value='Włoski A2' $laA2>Włoski A2</option>
       <option value='Włoski B1' $laB1>Włoski B1</option>
       <option value='Włoski B2' $laB2>Włoski B2</option> 
       <option value='Włoski C1' $laC1>Włoski C1</option>
       <option value='Włoski C2' $laC2>Włoski C2</option>";
print '</select><br><br>';
   
print '<br><br>';
print "<input type='submit' value='Popraw dane' name='end'>";
print '</form>';
}}


else{header('location:Strona_1.php');}
?>
<script src="skrypt.js"></script>
   <script>
let plus = document.getElementById('plus');
let divs = document.getElementsByClassName('plus');
let plus_fram = document.getElementById('plus_fram');
let plus_skill = document.getElementById('plus_skill');

let f = 0; 
if (divs.length > 0) {
    plus.addEventListener('click', () => {
        let input = document.createElement('input');
        input.type = 'text';
        input.name = `add_prog[${f}]`;  
        input.placeholder = 'Wpisz język';
        f++;
        divs[0].appendChild(input);
    });
}

let j = 0; 
if (divs.length > 1) {
    plus_fram.addEventListener('click', () => {
        let input1 = document.createElement('input');
        input1.type = 'text';
        input1.name = `add_frame[${j}]`;
        input1.placeholder = 'Wpisz framework';
        j++;
        divs[1].appendChild(input1);
    });
}

let k = 0; 
if (divs.length > 2) {
    plus_skill.addEventListener('click', () => {
        let input2 = document.createElement('input');
        input2.type = 'text';
        input2.name = `add_skill[${k}]`;
        input2.placeholder = 'Wpisz umiejętność';
        k++;
        divs[2].appendChild(input2);
    });
}
</script>