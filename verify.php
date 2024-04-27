<?php session_start(); if($_SESSION['user_exist'] == true)
{ echo "<script>window.location.href='./Account/'</script>"; }else{
require("config/name.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $_SESSION['name_server']; ?> | Verify</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="@<?php echo $_SESSION['name_server']; ?> By iBench Server" name="description" />
    <meta content="@<?php echo $_SESSION['name_server']; ?>" name="author" />
    <link rel="icon" href="assetss/img/logo/favicon.png" sizes="32x32">
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="css/css/vendor.min.css" rel="stylesheet">
	<link href="css/css/app.min.css" rel="stylesheet">
	<link href="assetss/css/tw2factor.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	
</head>
<body class='pace-top'>
	<!-- BEGIN #app -->
	<div id="app" class="app app-full-height app-without-header">
		<!-- BEGIN login -->
		<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
			    <?php if($_SESSION['tw2factor'] != true){ ?>
				    <?php if($_SESSION['error_login'] == 'tw2factor'){ ?>
                    <div class="alert alert-danger fade show">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>!Login!</strong><br>
                        The verification code is wrong.
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>

                    <?php if($_SESSION['register_user_success'] == 'OK'){ ?>
                    <div class="alert alert-success fade show">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>!User registration!</strong><br>
                        Your user has registered but still needs the approval of an administrator, wait for a confirmation email.
                    </div>
                    
                    <?php $_SESSION['register_user_success'] = ""; } ?>


                    <?php if($_SESSION['error_login'] == 'false'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">ERROR!</h4>
                    <p>The email account you entered does not match any account.</p>
                    <hr>
                    <p class="mb-0">If you do not remember your data contact the administrator <a href='https://t.me/iBenchrif'>Anom Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>


                    <?php if($_SESSION['error_login'] == 'password'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">ERROR!</h4>
                    <p>Email or Password Incorrect.</p>
                    <hr>
                    <p class="mb-0">If you do not remember your data contact the administrator <a href='https://t.me/iBenchrif'>Anom Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>

                    <?php if($_SESSION['error_login'] == 'disable_account'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">ERROR!</h4>
                    <p>Your account has been suspended</p>
                    <hr>
                    <p class="mb-0">For more information contact the administrator <a href='https://t.me/iBenchrif'>Anom Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>

                    <?php if($_SESSION['error_login'] == 'paid'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Account Suspended!</h4>
                    <p>Your account has been suspended for overdue payment </p>
                    <hr>
                    <p class="mb-0">For more information contact the administrator <a href='https://t.me/iBenchrif'>Anom Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>
				<form action="config/login.php" method="POST" name="login_form">
					<h1 class="text-center"><?php echo $_SESSION['name_server']; ?></h1>
					<div class="text-body text-opacity-50 text-center mb-4">
						For your protection, please verify your identity.
					</div>
					<div class="mb-3">
						<label class="form-label">Email Address <span class="text-danger">*</span></label>
						<input name="email" type="text" class="form-control form-control-lg fs-body" value=""<?php echo $_SESSION['email_user']; ?>"  required <?php if($_SESSION['email_user'] == ''){ echo "autofocus"; } ?>" placeholder="">
					</div>
					<div class="mb-3">
						<div class="d-flex">
							<label class="form-label">Password <span class="text-danger">*</span></label>
							<a href="#" class="ms-auto text-body text-decoration-none text-opacity-50">Forgot password?</a>
						</div>
						<input  name="password" type="password" class="form-control form-control-lg" value="" placeholder="Password"<?php if($_SESSION['email_user']){ echo 'autofocus'; } ?>required />
					</div>
					<div class="mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Remember me</label>
						</div>
					</div>
					<button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-semibold mb-3">Sign In</button>
					<div class="text-center text-body text-opacity-50">
						Don't have an account yet? <a href="https://t.me/iBenchrif">Sign up</a>.
					</div>
						<hr />
						<p class="text-center text-white-transparent-5 mb-0">
							&copy; <?php echo $_SESSION['name_server']; ?> All Right Reserved 2023
						</p>
				</form>
				<?php }else{ ?>
                <div class="login-header" style="text-align:center;margin-top: -50px;" ><br><br>
                     <div style="font-size:25px;color:theme;">Two factor authentication</div>
                    <div style="font-size:15px;color:theme;">Your code was sent via Telegram.</div>
                </div>
                <div class="login-content">

                    <?php if($_SESSION['error_login'] == 'tw2factor'){ ?>
                    <div class="alert alert-danger fade show">
                        <span class="close" data-dismiss="alert">×</span>
                        <strong>!Login!</strong><br>
                         Your verification code is incorrect.
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>

                    <form action="config/tw2factor.php?verify" method="post" class="margin-bottom-0"  name="qrcodeRedirectForm">
					<input style="margin-left:17px;" maxlength="1" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" class="char-field" aria-label="Ingresa el código de verificación Dígito 1" placeholder="" aria-describedby="idms-input-error-1517811366226-1" data-index="0" aria-invalid="true" type="tel" id="char0"  autofocus onkeypress="return validanumber(event)" onkeyup="if (this.value.length == this.getAttribute('maxlength')) { if (event.keyCode!=9) { getElementById('char1').focus(); } }" name="char0">

                    <input maxlength="1" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" class="char-field" aria-label="Ingresa el código de verificación Dígito 2" placeholder="" aria-describedby="idms-input-error-1517811366226-1" data-index="1" aria-invalid="true" type="tel" id="char1" name="char1" onkeypress="return validanumber(event)" onkeyup="if (this.value.length == this.getAttribute('maxlength')) { if (event.keyCode!=9) { getElementById('char2').focus(); } }" onkeydown="return validarchar0(event)">

                    <input maxlength="1" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" class="char-field" aria-label="Ingresa el código de verificación Dígito 3" placeholder="" aria-describedby="idms-input-error-1517811366226-1" data-index="2" aria-invalid="true" type="tel" id="char2" name="char2" onkeypress="return validanumber(event)" onkeyup="if (this.value.length == this.getAttribute('maxlength')) { if (event.keyCode!=9) { getElementById('char3').focus(); } }" onkeydown="return validarchar1(event)">

                    <input style="margin-left:15px;" maxlength="1" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" class="char-field"  aria-label="Ingresa el código de verificación Dígito 4" placeholder="" aria-describedby="idms-input-error-1517811366226-1" data-index="3" aria-invalid="true" type="tel" id="char3" name="char3" onkeypress="return validanumber(event)" onkeyup="if (this.value.length == this.getAttribute('maxlength')) { if (event.keyCode!=9) { getElementById('char4').focus(); } }" onkeydown="return validarchar2(event)">

                    <input maxlength="1" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" class="char-field" aria-label="Ingresa el código de verificación Dígito 5" placeholder="" aria-describedby="idms-input-error-1517811366226-1" data-index="4" aria-invalid="true" type="tel" id="char4" name="char4" onkeypress="return validanumber(event)" onkeyup="if (this.value.length == this.getAttribute('maxlength')) { if (event.keyCode!=9) { getElementById('char5').focus(); } }" onkeydown="return validarchar3(event)">

                    <input maxlength="1" autocorrect="off" autocomplete="off" autocapitalize="off" spellcheck="false" class="char-field" aria-label="Ingresa el código de verificación Dígito 6" placeholder="" aria-describedby="idms-input-error-1517811366226-1" data-index="5" aria-invalid="true" type="tel" id="char5" name="char5" onkeypress="return validanumber(event)" onkeyup="if (this.value.length == this.getAttribute('maxlength')) { if (event.keyCode!=9) {window.setTimeout('document.qrcodeRedirectForm.submit()', 500) } }" onkeydown="return validarchar4(event)">
                    <div style="font-size:15px;color:#theme;text-align:center;margin-top:10px;">Have not you received the code? <a href="config/tw2factor.php?resendcode">Resend Now.</a></div>
				</form>
				<hr />
						<p class="text-center text-white-transparent-5 mb-0">
							&copy; <?php echo $_SESSION['name_server']; ?> All Right Reserved 2023
						</p>
                <?php } ?>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
		<!-- BEGIN theme-panel -->
		<div class="app-theme-panel">
			<div class="app-theme-panel-container">
				<a href="javascript:;" data-toggle="theme-panel-expand" class="app-theme-toggle-btn"><i class="bi bi-sliders"></i></a>
				<div class="app-theme-panel-content">
					<div class="fw-bold text-body mb-2">
						Theme Color
					</div>
					<div class="app-theme-list">
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-warning" data-theme-class="theme-warning" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-teal" data-theme-class="theme-teal" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Teal"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-info" data-theme-class="theme-info"  data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan"></a></div>
						<div class="app-theme-list-item active"><a href="javascript:;" class="app-theme-list-link bg-primary" data-theme-class=""  data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo"></a></div>
						<div class="app-theme-list-item"><a href="javascript:;" class="app-theme-list-link bg-gray-200" data-theme-class="theme-gray-500" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Gray"></a></div>
					</div>
					<hr class="opacity-1">
					<div class="row mt-10px">
						<div class="col-8">
							<div class="fw-bold text-body d-flex mb-1 align-items-center">
								Dark Mode 
								<i class="bi bi-moon-fill ms-2 my-n1 fs-5 text-body text-opacity-25"></i>
							</div>
							<div class="lh-sm">
								<small class="text-body opacity-50">Adjust the appearance to reduce glare and give your eyes a break.</small>
							</div>
						</div>
						<div class="col-4 d-flex">
							<div class="form-check form-switch ms-auto mb-0">
								<input type="checkbox" class="form-check-input" name="app-theme-dark-mode" data-toggle="theme-dark-mode" id="appThemeDarkMode" value="1">
								<label class="form-check-label" for="appThemeDarkMode"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END theme-panel -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="css/js/vendor.min.js"></script>
	<script src="css/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script>
    var hasAutofocus=document.getElementById("char0").autofocus;function validanumber(e){return tecla=document.all?e.keyCode:e.which,8==tecla||(patron=/[0-9]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final))}function validarchar0(e){tecla=document.all?e.keyCode:e.which,8==tecla&&document.getElementById("char0").focus()}function validarchar1(e){tecla=document.all?e.keyCode:e.which,8==tecla&&document.getElementById("char1").focus()}function validarchar2(e){tecla=document.all?e.keyCode:e.which,8==tecla&&document.getElementById("char2").focus()}function validarchar3(e){tecla=document.all?e.keyCode:e.which,8==tecla&&document.getElementById("char3").focus()}function validarchar4(e){tecla=document.all?e.keyCode:e.which,8==tecla&&document.getElementById("char4").focus()}function validarchar5(e){tecla=document.all?e.keyCode:e.which,8==tecla&&document.getElementById("char5").focus()}
    </script>
    <script>
    function validarchar0(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) document.getElementById("char0").focus();
    }
    function validarchar1(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) document.getElementById("char1").focus();
    }
    function validarchar2(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) document.getElementById("char2").focus();
    }
    function validarchar3(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) document.getElementById("char3").focus();
    }
    function validarchar4(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) document.getElementById("char4").focus();
    }
    function validarchar5(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) document.getElementById("char5").focus();
    }
    </script>
	<script>
		$(document).ready(function() {
			App.init();
			Login.init();
		});
		
		const PassBtn = document.querySelector('#passBtn');
PassBtn.addEventListener('click', () => {
    const input = document.querySelector('#passInput');
    input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');

   if (input.getAttribute('type') === 'text'){
     PassBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
  } else{
     PassBtn.innerHTML = '<i class="fa fa-eye fa-fw" aria-hidden="true"></i>';
  }

});
	</script>
	
</body>
</html>
<?php } ?>