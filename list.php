<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<!-- bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- font-awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- animate -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
	<!-- select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
	<!-- perfect-scrollbar -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="css/Listutil.css">
	<link rel="stylesheet" type="text/css" href="css/Listmain.css">
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
		<div class="wrap-table100 ">
				<div class="mb-4">
				<a href="index.html" class="btn btn-dark pull-right"><i class="fa fa-home" aria-hidden="true"></i></a>
					<h3>Kişiler</h3>
				</div>
				<div class="table100 ver1 m-b-10 ">
				<div class="table100-head">
						<table class="text-center">
							<tr class="row100 header">
								<thead>
									<th>ID</th>
									<th>Adı</th>
									<th>Eposta</th>
									<th>Tecrübe</th>
									<th>Pozisyon</th>
									<th>Tecrübe</th>
									<th>Mesaj</th>
									<th>işlemler</th>
								</tr>
								</thead>
							</table>
					</div>
					<div class="js-pscroll table-responsive-md">
					<table class="table text-center">
							<tbody>
								<?php foreach($rows as $row){ ; ?>
									<tr class="row100 body">
									<td class=""><?= $row["id"]; ?></td>
									<td class=""><?= $row["name"]; ?></td>
									<td class=""><?= $row['mail']; ?></td>
									<td class=""><?= $row['phone']; ?></td>
									<td class=""><?= $row['position']; ?></td>
									<td class=""><?= $row['knowledge']; ?></td>
									<td class=""><?= $row['message']; ?></td>
									<td class="">
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
						<nav aria-label="...">
									<ul class="pagination">
										<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1">Previous</a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item active">
										<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
										</li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item">
										<a class="page-link" href="#">Next</a>
										</li>
									</ul>
								</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<!-- bootstrap -->
	<!-- select2 -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<!-- perfect-scrollbar -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
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