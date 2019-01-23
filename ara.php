<?php include 'header.php';
?>

<div class="contentGrid"><div class="container">
	<div class="aramaGrid mt-5">

		<form method="post">

			<div class="searchDiv">
				<input type="search" name="search" class="search" placeholder="Name,Surname,Content...">
				<button class="searchS" type="submit"><i class="fa fa-search mx-auto"></i></button>
			</div>
			<div class="advancedSearch mx-auto ">
				<div class="searchSutunGrid">
					<ul class="searchSutun">
						<li ><label for="insearch" ><input type="checkbox" name="insearch" data-toggle="tooltip" title="aranan değerin tam olmaksızın arama yapar"> İçinde bul</label></li>
						<li ><label  for="id"><input type="radio" name="deger" value="id">id</label></li>
						<li ><label  for="name"><input type="radio" name="deger" value="name" checked>name</label></li>
						<li ><label  for="surname"><input type="radio" name="deger" value="surname">surname</label></li>
						<li ><label  for="content"><input type="radio" name="deger" value="content">content</label></li>
						<li ><label  for="hepsi"><input type="radio" name="deger" value="hepsi">hepsi</label></li>
					</ul>
				</div>	
				<!-- <div class="searchBar">bar</div> -->
			</div> 


		</form>

	</div>

	<div class="searchListle mt-5">
		<div class="row">



			<?php 
			include 'baglan.php';
			$insearch=$_POST["insearch"];
			$search=$_POST["search"];
			$deger=$_POST["deger"];
			

			if ($deger=="hepsi" && isset($insearch)) {
				$kosulum="WHERE name LIKE ? OR surname LIKE ? OR content LIKE ?";
				$istenen= array("%$search%","%$search%","%$search%");
			}

			elseif ($deger=="hepsi" && !isset($insearch)) {

				$kosulum="WHERE id=? OR name=? OR surname=? OR content=?";
				$istenen= array("$search","$search","$search","$search");

			}else if(isset($insearch) && $deger!="hepsi") {

				$kosulum="WHERE ".$deger." LIKE ?";
				$istenen=array("%$search%");
			}
			else
			{
				$kosulum="WHERE ".$deger." LIKE ?";
				$istenen=array("$search");
			}




			$cikti = $bag->cek("OBJ_ALL", "codes", "*", $kosulum, $istenen);

			if ($cikti) {

				foreach($cikti as $satir) {

					echo '	<div class="col-4 my-3">
					<div class="card" style="width: 18rem;">
					<div class="card-body">
					<h5 class="card-title">'.$satir->name.'</h5>
					<h6 class="card-subtitle mb-2 text-muted">'.$satir->surname.'</h6>
					<p class="card-text">'.$satir->content.'</p>
					<a href="sil.php?id='.$satir->id.'" class="card-link">sil</a>
					<a href="guncel.php?id='.$satir->id.'" class="card-link" >güncelle</a>
					</div>
					</div>
					</div>';

				}

			} else {

				echo "hata: ".$cikti;
			}


			?>



		</div>

	</div>


</div></div>


<?php include 'footer'; ?>