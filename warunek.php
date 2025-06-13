<<<<<<< HEAD

<?php
session_start();

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
$user_name = $_POST['user_name'];
$user_surname = $_POST['user_surname'];
$password = $_POST['password'];

$sql = "Select * from cv where name = ? and surname = ?  order by id desc limit 1";

$params = [$user_name, $user_surname];
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result===false){
    $alert="Nie ma takiego użytkownika";
    $_SESSION['alert']=$alert;
    unset($_SESSION['start']);  
    header('location:startowa.php');
exit();}
if(!password_verify($password,$result['haslo']))
{
    $alert="Nieprawidłowe hasło";
    $_SESSION['alert']=$alert;
    unset($_SESSION['start']);
    header('location:startowa.php');
    exit();
}
else{
    $sql = "Select * from cv where name = ? and surname = ?  order by id desc limit 1";
    
$params = [$user_name, $user_surname];
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['id'] = $result['id'];

    header('location:koniec.php');}

 
=======

<?php
session_start();

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
$user_name = $_POST['user_name'];
$user_surname = $_POST['user_surname'];
$password = $_POST['password'];

$sql = "Select * from cv where name = ? and surname = ?  order by id desc limit 1";

$params = [$user_name, $user_surname];
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result===false){
    $alert="Nie ma takiego użytkownika";
    $_SESSION['alert']=$alert;
    unset($_SESSION['start']);  
    header('location:startowa.php');
exit();}
if(!password_verify($password,$result['haslo']))
{
    $alert="Nieprawidłowe hasło";
    $_SESSION['alert']=$alert;
    unset($_SESSION['start']);
    header('location:startowa.php');
    exit();
}
else{
    $sql = "Select * from cv where name = ? and surname = ?  order by id desc limit 1";
    
$params = [$user_name, $user_surname];
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['id'] = $result['id'];

    header('location:koniec.php');}

 
>>>>>>> 32768ff769e9ac4d274f228495da083fca9dd3ce
    ?>