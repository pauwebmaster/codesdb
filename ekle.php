<?php 
echo"fff2222";
include 'baglan.php';
 // include "ekle.php";
// include "footer.php";

$ders=$_POST["ders"];
$baslik=$_POST["baslik"];
$icerik=$_POST["icerik"];

if (isset($_POST["submit"]) ) {

$ders = isset($_POST["ders"]) ? $_POST["ders"] : null;
$baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : null;
$icerik = isset($_POST["icerik"]) ? $_POST["icerik"] : null;

} 
else if(!$ders)
{
    
    #echo "ders giriniz";
    echo "null";
}
else if(!$baslik)
{
	echo "başlık giriniz";
}
else if(!$icerik)
{
	echo "lütfen içerik giriniz";
}
else {
	
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($ders,$baslik,$icerik)) {
    
$sql = "INSERT INTO ders (ders,baslik,icerik)
    VALUES ('$ders', '$baslik','$icerik')";
} 

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}













 ?>