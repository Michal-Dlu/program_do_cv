<?php
session_start();
?>
<?php
// Połączenie z bazą danych
$host='localhost';
$dbname = 'curiculum';
$username = 'root';
$password = '';
$con = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (mysqli_connect_errno()) {
    echo "Nie udało się połączyć z bazą danych: " . mysqli_connect_error();
    exit();
}
else{  
   


if (isset($_POST['ok'])){

    $target_file = basename($_FILES['foto']['name']);
move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);
    
$_SESSION['start']="";
$name = $_POST['name'];


$surname = $_POST['surname'];
$born = $_POST['born'];
$adres = $_POST['adress'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$professional_profile = $_POST['professional_profile'];
$result = $con->prepare("Insert into cv ( `foto`,name,surname,born,adres,email,phone,professional_profile) values (:foto,:name,:surname,:born,:adres,:email,:phone,:professional_profile)"); 
$result->execute(['foto'=>$target_file, 'name'=>$name, 'surname'=>$surname, 'born'=>$born, 'adres'=>$adres, 'email'=>$email, 'phone'=>$phone, 'professional_profile'=>$professional_profile]);
$result = $con->prepare("Select id from cv where name = :name");
$result->execute(['name'=>$name]);
while($row = $result->fetch(PDO::FETCH_ASSOC)){
$_SESSION['row'] = $row['id'];

header('location:Strona_2.php');
}}
//skrypt 2

if(isset($_POST['Add_data']))
{
$study = $_POST['study'];
$school = $_POST['school'];
$academic = $_POST['academic'];



$result=$con->prepare("Insert into wyksztalcenie (study,school,academic, cv) values (:study, :school, :academic, :row )");
$result->execute(['study'=>$study, 'school'=>$school, 'academic'=>$academic, 'row' => $_SESSION['row']]);

header('location:Strona_2.php');
}
if(isset($_POST['ok1'])){
header('location:Strona_3.php');}
}
//skrypt 3
if(isset($_POST['Add_experience']))
{
$work = $_POST['work'];
$work_place = $_POST['work_place'];
$experience = $_POST['experience'];



$result=$con->prepare("Insert into doswiadczenie (work,work_place,experience, cv) values (:work, :work_place, :experience, :row )");
$result->execute(['work'=>$work, 'work_place'=>$work_place, 'experience'=>$experience, 'row' => $_SESSION['row']]);

header('location:Strona_3.php');
}
if(isset($_POST['ok3'])){
header('location:Strona_4.php');}

//skrypt4
if(isset($_POST['Add_prog']))
{
$programm = $_POST['programm'];

$result=$con->prepare("Insert into programms (progr, cv) values (:programm, :row )");
$result->execute(['programm'=>$programm, 'row' => 2/*$_SESSION['row']*/]);

header('location:Strona_4.php');
}

if(isset($_POST['ok4'])){
    if(isset($_POST['php'])){$php='PHP';}else{$php="";}
    if(isset($_POST['javascript'])){$javascript='JavaScript';}else{$javascript="";}
    if(isset($_POST['html'])){$html='HTML';}else{$html="";}
    if(isset($_POST['css'])){$css='CSS';}else{$css="";}
    $arr = array($php,$javascript,$html,$css);
    for ($i=0; $i<4;$i++){
    if($arr[$i]!=""){
    $result=$con->prepare("Insert into programms (progr, cv) values (:programm, :row )");
    $result->execute(['programm'=>$arr[$i], 'row' => 1/*=> $_SESSION['row']*/]);
    }}
}
//header('location:strona_4.php');}}

$con=null;
?>