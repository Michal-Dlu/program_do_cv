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
<body>
<h1>Umiejętności techniczne</h1>
<div id="this_field" class="this_field_in">
<form method="post" action="skrypt.php" >    
    <fieldset >
    <h3>Języki programowania i technologie</h3>   
    
    <label>PHP</label><input type="checkbox" name="php">
    <label>JavaScript</label><input type="checkbox" name="javascript">
    <label>HTML</label><input type="checkbox" name="html">
    <label>CSS</label><input type="checkbox" name="css"><br>
    <!--<input type="submit" name ="" id="go" value="Dalej">-->    
    </fieldset>
</form>
<button id="go">Dalej</button>
</div>

<div id="this_field2" class="this_field_out">
<form method="post" action="skrypt.php"  >
<h3>Języki programowania i technologie</h3>   
    <label>Inny język</label><input type="checkbox" id="inny">
    <input type="text" name="programm" placeholder="Wpisz inne języki programowania" class="other" style="display:none"> 
    <input type="submit" value="Dodaj kolejny język" name="next_programm" class="other" style="display:none">   
</form>
<button id="go2">Dalej</button>
</div>

<div id="this_field3"  class="this_field_out">
<form method="post" action="skrypt.php" >
<h3>Języki programowania i technologie</h3>   
    <label>MySQL</label><input type="checkbox" name="mysql">    
    <label>PostgreeSQL</label><input type="checkbox" name="postgreesql">
</form>
    <button id="go3">Dalej</button>
</div>

<div id="this_field4" class="this_field_out">
<form method="post" action="skrypt.php" >
<h3>Języki programowania i technologie</h3>   
    <label>Inna technologia</label><input type="checkbox" id="tech" >
    <input type="text" name="other_tech" placeholder="Wpisz inne technologie" class="other_tech" style="display:none">
    <input type="submit" value="Dodaj inną technologię" name="next_programm" class="other_tech" style="display:none"> 
</form>
<button id="go4">Dalej</button>
</div>

<div id="this_field5" class="this_field_out">
<form method="post" action="skrypt.php" >
    <h3>Frameworki i środowiska:</h3>
    <label>Symfony</label><input type="checkbox" name="symfony">
    <label>Laravel</label><input type="checkbox" name="laravel">
    <label>Visual Studio 2022</label><input type="checkbox" name="visual">
    <label>Android Studio</label><input type="checkbox" name="android">
    <label>React</label><input type="checkbox" name="react">
    <label>Angular</label><input type="checkbox" name="angular">
</form>
<button id="go5">Dalej</button>
</div>

<div id="this_field6" class="this_field_out">
<form method="post" action="skrypt.php" >
<h3>Frameworki i środowiska:</h3>
<label>Inny framework</label><input type="checkbox" id="frame"><br>

    <input type="text" name="other_fr" placeholder="Inne frameworki" style="display:none" class="other_frame">
    <input type="submit" value="Dodaj inny framework" name="next_programm" class="other_frame" style="display:none"><br> 
<label>Inne umiejętności</label><input type="checkbox" id="skill" >    
    <input type="text" name="other" placeholder="Inne umiejętności" class="other_skill" style="display:none">
    <input type="submit" value="Dodaj inną umiejętnność" name="next_programm" class="other_skill" style="display:none"> 
</form>
<button id="go6">Dalej</button>
</div>

<div id="this_field7" class="this_field_out">
<form method="post" action="skrypt.php" >
<h1>Języki obce</h1>
<select name="lang">
    <optgroup label="Język angielski">
    <option value="angA1">Angielski A1</option>
    <option value="angA2">Angielski A2</option>
    <option value="angB1">Angielski B1</option>
    <option value="angB2">Angielski B2</option>
    <option value="angC1">Angielski C1</option>
    <option value="angC2">Angielski C2</option>
</select>
    <input type="submit" value="Dodaj" name="Add_experience"><input type="submit" value="Koniec"><input type="reset" value="Clear"> 
</form>
</div>
<script src="skrypt.js"></script>
</body>
</html>