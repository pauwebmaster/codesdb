<?php 
include 'baglan.php';


$delete=$_GET["id"];
// $delete=$_POST["id"] bu değer linkten gelen değeri görmez get ile post farkından bir tanesi


 //codes tablosunda id'si belirlenen  kaydı sil
 $sil = $bag->sil("codes", "WHERE id=?", array($delete));
 if ($sil){

header("Location: listele.php");
  
 }else{
  echo "kayit YOK";
 }


 /*
 //haberler tablosunda id'si 12 ve 15 olan kayıtları sil
 $sil = $bag->sil("haberler", "WHERE id=? AND id=?", array(12, 15));
 if ($sil){
  echo $sil. ": haber silindi";
 }else{
  echo "kayit YOK";
 }
 
 //haberler tablosundaki baslik alaninda manset kelimesi gecen kaylari silmek için
 $sil = $bag->sil("haberler", "WHERE baslik LIKE ?", array("%manset%"));
 if ($sil){
  echo $sil. ": haber silindi";
 }else{
  echo "kayit YOK";
 }
*/

 ?>