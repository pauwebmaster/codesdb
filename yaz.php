<?php 
include 'header.php';

 ?>

<div class="contentGrid ">
 <div class="container">
<form class="yazForm" method="post">
<div class="row">
<div class="col-md-6 col-12">
   <div class="input-field"> 
    <input type="text" id="name" name="name" required >
    <label for="name">Name:</label>
  </div>
</div>
<div class="col-md-6 col-12">
 <div class="input-field"> 
    <input type="text" id="surname" name="surname" required >
    <label for="surname">Surname:</label>
  </div>
</div>


<div class="col-md-12 col-12 mt-3">
	
	<textarea class="my-0" name="content" id="content" cols="30" rows="10" placeholder="İçerik Ekleyin" required=""></textarea>
    
  </div>
  <div class="col-md-3 mt-3 mx-auto col-6">
  	<div class="inputSubmit">
    <input type="submit"name="submit" value="Gönder">
  </div>

  

</div>

</form>
 </div>

</div>

<?php 

include 'baglan.php';



$name=$_POST["name"];
$surname=$_POST["surname"];
$content=$_POST["content"];
$submit=$_POST["submit"];

if (isset($submit)) {
  $ekle = $bag->ekle("codes", "name,surname,content", array("$name", "$surname","$content"));

 if ($ekle){

  echo "id: " .$ekle. " kayıt eklendi";

 }else{

  echo "Kayit eklenmedi";

 }

} else {
  
  echo "boş yerler var";

}


 





include "footer.php";

   ?>


