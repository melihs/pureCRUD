<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Kişi Düzenle</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form action="update.php" method="GET" class="contact100-form validate-form">
				<span class="contact100-form-title">
					 Düzenleme Formu
				</span>
			<?php
				try
				{

				$db=new PDO("mysql:host=localhost;dbname=formdb;charset=utf8","root","");

				}catch(PDOException $e)

				{
					
					$e->getMessage();
				}
				
				$id = $_GET["id"];
				$select = $db->prepare("SELECT * FROM contact WHERE id = :id");
				$select->bindParam(":id",$id,PDO::PARAM_INT);
				$result = $select->execute();
				
				$row=$select->fetch(PDO::FETCH_ASSOC);
			?>
				<!-- id -->
				<input type="hidden" name="id" value="<?= $row['id'] ?>">
				<!-- name -->
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Lütfen adınızı girin">
					<span class="label-input100">Ad-Soyad *</span>
					<input class="input100" type="text" name="name" placeholder="Adınız" value="<?= $row['name']; ?>">
				</div>
				<!-- email -->
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "mail adresi (ornek@gmail.com)">
					<span class="label-input100">e-mail *</span>
					<input class="input100" type="text" name="mail" placeholder="Mail adresiniz" value="<?= $row['mail']; ?>">
				</div>
				<!-- birthday -->
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">doğum Tarihi</span>
					<input class="input100" type="text" name="birthday" value="<?= $row['birthday']; ?>"/>
				</div>
				<!-- phone -->
				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Telefon</span>
					<input class="input100" type="text" name="phone" maxlength="11" placeholder="Telefon numaranız" value="<?= $row['phone']; ?>">
				</div>
				<!-- position -->
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Başvuru Pozisyonu</span>
					<div>
						<select class="js-select2" name="position">
							<option <?php ($row['position'] === "İnsan Kaynakları") ? "selected":"" ?> ><?= $row['position']; ?></option>
							<option value="İnsan Kaynakları">İnsan Kaynakları</option>
							<option value="Yazılım Uzmanı">Yazılım Uzmanı</option>
							<option value="UI/UX Tasarımcısı">UI/UX Tasarımcısı</option>
							<option value="Satış Danışmanı">Satış Danışmanı</option>
						</select>
						
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<!-- knowledge -->
				<div class="w-full">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Tecrübeniz?</span>
						
					
						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="knowledge" value="başlangıç" 
							<?php echo ($row['knowledge'] == "başlangıç" ? 'checked="checked"': ''); ?> >
							<label class="label-radio100" for="radio1">
								başlangıç
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="knowledge" value="orta"
							<?php echo ($row['knowledge'] == "orta" ? 'checked="checked"': ''); ?> >
							<label class="label-radio100" for="radio2">
								orta
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio3" type="radio" name="knowledge" value="kıdemli" 
							<?php echo ($row['knowledge'] == "kıdemli" ? 'checked="checked"': ''); ?> >
							<label class="label-radio100" for="radio3">
								Kıdemli
							</label>
						</div>
					</div>
				</div>
			<!-- message -->
				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Lütfen mesajınızı girin">
					<span class="label-input100">Mesaj *</span>
					<textarea class="input100" name="message" placeholder="Mesajınızı girebilirsiniz"><?= $row['message']; ?></textarea>
				</div>
					<button href="list.php" class="btn btn-danger pull-left">
						<span>
							iptal
							<i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
						</span>
					</button>
					<button type="submit" class="btn btn-success pull-right">
						<span>
							Kaydet
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>

			</form>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="js/main.js"></script>
	<script>
		$('input[name="birthday"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 1901,
			maxYear: parseInt(moment().format('YYYY'),10)
		});
	</script>
</body>
</html>
