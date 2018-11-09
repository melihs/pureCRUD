<?php


$id = $_GET["id"];

try
{

$db = new PDO("mysql:host=localhost;dbname=formdb;charset=utf8","root","");

}catch(PDOException $e)

{
    
    $e->getMessage();
}

$delete = $db->prepare("DELETE FROM contact WHERE id = :id");
$delete->bindParam(":id",$id,PDO::PARAM_INT);
$result=$delete->execute();

if($result)
{
    echo 'Silme işlemi başarılı oldu. <a href="list.php">Liste sayfasına gitmek için tıklayın</a>';

}else{
    echo 'Silme başarısız oldu.<a href="list.php">Liste sayfasına gitmek için tıklayın</a>';
}