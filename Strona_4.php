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
<form method="post" action="skrypt.php" >
<div id="this_field" class="this_field_in">
  
    <fieldset >
    <h3>Języki programowania i technologie</h3>   
    
    <label>PHP</label><input type="checkbox" name="php">
    <label>JavaScript</label><input type="checkbox" name="javascript">
    <label>HTML</label><input type="checkbox" name="html">
    <label>CSS</label><input type="checkbox" name="css"><br>
    <button id="go" type="button">Dalej</button>    
    </fieldset>
</div>

<div id="this_field2" class="this_field_out">
<h3>Języki programowania i technologie</h3>
<form method="post" action="skrypt.php">   
    <label>Inny język</label><input type="checkbox" id="inny">
    <input type="text"  placeholder="Wpisz inne języki programowania" class="other" style="display:none" id="prog"> 
    <button type="button" class="other" style="display:none" id="add_prog">Dodaj kolejny język programowania</button> 
<button id="go2" type="button">Dalej</button>
</div>

<div id="this_field3"  class="this_field_out">
<h3>Języki programowania i technologie</h3>   
    <label>MySQL</label><input type="checkbox" name="mysql">    
    <label>PostgreeSQL</label><input type="checkbox" name="postgreesql">
    <button id="go3" type="button">Dalej</button>
</div>

<div id="this_field4" class="this_field_out">
<h3>Języki programowania i technologie</h3>   
    <label>Inna technologia</label><input type="checkbox" id="tech" >
    <input type="text"  id="other_technology" placeholder="Wpisz inne technologie" class="other_tech" style="display:none">
    <button type="button"  id="next_tech" class="other_tech" style="display:none">Dodaj inną technologię</button>
    <button id="go4" type="button">Dalej</button>
</div>

<div id="this_field5" class="this_field_out">
    <h3>Frameworki i środowiska:</h3>
    <label>Symfony</label><input type="checkbox" name="symfony">
    <label>Laravel</label><input type="checkbox" name="laravel">
    <label>Visual Studio 2022</label><input type="checkbox" name="visual">
    <label>Android Studio</label><input type="checkbox" name="android">
    <label>React</label><input type="checkbox" name="react">
    <label>Angular</label><input type="checkbox" name="angular">
<button id="go5" type="button">Dalej</button>
</div>

<!--frameworki-->
<div id="this_field6" class="this_field_out">
<h3>Frameworki i środowiska:</h3>
<label>Inny framework</label><input type="checkbox" id="frame"><br>

    <input type="text" id="this_frame" placeholder="Inne frameworki" style="display:none" class="other_frame">
    <button type="button" id="next_frame" class="other_frame" style="display:none">Dodaj inny framework</button><br> 

<label>Inne umiejętności</label><input type="checkbox" id="skill" >    
    <input type="text" id="this_skill" placeholder="Inne umiejętności" class="other_skill" style="display:none">
    <button type="button" id="next_skill" class="other_skill" style="display:none">Dodaj inną umiejętnność</button> 

<button id="go6" type="button">Dalej</button>
</div>


<div id="this_field7" class="this_field_out">
<h1>Języki obce</h1>
<label>Angielski</label><input type="checkbox" id="ang"><br>
<select name="lang_ang" class="this_field_out" id="l_ang">
    <optgroup label="Język angielski">
    <option value="angA1">Angielski A1</option>
    <option value="angA2">Angielski A2</option>
    <option value="angB1">Angielski B1</option>
    <option value="angB2">Angielski B2</option>
    <option value="angC1">Angielski C1</option>
    <option value="angC2">Angielski C2</option>
</select>
<label>Niemiecki</label><input type="checkbox" id="de"><br>
<select name="lang_deu" class="this_field_out" id="l_de">
    <optgroup label="Język niemiecki">
    <option value="deuA1">Niemiecki A1</option>
    <option value="deuA2">Niemiecki A2</option>
    <option value="deuB1">Niemiecki B1</option>
    <option value="deuB2">Niemiecki B2</option>
    <option value="deuC1">Niemiecki C1</option>
    <option value="deuC2">Niemiecki C2</option>
</select>
<label>Francuski</label><input type="checkbox" id="fr"><br>
<select name="lang_fr" class="this_field_out" id="l_fr">
    <optgroup label="Język francuski">
    <option value="frA1">Francuski A1</option>
    <option value="frA2">Francuski A2</option>
    <option value="frB1">Francuski B1</option>
    <option value="frB2">Francuski B2</option>
    <option value="frC1">Francuski C1</option>
    <option value="frC2">Francuski C2</option>
</select>
<label>Rosyjski</label><input type="checkbox" id="ru"><br>
<select name="lang_ru" class="this_field_out" id="l_ru">
    <optgroup label="Język rosyjski">
    <option value="ruA1">Rosyjski A1</option>
    <option value="ruA2">Rosyjski A2</option>
    <option value="ruB1">Rosyjski B1</option>
    <option value="ruB2">Rosyjski B2</option>
    <option value="ruC1">Rosyjski C1</option>
    <option value="ruC2">Rosyjski C2</option>
</select>
<label>Włoski</label><input type="checkbox" id="la"><br>
<select name="wl" class="this_field_out" id="l_la">
    <optgroup label="Język włoski">
    <option value="laA1">Włoski A1</option>
    <option value="laA2">Włoski A2</option>
    <option value="laB1">Włoski B1</option>
    <option value="laB2">Włoski B2</option>
    <option value="laC1">Włoski C1</option>
    <option value="laC2">Włoski C2</option>
</select>
<button id="add_lang" type="button">Wybierz język</button>
    <input type="submit" value="Wyślij" name="send"><input type="reset" value="Wyczyść"> 

</div>
<!--</form>-->
<script src="skrypt.js"></script>
</body>
</html>