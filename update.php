<?php


$name=         $_GET["name"];
$mail=         $_GET["mail"];
$birthday=     $_GET["birthday"];
$phone=        $_GET["phone"];
$position=     $_GET["position"];
$knowledge=    $_GET["knowledge"];
$message=      $_GET["message"];
$id=           $_GET["id"];

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
    "id" =>    $id,
);


$update=$db->prepare("UPDATE contact SET
    name=:name,
    mail=:mail,
    birthday=:birthday, 
    phone=:phone, 
    position=:position, 
    knowledge=:knowledge, 
    message=:message
    WHERE id = :id 
    ");

$result=$update->execute($data);
    
if($result)
{
    echo 'Güncelleme işlemi başarılı oldu. <a href="list.php">Liste sayfasına gitmek için tıklayın</a>';

}else{
    echo 'Güncelleme başarısız oldu.<a href="edit.php">tekrar denemek için tıklayın</a>';
}
