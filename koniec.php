<?php
session_start();
if(!isset($_SESSION['flaga'])){
    header('location:Strona_1.php');
    exit();

}
else{
try{
$host='localhost';
$dbname='curiculum';
$user="root";
$password="";
$pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    die ("Błąd połączenia z bazą: ".$e->Message());
}
 

$sql = "Select * from cv where id = ?";
$params = [$_SESSION['id']];
$stmt = $pdo->prepare($sql);
$stmt->execute($params); 
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result)>0){    
    foreach ($result as $row){  
        $id=$row['id'];
        $name=$row['name'];
        $surname=$row['surname'];
        $born=$row['born'];
        $adres=$row['adres'];
        $email=$row['email'];
        $phone=$row['phone'];
        $professional_profile=$row['professional_profile'];
        $foto=$row['foto'];} 	
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Dłubak">
    <title>Kompletne CV</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="end_body">
   <section id="tlo">
<div id="question" class="this_field_out">
<div id="decision"><h5 style="text-align:center">Czy chcesz poprawić dane w CV?</h5>
    <form action="Strona_1.php" method="post">   
        <input type="submit" id="correction" value="Chcę poprawić" style="width:150px" name="correct">
    </form>
</div>
<div id="circle">X</div>
</div>
        
   <section id="person">
   <h1><strong>Curriculum Vitae</strong></h1>
  <h3>Dane osobowe</h3>   
   <strong style="color:navy; font-size:35px;">
<?php print "$name $surname";?></strong><br>
   <p style="word-wrap: break-word;">
<?php print "Rok urodzenia: $born";?><br>
<?php print $adres ?><br>
<?php print $email ?><br>
<?php print $phone ?><br></p>
  <h3>Profil zawodowy</h3>
<div style="width:60%" >
<?php print "<p id='prof'>{$professional_profile}</p>";?>
</div><br>

<img src="<?php print $foto?>" alt = "Twoje Zdjęcie" width=200px height=200px id="fota">
  
    </section>
    <section id="school">
 <h3>Wykształcenie</h3>
  <p>
<?php
$sql = "Select * from cv where id = ?";
$params = [$_SESSION['id']];
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC) ;
if ($result['id']===false) {
header('location:Strona_1.php');
}}
?>
<?php
$sql="Select * from wyksztalcenie where cv = ?";
$params = [$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $i=0;
 $study=[];
 $school=[];
 $academic=[];
foreach ($result as $row){
    $study[$i] = $row['study'];
    $school[$i] = $row['school'];
    $academic[$i] = $row['academic'];
    $i++;    
}
$i=0;
while ($i < count($study)) {
    print "<strong>$study[$i]</strong><br>";
    print "<strong>$school[$i]</strong><br>";
    print "<em>Kierunek: $academic[$i]</em><br><br>";
    $i++;
}
?>

    </section>
    <section id="experience">
<h3>Doświadczenie zawodowe</h3>
<p>
<?php
$sql = "Select * from doswiadczenie where cv = ? order by id desc";
$params=[$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $i=0;
 $work=[];
 $work_place=[];
 $experience=[];
foreach ($result as $row){
    $work[$i] = $row['work'];
    $workPlace[$i] = $row['work_place'];
    $experience[$i] = $row['experience'];
    $i++;    
}
$i=0;
while ($i < count($work)) {
    print "<strong>$work[$i]</strong><br>";
    print "<strong>$workPlace[$i]</strong><br>";
    print "<em>$experience[$i]</em><br><br>";
    $i++;
}
?>

</p>
    </section>
    <section id="technical">
<h3>Umiejętności techniczne</h3>
<div class="pro">
<h5 style="padding-top:5px">Języki programownia i technologie</h5>
<p>
<?php
$sql = "Select * from programms where cv = ?";
$params=[$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$i=0;
$progr=[];
foreach ($result as $row){
    $progr[$i] = $row['progr'];    
    $i++;   
}
$i=0;
while ($i < count($progr)) {
    print "<ul>
    <li class='li'>$progr[$i], </li>
           </ul>";   
    $i++;
}
?>

</p>
</div>
<div class="pro">
<h5 style="padding-top:5px">Frameworki i środowiska</h5>
<p>
<?php
$sql = "Select * from frameworks where cv = ?";
$params=[$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $i=0;
 $frame=[];
foreach ($result as $row){
    $frame[$i] = $row['frame'];    
    $i++;    
}
$i=0;
while ($i < count($frame)){
    print "<ul>
    <li class='li'>$frame[$i], </li>
          </ul>";   
    $i++;
}
?>
</p>
</div>
    </section>
    <section id="other" style="clear:both">
<h3>Inne umiejętności</h3>
<p>
<?php
$sql = "Select * from skills where cv = ?";
$params=[$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$i=0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
     print "<ul><li class='li'>".$row['skill'].","." "."</li></ul>"; 
}
?>

</p>
    </section>
    <section id="languages">
<h3>Języki obce</h3>
<p>
<?php
$sql = "Select * from languages where cv = ?";
$params=[$_SESSION['id']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $i=0;
 $lang=[];
foreach ($result as $row){
    $lang[$i] = $row['lang'];    
    $i++;    
}
$i=0;
while ($i < count($lang)) {
    print "<ul>
    <li class='li'>$lang[$i], </li>
           </ul>";   
    $i++;
}
$pdo=null;}
?>
</p>
    </section>
<p><strong>Zgoda na przetwarzanie danych</strong></p>
<pre>   Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji
procesu rekrutacji, zgodnie z Rozporządzeniem Parlamentu Europejskiego i Rady (UE) 2016/679
(RODO).
</pre>
    </section>
<script>
   class Show{
    constructor(obj, obj2)
{
    this.selector = obj;
    this.selector2 = obj2;
   }

    change_remove(){
        
        this.selector.addEventListener('click', () =>{
            this.selector2.classList.add('deAnima');
            setTimeout(() => {
                  
            this.selector2.classList.remove('this_field_in');
            
            this.selector2.classList.add('this_field_out');},20000
            )})
            }
    change_add(){
        setTimeout(() =>{
        this.selector2.classList.remove('this_field_out');
        this.selector2.classList.add('this_field_in');
        this.selector2.classList.add('anima');
    },10000)}

    remove(){
        this.selector.addEventListener('click', () =>{
            this.selector2.classList.add('deAnima');
            this.selector2.classList.remove('this_field_in');
            this.selector2.classList.add('this_field_out');            
    })}
    show(){
        this.selector.addEventListener('click', () =>{
            this.selector2.classList.add('Anima');
            this.selector2.classList.remove('this_field_out');
            this.selector2.classList.add('this_field_in');            
    })}}

let circle = document.querySelector('#circle');
let question = document.querySelector('#question');

let decision1 = new Show(circle,question);
decision1.change_add();
decision1.change_remove();

let correction = document.querySelector('#correction');
let decision = document.querySelector('#decision');

</script>

</body>
</html>
