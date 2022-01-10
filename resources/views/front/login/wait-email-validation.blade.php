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
					Virtualex | Vérification d'adresse email
				</span>
				<hr/>
				<span class="info" email="{{$email}}">Un lien de vérification à été envoyé a cette adresse {{$email}} |
					<a href="#" class="link" onClick="send()">Renvoyer le lien ...</a>
				</span>
				<hr/>
				<form class="login100-form validate-form p-b-33 p-t-5 ">

					<div class="container-login100-form-btn m-t-32 text">
						<div class="lds-spinner" style="display:none;">
							<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
						</div>
					</div>
					<hr>
					<div class="wrap-input100 validate-input" >
						<input id="emailcode" class="input100" url="{{route('visite.hall')}}" type="text" name="pass" placeholder="code automatique ...">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						
					</div>
					</div>
					<input id="csend" value="{{ csrf_token() }}" type="hidden" visiteurid="{{$id}}" url="{{route('sendcemailLink')}}">
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

	//Configuration global de ajax
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('#csend').val()}
	})
		
	function send()
	{
		$.ajax({
			url : $("#csend").attr("url"),
			method : "POST",
			data: {email: $(".info").attr("email") , id: $("#csend").attr("visiteurid")},
			beforeSend: function(){
				$(".lds-spinner").css("display", "block");
			}
		}).done( function(response){
			//Si l'appel s'est bien passé
			$(".lds-spinner").css("display", "none");
			$(".text").html("Lien envoyé");

		}).fail(function(response){
			$(".lds-spinner").css("display", "none");
			$(".text").html("Verifier l'adresse email saisie lors de l'inscription ");
		})
	}
</script>
</body>
</html>