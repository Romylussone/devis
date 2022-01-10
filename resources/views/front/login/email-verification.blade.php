<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Verification Email</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/img/email-verif/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/front/login/email-verif/util.css">
	<link rel="stylesheet" type="text/css" href="/css/front/login/email-verif/main.css">
	<link rel="stylesheet" type="text/css" href="/css/front/login/email-verif/pure-loading.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 wrapper">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Vérification d'adresse email
				</span>
				<hr/>
				<!-- <span class="info ">Un code de vérification à 5 chiffres à été envoyé a cette adresse adr@gmail.com |
					<a href="#" class="link">Renvoyer le code ...</a>
				</span>
				<hr/> -->
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input">
						
					</div>

					<div class="wrap-input100 validate-input" >
						<input id="emailcode" class="input100" url="{{route('visite.hall')}}" type="text" name="pass" placeholder="Code ..." c="<?=rand(10701,99899);?>">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
						<div class="check" style="display:none;"></div>
					</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script>
	$(document).ready(function() {
	var c = $('#emailcode').attr('c');
	var visite = $('#emailcode').attr('url');
	$('#emailcode').val(c);
	$("#emailcode").trigger('focus');
	setTimeout(function() { 
        $(".lds-spinner").hide('slow');
    }, 7);
	window.location.href=""+visite;
	

  });
</script>
</body>
</html>