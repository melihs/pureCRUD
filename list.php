<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/Listutil.css">
	<link rel="stylesheet" type="text/css" href="css/Listmain.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
    try
    {

    $db=new PDO("mysql:host=localhost;dbname=formdb;charset=utf8","root","");

    }catch(PDOException $e)

    {
        
        $e->getMessage();
    }
	$rows=$db->query("SELECT * FROM contact",PDO::FETCH_ASSOC);
	?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="mb-4">
				<a href="/index.html" class="btn btn-dark pull-right"><i class="fa fa-home" aria-hidden="true"></i>
				</a>
					<h3>Kişiler</h3>
				</div>
				<div class="table100 ver1 m-b-10">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">ID</th>
									<th class="cell100 column1">Adı</th>
									<th class="cell100 column1">E-posta</th>
									<th class="cell100 column1">Telefon</th>
									<th class="cell100 column1">Pozisyon</th>
									<th class="cell100 column1">Tecrübe</th>
									<th class="cell100 column1">Mesaj</th>
									<th class="cell100 column1">işlemler</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="js-pscroll">
						<table>
							<tbody>
								<?php foreach($rows as $row){ ; ?>
								<tr class="row100 body">
									<td class="cell100 column1"><?= $row["id"]; ?></td>
									<td class="cell100 column1"><?= $row["name"]; ?></td>
									<td class="cell100 column1"><?= $row['mail']; ?></td>
									<td class="cell100 column1"><?= $row['phone']; ?></td>
									<td class="cell100 column1"><?= $row['position']; ?></td>
									<td class="cell100 column1"><?= $row['knowledge']; ?></td>
									<td class="cell100 column1"><?= $row['message']; ?></td>
									<td class="cell100 column1">
									<a href="edit.php?id=<?= $row["id"];?>" class="btn btn-secondary m-2">
										<i class="fa fa-cog" aria-hidden="true"></i>
									</a>
									<a href="delete.php?id=<?= $row["id"];?>" class="btn btn-danger m-2">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
	</script>
	<script src="js/Listmain.js"></script>
</body>
</html>