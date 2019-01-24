<?php 
include 'header.php';
include 'baglan.php';
$id=$_GET["id"];
$sorgu = $bag->sorgu("SELECT id,name,surname,content FROM codes WHERE id=?", array($id))->fetch(PDO::FETCH_OBJ);

?>

<div class="contentGrid ">
	<h1 class="text-center text-primary">Güncelleme <small>Sayfası</small></h1>
 <div class="container">
  <form class="yazForm" method="post">
    <div class="row">
      <div class="col-md-12 col-12 ">
       <div class="input-field"> 
        <input type="text" id="name" name="name" value=<?php echo '"'.$sorgu->name.'"'?> required >
        <label for="name">Name:</label>
      </div>
    </div>
    <div class="col-md-12 col-12 my-3">
     <div class="input-field"> 
      <input type="text" id="surname" name="surname" value=<?php echo '"'.$sorgu->surname.'"' ?>required >
      <label for="surname">Surname:</label>
    </div>
  </div>


  <div class="col-md-12 col-12 ">
   
   <textarea class="my-0" name="content" id="content" cols="30" rows="10" placeholder="İçerik Ekleyin"  required><?php echo $sorgu->content;?></textarea>
   
 </div>
 <div class="col-md-3 mt-3 mx-auto col-6">
   <div class="inputSubmit">
    <input type="submit"name="submit" value="Güncelle">
  </div>

  

</div>

</form>
</div>

</div>









<?php
// GET metoduyla aldığımız id içeriğini sorgu metoduyla burdan çekip formlara doldurcam.. yukarda 




$name=$_POST["name"];
$surname=$_POST["surname"];
$content=$_POST["content"];
$submit=$_POST["submit"];


if (isset($submit)){


// guncelle(TÜR, "TABLO", "SÜTUNLAR", "KOŞUL", array(SÜTUNDEĞERLERİ,KOŞULDEĞERLERİ));
// linkten gönderdiğim id numarasını burda değiştir
// 
 $guncel = $bag->guncelle(0, "codes", "name,surname,content", "WHERE id=?", array("$name","$surname","$content",$id));

 if ($guncel){
  echo $guncel. ": içerik guncellendi";

  header("Location:listele.php");
}else{
  echo "içerik guncellenmedi";
}
}
else{
	echo "değiştirilecek alanları doldurun..";
}

include 'footer.php';
?>
