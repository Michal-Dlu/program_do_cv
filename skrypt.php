<<<<<<< HEAD
<?php
session_start();

?>
<?php
//abstrakcyjna klasa do łączenia z bazą danych i wykonywania kwerend
abstract class Connection{
   protected $pdo;
   public function __construct($host, $user,$password,$dbname){ 
    try {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname",$user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
   
   catch (PDOException $e){
    die ("Brak połącznia z bazą danych: ".$e->getMessage());}
    }

   abstract public function query($sql,$params = []);

   abstract public function fetchAll($sql, $params = []);

   abstract public function dbClose();
};


class Executing_class extends Connection{
    public function query($sql, $params = []){
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        }
        catch (PDOException $e){
            die("Nieudana próba wykonania kwerendy: ". $e->getMessage());
        }     
    }

     public function fetchAll($sql, $params = []){
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch (PDOException $e){
                die("Nieudana próba pobrania wyników: ".$e->getMessage());
            }
           
    }
    public function dbClose(){
        $this->pdo = null;
    }
   
};
if (isset($_POST['ok'])){
$conn1 = new Executing_class('localhost', 'root', '', 'curiculum'); 
$target_file = basename($_FILES['foto']['name']);
move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);
$name = $_POST['name'];
$surname = $_POST['surname'];

$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$born = $_POST['born'];
$adres = $_POST['adress'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$professional_profile = $_POST['professional_profile'];


$sql = "Insert into cv (`foto`,name,surname,haslo,born,adres,email,phone,professional_profile) values (?,?,?,?,?,?,?,?,?)";
$params = [$target_file,$name,$surname,$hashed_password,$born,$adres,$email,$phone,$professional_profile];
$conn1->query($sql,$params);
$conn1->dbClose();

$conn2 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Select id from cv where name like ? and surname like ? order by id desc limit 1";
$params = [$name, $surname];
$users = $conn2->fetchAll($sql,$params);
foreach ($users as $user){$_SESSION['id'] = $user['id'];}
$conn2->dbClose();
header('Location:Strona_2.php');
exit();}


//skrypt 2
if (isset($_POST['Add_data']))
{ 
$study = $_POST['study'];
$school = $_POST['school'];
$academic = $_POST['academic'];

$conn3 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into `wyksztalcenie` (study,school,academic, cv) values (?,?,?,?)";
$params = [$study,$school,$academic,$_SESSION['id']];
$conn3->query($sql,$params);
$conn3->dbClose();
header('Location:Strona_2.php');
exit();
}
if(isset($_POST['ok1'])){
         $flaga="strona2";
         $_SESSION['flaga']=$flaga;
header('Location:Strona_3.php');
exit();}

//skrypt 3
if(isset($_POST['Add_experience']))
{     
$work = $_POST['work'];
$work_place = $_POST['work_place'];
$experience = $_POST['experience'];

$conn4 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into doswiadczenie (work,work_place,experience, cv) values (?,?,?,?)";
$params = [$work,$work_place,$experience,$_SESSION['id']];
$conn4->query($sql,$params);
$conn4->dbClose();
header('location:Strona_3.php');
}
if(isset($_POST['ok3'])){
     $flaga="strona3";
     $_SESSION['flaga']=$flaga;
header('location:Strona_4.php');}

//skrypt4
if (isset($_POST['programs'])) {

    // Odbieramy dane JSON z POST
    $jsonData = $_POST['programs'];    
    // Dekodowanie JSON na tablicę PHP
    //$programsData = json_decode($jsonData, true);
//$_SESSION['programsData'] = $programsData;
$conn5 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into programms (progr, cv) values (?,?)";
$params=[$jsonData, $_SESSION['id']];
$conn5->query($sql,$params);
$conn5->dbClose();
header('location:strona_4.php');
}
if (isset($_POST['frameworks'])){
$jsonData = $_POST['frameworks'];    
// Dekodowanie JSON na tablicę PHP
//$programsData = json_decode($jsonData, true);
//$_SESSION['programsData'] = $programsData;
$conn6 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into frameworks (frame, cv) values (?,?)";
$params=[$jsonData, $_SESSION['id']];
$conn6->query($sql,$params);
$conn6->dbClose();
header('location:strona_4.php');}

if (isset($_POST['skills'])){
    $jsonData = $_POST['skills'];    
    // Dekodowanie JSON na tablicę PHP
    //$programsData = json_decode($jsonData, true);
    //$_SESSION['programsData'] = $programsData;
    $conn7 = new Executing_class('localhost', 'root', '', 'curiculum');
    $sql = "Insert into skills (skill, cv) values (?,?)";
    $params=[$jsonData, $_SESSION['id']];
    $conn7->query($sql,$params);
    $conn7->dbClose();
    header('location:strona_4.php');}

    if (isset($_POST['languages'])){
        $jsonData = $_POST['languages'];    
        // Dekodowanie JSON na tablicę PHP
        $programsData = json_decode($jsonData, true);
        $_SESSION['programsData'] = $programsData;
        $conn8 = new Executing_class('localhost', 'root', '', 'curiculum');
       
        foreach($_SESSION['programsData'] as $lang){
        $sql = "Insert into languages (lang, cv) values (?,?)";
        $params=[$lang, $_SESSION['id']];
        $conn8->query($sql,$params);}
        $conn8->dbClose();}
        

if(isset($_POST['send']))
{
    $conn9 = new Executing_class('localhost', 'root', '', 'curiculum');

    if(isset($_POST['php'])){$php='PHP';}else{$php="";}
    if(isset($_POST['javascript'])){$javascript='JavaScript';}else{$javascript="";}
    if(isset($_POST['html'])){$html='HTML';}else{$html="";}
    if(isset($_POST['css'])){$css='CSS';}else{$css="";}
    if(isset($_POST['mysql'])){$mysql='MySQL';}else{$mysql="";}
    if(isset($_POST['postgresql'])){$postgresql='PostgreSQL';}else{$postgresql="";}
    $arr = array($php,$javascript,$html,$css,$mysql,$postgresql);
    for ($i=0; $i<6;$i++){
    if($arr[$i]!=""){
    $sql="Insert into programms (progr, cv) values (?,?)";
    $param = [$arr[$i],$_SESSION['id']]; 
    $conn9 -> query($sql,$param);}}


        if(isset($_POST['Symfony'])){$symfony='Symfony';}else{$symfony="";}
        if(isset($_POST['Laravel'])){$laravel='Laravel';}else{$laravel="";}
        if(isset($_POST['Visual'])){$visual='Visual Studio 2022';}else{$visual="";}
        if(isset($_POST['Android'])){$android='Android Studio';}else{$android="";}
        if(isset($_POST['React'])){$react='React';}else{$react="";}
        if(isset($_POST['Angular'])){$angular='Angular';}else{$angular="";}
        $arrr = array($symfony,$laravel,$visual,$android,$react,$angular);
        for ($j=0; $j<6;$j++){
        if($arrr[$j]!=""){
        $sql="Insert into frameworks (frame, cv) values (?,?)";
        $param = [$arrr[$j],$_SESSION['id']];
        $conn9 -> query($sql,$param);
        }}
        $conn9 -> dbClose();
        $_SESSION['flaga']="strona4";
        header('location:koniec.php');
        }


if(isset($_POST['corr'])){
    $conn10 = new Executing_class('localhost', 'root', '', 'curiculum');
    $target_file = basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $born = $_POST['born'];
    $adres = $_POST['adress'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $professional_profile = $_POST['professional_profile'];

    $id = $_SESSION['id'];

    $sql="Update cv set foto = ?, name = ?, surname = ? ,born = ?, adres = ?, email = ?, phone = ?, professional_profile = ?  where id = $id";
    $params = [$target_file,$name,$surname,$born,$adres,$email,$phone,$professional_profile,];
    $conn10->query($sql,$params);
    $conn10 -> dbClose();
    $_SESSION['corr']="corr"; 
    header('location:Strona_2.php');
}
if(isset($_POST['input_corr'])){
   $conn11 = new Executing_class('localhost', 'root', '', 'curiculum');
   $study=$_POST['study'];
   $school=$_POST['school'];
   $academic=$_POST['academic'];
   $id=$_SESSION['corr_id'];
   $cv=$_SESSION['id'];

   $sql = "UPDATE `wyksztalcenie` SET `study`=?,`school`=?,`academic`=? WHERE id=? and cv=?";
   $params = [$study,$school,$academic,$id,$cv];
   $conn11->query($sql,$params);
   $conn11 -> dbClose();
   $flaga="strona2";
         $_SESSION['flaga']=$flaga;
   header('location:Strona_3.php');
}
if(isset($_POST['input_correct'])){
   $conn12 = new Executing_class('localhost', 'root', '', 'curiculum');
   $work=$_POST['work'];
   $work_place=$_POST['work_place'];
   $experience=$_POST['experience'];
   $id=$_SESSION['corr_id'];
   $cv=$_SESSION['id'];

   $sql = "UPDATE `doswiadczenie` SET `work`=?,`work_place`=?,`experience`=? WHERE id=? and cv=?";
   $params = [$work,$work_place,$experience,$id,$cv];
   $conn12->query($sql,$params);
   $conn12 -> dbClose();
   $flaga="strona3";
   $_SESSION['flaga']=$flaga;
   header('location:Strona_4.php');
}
if(isset($_POST['end'])){
    $conn13 = new Executing_class('localhost', 'root', '', 'curiculum');
    
   

    $cv=$_SESSION['id'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "Delete from programms where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}

    $sql = "Alter table programms Auto_Increment = 1";
    $conn13->query($sql);
    
    $arr=[];
    
    if(isset($_POST['php'])){$arr[]=$_POST['php'];}
    if(isset($_POST['javascript'])){$arr[]=$_POST['javascript'];}
    if(isset($_POST['html'])){$arr[]=$_POST['html'];}
    if(isset($_POST['css'])){$arr[]=$_POST['css'];}
    if(isset($_POST['mysql'])){$arr[]=$_POST['mysql'];}
    if(isset($_POST['postgresql'])){$arr[]=$_POST['postgresql'];}
    if(isset($_POST['prog'])){
        $selected_prog = $_POST['prog'];
        foreach($selected_prog as $prog){        
        $arr[]=$prog;}
        }

        if(isset($_POST['add_prog'])){
            $selected_progr = $_POST['add_prog'];
            foreach($selected_progr as $progr){
                $arr[]=$progr;
            }
        }
    
    $sql = "Insert into programms (progr,cv) values (?,?)";
        foreach($arr as $progr)  {
    $params = [$progr, $cv];
    $conn13->query($sql, $params);}

    

         
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "Delete from frameworks where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}

      $sql = "Alter table frameworks Auto_Increment = 1";
    $conn13->query($sql);
    
    $arr_fr=[];

    if(isset($_POST['symfony'])){$arr_fr[]="Symfony";}
    if(isset($_POST['laravel'])){$arr_fr[]="Laravel";}
    if(isset($_POST['visual'])) {$arr_fr[]="Visual Studio 2022";}
    if(isset($_POST['android'])){$arr_fr[]="Android Studio";}
    if(isset($_POST['react']))  {$arr_fr[]="React";}
    if(isset($_POST['angular'])){$arr_fr[]="Angular";}
    if(isset($_POST['frame'])){
        $selected_frame = $_POST['frame'];
        foreach($selected_frame as $frame){
            $arr_fr[] = $frame;
        }
    }
    if(isset($_POST['add_frame'])){
        $selected_frames = $_POST['add_frame'];
        foreach($selected_frames as $frames){
            $arr_fr[] = $frames;
        }
    }
      
    $sql = "Insert into frameworks (frame,cv) values (?,?)";
    foreach($arr_fr as $frame){
    $params = [$frame, $cv];
    $conn13->query($sql, $params);}

   
if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $sql = "Delete from skills where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}

      $sql = "Alter table skills Auto_Increment = 1";
    $conn13->query($sql);

$arr_skill=[];

    if(isset($_POST['skill'])){
    $selected_skill = $_POST['skill'];
    foreach($selected_skill as $skill){
        $arr_skill[] = $skill;   
    }}
    if(isset($_POST['add_skill'])){
        $selected_skills = $_POST['add_skill'];
        foreach($selected_skills as $skills){
               $arr_skill[] = $skills;
        } 
    } 

   $sql = "Insert into skills (skill,cv) values (?,?)";
   foreach($arr_skill as $added_skill){
    $params = [$added_skill, $cv];
    $conn13->query($sql,$params);}  
         
            
    
if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $sql = "Delete from languages where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}


    $sql = "Alter table languages Auto_Increment = 1";
    $conn13->query($sql);

    if(isset($_POST['lang_ang'])){
        if($_POST['lang_ang']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_ang'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}
    if(isset($_POST['lang_deu'])){
        if($_POST['lang_deu']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_deu'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}

    if(isset($_POST['lang_fra'])){
        if($_POST['lang_fra']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_fra'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}
    if(isset($_POST['lang_ru'])){
        if($_POST['lang_ru']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_ru'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}
    if(isset($_POST['lang_la'])){
        if($_POST['lang_la']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_la'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }
}$conn13->dbClose();
$_SESSION['flaga']="strona4";
 header('location:Koniec.php');
 exit();
   }

  if(isset($_POST['Add_next_data'])){
    $conn14 = new Executing_class('localhost', 'root', '', 'curiculum');
     $study = $_POST['study'];
     $school = $_POST['school'];
     $academic = $_POST['academic'];
     $cv = $_SESSION['id'];
   
     $sql="Insert into wyksztalcenie (study, school, academic, cv) values (?, ?, ?, ?)";
     $params=[$study, $school, $academic, $cv];

     $conn14->query($sql, $params);
     $conn14->dbClose();
     header('location:Strona_2.php');
  };
  if(isset($_POST['next_ok1'])){
    $flaga="strona2";
    $_SESSION['flaga']=$flaga;
    header('location:Strona_3.php');
  }

   if(isset($_POST['add_next_experience'])){
    $conn15 = new Executing_class('localhost', 'root', '', 'curiculum');
     $work = $_POST['work'];
     $work_place = $_POST['work_place'];
     $experience = $_POST['experience'];
     $cv = $_SESSION['id'];
   
     $sql="Insert into doswiadczenie (work, work_place, experience, cv) values (?, ?, ?, ?)";
     $params=[$work, $work_place, $experience, $cv];

     $conn15->query($sql, $params);
     $conn15->dbClose();
     header('location:Strona_3.php');
  };
  if(isset($_POST['next_ok'])){
    $flaga="strona3";
    $_SESSION['flaga']=$flaga;
    header('location:Strona_4.php');}

     

=======
<?php
session_start();

?>
<?php
//abstrakcyjna klasa do łączenia z bazą danych i wykonywania kwerend
abstract class Connection{
   protected $pdo;
   public function __construct($host, $user,$password,$dbname){ 
    try {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname",$user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
   
   catch (PDOException $e){
    die ("Brak połącznia z bazą danych: ".$e->getMessage());}
    }

   abstract public function query($sql,$params = []);

   abstract public function fetchAll($sql, $params = []);

   abstract public function dbClose();
};


class Executing_class extends Connection{
    public function query($sql, $params = []){
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        }
        catch (PDOException $e){
            die("Nieudana próba wykonania kwerendy: ". $e->getMessage());
        }     
    }

     public function fetchAll($sql, $params = []){
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch (PDOException $e){
                die("Nieudana próba pobrania wyników: ".$e->getMessage());
            }
           
    }
    public function dbClose(){
        $this->pdo = null;
    }
   
};
if (isset($_POST['ok'])){
$conn1 = new Executing_class('localhost', 'root', '', 'curiculum'); 
$target_file = basename($_FILES['foto']['name']);
move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);
$name = $_POST['name'];
$surname = $_POST['surname'];

$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$born = $_POST['born'];
$adres = $_POST['adress'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$professional_profile = $_POST['professional_profile'];


$sql = "Insert into cv (`foto`,name,surname,haslo,born,adres,email,phone,professional_profile) values (?,?,?,?,?,?,?,?,?)";
$params = [$target_file,$name,$surname,$hashed_password,$born,$adres,$email,$phone,$professional_profile];
$conn1->query($sql,$params);
$conn1->dbClose();

$conn2 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Select id from cv where name like ? and surname like ? order by id desc limit 1";
$params = [$name, $surname];
$users = $conn2->fetchAll($sql,$params);
foreach ($users as $user){$_SESSION['id'] = $user['id'];}
$conn2->dbClose();
header('Location:Strona_2.php');
exit();}


//skrypt 2
if (isset($_POST['Add_data']))
{ 
$study = $_POST['study'];
$school = $_POST['school'];
$academic = $_POST['academic'];

$conn3 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into `wyksztalcenie` (study,school,academic, cv) values (?,?,?,?)";
$params = [$study,$school,$academic,$_SESSION['id']];
$conn3->query($sql,$params);
$conn3->dbClose();
header('Location:Strona_2.php');
exit();
}
if(isset($_POST['ok1'])){
         $flaga="strona2";
         $_SESSION['flaga']=$flaga;
header('Location:Strona_3.php');
exit();}

//skrypt 3
if(isset($_POST['Add_experience']))
{     
$work = $_POST['work'];
$work_place = $_POST['work_place'];
$experience = $_POST['experience'];

$conn4 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into doswiadczenie (work,work_place,experience, cv) values (?,?,?,?)";
$params = [$work,$work_place,$experience,$_SESSION['id']];
$conn4->query($sql,$params);
$conn4->dbClose();
header('location:Strona_3.php');
}
if(isset($_POST['ok3'])){
     $flaga="strona3";
     $_SESSION['flaga']=$flaga;
header('location:Strona_4.php');}

//skrypt4
if (isset($_POST['programs'])) {

    // Odbieramy dane JSON z POST
    $jsonData = $_POST['programs'];    
    // Dekodowanie JSON na tablicę PHP
    //$programsData = json_decode($jsonData, true);
//$_SESSION['programsData'] = $programsData;
$conn5 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into programms (progr, cv) values (?,?)";
$params=[$jsonData, $_SESSION['id']];
$conn5->query($sql,$params);
$conn5->dbClose();
header('location:strona_4.php');
}
if (isset($_POST['frameworks'])){
$jsonData = $_POST['frameworks'];    
// Dekodowanie JSON na tablicę PHP
//$programsData = json_decode($jsonData, true);
//$_SESSION['programsData'] = $programsData;
$conn6 = new Executing_class('localhost', 'root', '', 'curiculum');
$sql = "Insert into frameworks (frame, cv) values (?,?)";
$params=[$jsonData, $_SESSION['id']];
$conn6->query($sql,$params);
$conn6->dbClose();
header('location:strona_4.php');}

if (isset($_POST['skills'])){
    $jsonData = $_POST['skills'];    
    // Dekodowanie JSON na tablicę PHP
    //$programsData = json_decode($jsonData, true);
    //$_SESSION['programsData'] = $programsData;
    $conn7 = new Executing_class('localhost', 'root', '', 'curiculum');
    $sql = "Insert into skills (skill, cv) values (?,?)";
    $params=[$jsonData, $_SESSION['id']];
    $conn7->query($sql,$params);
    $conn7->dbClose();
    header('location:strona_4.php');}

    if (isset($_POST['languages'])){
        $jsonData = $_POST['languages'];    
        // Dekodowanie JSON na tablicę PHP
        $programsData = json_decode($jsonData, true);
        $_SESSION['programsData'] = $programsData;
        $conn8 = new Executing_class('localhost', 'root', '', 'curiculum');
       
        foreach($_SESSION['programsData'] as $lang){
        $sql = "Insert into languages (lang, cv) values (?,?)";
        $params=[$lang, $_SESSION['id']];
        $conn8->query($sql,$params);}
        $conn8->dbClose();}
        

if(isset($_POST['send']))
{
    $conn9 = new Executing_class('localhost', 'root', '', 'curiculum');

    if(isset($_POST['php'])){$php='PHP';}else{$php="";}
    if(isset($_POST['javascript'])){$javascript='JavaScript';}else{$javascript="";}
    if(isset($_POST['html'])){$html='HTML';}else{$html="";}
    if(isset($_POST['css'])){$css='CSS';}else{$css="";}
    if(isset($_POST['mysql'])){$mysql='MySQL';}else{$mysql="";}
    if(isset($_POST['postgresql'])){$postgresql='PostgreSQL';}else{$postgresql="";}
    $arr = array($php,$javascript,$html,$css,$mysql,$postgresql);
    for ($i=0; $i<6;$i++){
    if($arr[$i]!=""){
    $sql="Insert into programms (progr, cv) values (?,?)";
    $param = [$arr[$i],$_SESSION['id']]; 
    $conn9 -> query($sql,$param);}}


        if(isset($_POST['Symfony'])){$symfony='Symfony';}else{$symfony="";}
        if(isset($_POST['Laravel'])){$laravel='Laravel';}else{$laravel="";}
        if(isset($_POST['Visual'])){$visual='Visual Studio 2022';}else{$visual="";}
        if(isset($_POST['Android'])){$android='Android Studio';}else{$android="";}
        if(isset($_POST['React'])){$react='React';}else{$react="";}
        if(isset($_POST['Angular'])){$angular='Angular';}else{$angular="";}
        $arrr = array($symfony,$laravel,$visual,$android,$react,$angular);
        for ($j=0; $j<6;$j++){
        if($arrr[$j]!=""){
        $sql="Insert into frameworks (frame, cv) values (?,?)";
        $param = [$arrr[$j],$_SESSION['id']];
        $conn9 -> query($sql,$param);
        }}
        $conn9 -> dbClose();
        $_SESSION['flaga']="strona4";
        header('location:koniec.php');
        }


if(isset($_POST['corr'])){
    $conn10 = new Executing_class('localhost', 'root', '', 'curiculum');
    $target_file = basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $born = $_POST['born'];
    $adres = $_POST['adress'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $professional_profile = $_POST['professional_profile'];

    $id = $_SESSION['id'];

    $sql="Update cv set foto = ?, name = ?, surname = ? ,born = ?, adres = ?, email = ?, phone = ?, professional_profile = ?  where id = $id";
    $params = [$target_file,$name,$surname,$born,$adres,$email,$phone,$professional_profile,];
    $conn10->query($sql,$params);
    $conn10 -> dbClose();
    $_SESSION['corr']="corr"; 
    header('location:Strona_2.php');
}
if(isset($_POST['input_corr'])){
   $conn11 = new Executing_class('localhost', 'root', '', 'curiculum');
   $study=$_POST['study'];
   $school=$_POST['school'];
   $academic=$_POST['academic'];
   $id=$_SESSION['corr_id'];
   $cv=$_SESSION['id'];

   $sql = "UPDATE `wyksztalcenie` SET `study`=?,`school`=?,`academic`=? WHERE id=? and cv=?";
   $params = [$study,$school,$academic,$id,$cv];
   $conn11->query($sql,$params);
   $conn11 -> dbClose();
   $flaga="strona2";
         $_SESSION['flaga']=$flaga;
   header('location:Strona_3.php');
}
if(isset($_POST['input_correct'])){
   $conn12 = new Executing_class('localhost', 'root', '', 'curiculum');
   $work=$_POST['work'];
   $work_place=$_POST['work_place'];
   $experience=$_POST['experience'];
   $id=$_SESSION['corr_id'];
   $cv=$_SESSION['id'];

   $sql = "UPDATE `doswiadczenie` SET `work`=?,`work_place`=?,`experience`=? WHERE id=? and cv=?";
   $params = [$work,$work_place,$experience,$id,$cv];
   $conn12->query($sql,$params);
   $conn12 -> dbClose();
   $flaga="strona3";
   $_SESSION['flaga']=$flaga;
   header('location:Strona_4.php');
}
if(isset($_POST['end'])){
    $conn13 = new Executing_class('localhost', 'root', '', 'curiculum');
    
   

    $cv=$_SESSION['id'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "Delete from programms where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}

    $sql = "Alter table programms Auto_Increment = 1";
    $conn13->query($sql);
    
    $arr=[];
    
    if(isset($_POST['php'])){$arr[]=$_POST['php'];}
    if(isset($_POST['javascript'])){$arr[]=$_POST['javascript'];}
    if(isset($_POST['html'])){$arr[]=$_POST['html'];}
    if(isset($_POST['css'])){$arr[]=$_POST['css'];}
    if(isset($_POST['mysql'])){$arr[]=$_POST['mysql'];}
    if(isset($_POST['postgresql'])){$arr[]=$_POST['postgresql'];}
    if(isset($_POST['prog'])){
        $selected_prog = $_POST['prog'];
        foreach($selected_prog as $prog){        
        $arr[]=$prog;}
        }

        if(isset($_POST['add_prog'])){
            $selected_progr = $_POST['add_prog'];
            foreach($selected_progr as $progr){
                $arr[]=$progr;
            }
        }
    
    $sql = "Insert into programms (progr,cv) values (?,?)";
        foreach($arr as $progr)  {
    $params = [$progr, $cv];
    $conn13->query($sql, $params);}

    

         
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "Delete from frameworks where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}

      $sql = "Alter table frameworks Auto_Increment = 1";
    $conn13->query($sql);
    
    $arr_fr=[];

    if(isset($_POST['symfony'])){$arr_fr[]="Symfony";}
    if(isset($_POST['laravel'])){$arr_fr[]="Laravel";}
    if(isset($_POST['visual'])) {$arr_fr[]="Visual Studio 2022";}
    if(isset($_POST['android'])){$arr_fr[]="Android Studio";}
    if(isset($_POST['react']))  {$arr_fr[]="React";}
    if(isset($_POST['angular'])){$arr_fr[]="Angular";}
    if(isset($_POST['frame'])){
        $selected_frame = $_POST['frame'];
        foreach($selected_frame as $frame){
            $arr_fr[] = $frame;
        }
    }
    if(isset($_POST['add_frame'])){
        $selected_frames = $_POST['add_frame'];
        foreach($selected_frames as $frames){
            $arr_fr[] = $frames;
        }
    }
      
    $sql = "Insert into frameworks (frame,cv) values (?,?)";
    foreach($arr_fr as $frame){
    $params = [$frame, $cv];
    $conn13->query($sql, $params);}

   
if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $sql = "Delete from skills where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}

      $sql = "Alter table skills Auto_Increment = 1";
    $conn13->query($sql);

$arr_skill=[];

    if(isset($_POST['skill'])){
    $selected_skill = $_POST['skill'];
    foreach($selected_skill as $skill){
        $arr_skill[] = $skill;   
    }}
    if(isset($_POST['add_skill'])){
        $selected_skills = $_POST['add_skill'];
        foreach($selected_skills as $skills){
               $arr_skill[] = $skills;
        } 
    } 

   $sql = "Insert into skills (skill,cv) values (?,?)";
   foreach($arr_skill as $added_skill){
    $params = [$added_skill, $cv];
    $conn13->query($sql,$params);}  
         
            
    
if($_SERVER['REQUEST_METHOD'] === 'POST'){
 $sql = "Delete from languages where cv = ?";
    $params = [$cv];
    $conn13->query($sql,$params);}


    $sql = "Alter table languages Auto_Increment = 1";
    $conn13->query($sql);

    if(isset($_POST['lang_ang'])){
        if($_POST['lang_ang']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_ang'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}
    if(isset($_POST['lang_deu'])){
        if($_POST['lang_deu']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_deu'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}

    if(isset($_POST['lang_fra'])){
        if($_POST['lang_fra']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_fra'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}
    if(isset($_POST['lang_ru'])){
        if($_POST['lang_ru']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_ru'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }}
    if(isset($_POST['lang_la'])){
        if($_POST['lang_la']!=""){
        $sql = "Insert into languages (lang,cv) values (?,?)";
        $params = [$_POST['lang_la'],$_SESSION['id']];
        $conn13->query($sql,$params); 
    }
}$conn13->dbClose();
$_SESSION['flaga']="strona4";
 header('location:Koniec.php');
 exit();
   }

  if(isset($_POST['Add_next_data'])){
    $conn14 = new Executing_class('localhost', 'root', '', 'curiculum');
     $study = $_POST['study'];
     $school = $_POST['school'];
     $academic = $_POST['academic'];
     $cv = $_SESSION['id'];
   
     $sql="Insert into wyksztalcenie (study, school, academic, cv) values (?, ?, ?, ?)";
     $params=[$study, $school, $academic, $cv];

     $conn14->query($sql, $params);
     $conn14->dbClose();
     header('location:Strona_2.php');
  };
  if(isset($_POST['next_ok1'])){
    $flaga="strona2";
    $_SESSION['flaga']=$flaga;
    header('location:Strona_3.php');
  }

   if(isset($_POST['add_next_experience'])){
    $conn15 = new Executing_class('localhost', 'root', '', 'curiculum');
     $work = $_POST['work'];
     $work_place = $_POST['work_place'];
     $experience = $_POST['experience'];
     $cv = $_SESSION['id'];
   
     $sql="Insert into doswiadczenie (work, work_place, experience, cv) values (?, ?, ?, ?)";
     $params=[$work, $work_place, $experience, $cv];

     $conn15->query($sql, $params);
     $conn15->dbClose();
     header('location:Strona_3.php');
  };
  if(isset($_POST['next_ok'])){
    $flaga="strona3";
    $_SESSION['flaga']=$flaga;
    header('location:Strona_4.php');}

     

>>>>>>> 32768ff769e9ac4d274f228495da083fca9dd3ce
?>