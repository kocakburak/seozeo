<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>

<div class="wrapper wrapper-content animated fadeInRight">				
		<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-kategoriler.php" onclick="document.form(0).submit();" class="btn btn-primary ">Hepsi</a>
					<a href="admin-kategori-ekle.php" onclick="submit();" href="javascript:void(0);" class="btn btn-primary ">Yeni Ekle</a>
					<a href="admin-kategori-duzenle.php" name="duzenle" class="btn btn-primary ">Düzenle</a>
					<a href="admin-kategori-sil.php" name="sil" class="btn btn-primary ">Sil</a>
				</div>
			</div>
		
		<div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">                   
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                
								
                             
								                                    
                                   
									
								<?php 
								$checkData =  mysql_query("SELECT tag FROM tags  ") or die(mysql_error());	
											
								echo   '<form role="form" action="admin-kategori-duzenle.php" method="post">
										<div class="form-group"><label>Kategoriler</label> 
										<select class="form-control" name="kategoriler">';
										while($row= mysql_fetch_array($checkData))
								{
										echo "<option class=\"form-control\" value=\"$row[tag]\">$row[tag]</option>";
										
								}
								echo "</select></div>";
								echo '<div class="form-group"><label>Güncellenmiş Hali</label> <input type="text" name="guncelKategori" id="guncelKategori" placeholder="Kategorinin Güncel Halini Yazınız" class="form-control"></div>';
								echo "<div><button type=\"submit\" name=\"kategoriDuzenle\" class=\"btn btn-sm btn-primary pull-right m-t-n-xs\">Düzenle!</button></div>";
								echo "</form>";
									
									
									?>
									
                                    
                              
                            
							
							<?php
						extract($_POST);
						
						if(isset($kategoriDuzenle)){
						
						$deleteQuery = "UPDATE tags SET tag='$guncelKategori' WHERE tag='$kategoriler'";
								
									
						$result = mysql_query($deleteQuery);
						
						if($result){
							
							echo "<h2>Mesaj:</h2>";
							echo "Kategori başarılı bir şekilde güncellendi!<br>";
							
						}
						else {
							echo "<h2>Mesaj:</h2>";
							echo "Kategori güncellenemedi! Lütfen tekrar deneyiniz.";
						}
						
						
						}
						?>
                            
                        </div>
                    </div>
                </div>
            </div>
			
		
			
            </div>
			
			
			
			
			
</div>


<?PHP include 'footer.php'; ?>