<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Kişi Düzenle</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
		<!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- material-design-iconic-font -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
	<!-- animate -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
	<!-- hamburgers -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css" />
	<!-- animsition -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css" />
	<!-- select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
	<!-- daterangepicker -->
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css " />
	<!-- util -->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<!-- main -->
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
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- animsition.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<!-- bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- select2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
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
	<!-- select2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<!-- moment -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<!-- countdowntime -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js"></script>
	<!-- daterangepicker -->
	<script type="text/javascript" src="js/daterangepicker.js"></script>
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
