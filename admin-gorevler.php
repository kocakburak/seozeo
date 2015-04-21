<?PHP include 'header.php'; ?>
<?php require('config.php'); ?>
<head>

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	
</head>
<body>
			</br></br></br></br>
			        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
            <div class="col-lg-12">
            
            
            <div class="ibox-content">
            <div class="">
			<a href="admin-gorevler.php" onclick="fnClickAddRow();" class="btn btn-success ">Hepsi</a>
            <a href="admin-gorev-ekle.php" onclick="fnClickAddRow();" class="btn btn-primary ">Ekle</a>
			<a href="admin-gorev-sil.php" onclick="fnClickAddRow();" class="btn btn-primary ">Sil</a>
			<a href="admin-gorev-silinenler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Silinenler</a>
			<a href="admin-gorev-arsivle.php" onclick="fnClickAddRow();" class="btn btn-primary ">Arşivle</a>
			<a href="admin-gorev-arsivlenenler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Arşivlenler</a>
            </div>
			</br>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-6">
						<div class="input-group"><input type="text" placeholder="Arama" class="input-sm form-control"> <span class="input-group-btn">
						 <button type="button" class="btn btn-sm btn-primary"> Ara</button> </span></div>
				</div>	
			
				<br><br>
					<div class="ibox float-e-margins" class="row" style="margin-bottom:10px;">
							<form role="form" action="admin-gorevler.php" method="post">                      						
								<div class="form-group" id="data_1">
									<div class="col-lg-3" class="form-group" id="data_1"> 
										<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="ilkTarih" placeholder="23/04/2014" class="form-control">
										</div>
									</div>
								</div>
								
								<div class="col-lg-3" class="form-group" id="data_1">
										
										<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="sonTarih" placeholder="23/06/2014" class="form-control" >
										</div>
								</div>
								
								<div class="col-lg-5">
										<button class="btn btn-primary" name="filtrele" type="submit">Filtrele</button>   
								</div>
							
					</div>
			
			
				</form>
			</div>
			
			
			
            <table class="table table-striped table-bordered table-hover " id="editable" >
            <thead>
            <tr>
                <th>Müsteri Adı</th>
                <th>Blog Adı/Yazarı</th>
                <th>Tarih</th>
                <th>Anahtar Kelime</th>
                <th>URL</th>
				<th>Durum</th>
            </tr>
			</thead>
			
			
			<tbody>
            <tr class="gradeX">
			<?php
							extract($_POST);
							
							if(isset($filtrele))
										{
										$getBlogs =  mysql_query("SELECT customer, blog, tags, url, topic, aim, date, status FROM assignment where date between '$ilkTarih' and '$sonTarih' ORDER by customer DESC ") or die(mysql_error());
							
										while($row= mysql_fetch_array($getBlogs))
										{	echo"<tr>";
											echo"<td>".$row['customer'] . " </td>";
										echo"<td>".$row['blog'] . " </td>";
										echo"<td>".$row['date'] . " </td>";
										echo"<td>".$row['tags'] . " </td>";
										echo"<td>".$row['url'] . " </td>";
										echo"<td>".$row['status'] . " </td></tr>";
										}
												
												echo "</table>";
										}
										
							else{
								$getBlogs =  mysql_query("SELECT customer, blog, tags, url, topic, aim, date, status FROM assignment") or die(mysql_error());
	
	
						while($row= mysql_fetch_array($getBlogs))
						{				echo"<tr>";
										
										echo"<td>".$row['customer'] . " </td>";
										echo"<td>".$row['blog'] . " </td>";
										echo"<td>".$row['date'] . " </td>";
										echo"<td>".$row['tags'] . " </td>";
										echo"<td>".$row['url'] . " </td>";
										echo"<td>".$row['status'] . " </td></tr>";
										
						}
						
						echo "</table>";
								
							}			
							
						?> 
 
            </tbody>
            
            </table>

            </div>
						<div class="btn-group">
                                <button type="button" class="btn btn-white"><i class="fa fa-chevron-left"></i></button>
                                <button class="btn btn-white active">1</button>
                                <button class="btn btn-white">2</button>
                                <button class="btn btn-white">3</button>
                                <button class="btn btn-white">4</button>
                                <button type="button" class="btn btn-white"><i class="fa fa-chevron-right"></i> </button>
                        </div>
            </div>
            </div>
            </div>
        </div>
        

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>

<?PHP include 'footer.php'; ?>