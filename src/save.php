<?php


$name=         $_GET["name"];
$mail=         $_GET["mail"];
$birthday=     $_GET["birthday"];
$phone=        $_GET["phone"];
$position=     $_GET["position"];
$knowledge=    $_GET["knowledge"];
$message=      $_GET["message"];


try
{

$db=new PDO("mysql:host=localhost;dbname=formdb;charset=utf8","root","");

}catch(PDOException $e)

{
    
    $e->getMessage();
}

$data=array(
    "name" =>       $name,
    "mail" =>       $mail,
    "birthday" =>   $birthday,
    "phone" =>      $phone,
    "position" =>   $position,
    "knowledge" =>  $knowledge,
    "message" =>    $message,
);


$insert=$db->prepare("INSERT INTO contact SET
    name=:name,
    mail=:mail,
    birthday=:birthday, 
    phone=:phone, 
    position=:position, 
    knowledge=:knowledge, 
    message=:message");

$result=$insert->execute($data);
    
if($result)
{
    header("Location:list.php");
}else{
    echo "kayıt başarısız";
}
