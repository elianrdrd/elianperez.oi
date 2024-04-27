<?php session_start(); if($_SESSION['user_exist'] == true)
{ echo "<script>window.location.href='./Account/'</script>"; }else{
require("config/name.php");
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="@<?php echo $_SESSION['name_server']; ?> By iBench server" name="description" />
        <meta content="@<?php echo $_SESSION['name_server']; ?>" name="author" />
        <link rel="icon" href="assetss/img/logo/favicon.png" sizes="32x32">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        
    	<link href="assetss/css/transparent/app.min.css" rel="stylesheet" />
        <link href="assetss/css/tw2factor.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/styles.css">

        <title><?php echo $_SESSION['name_server']; ?> | Log In</title>
    </head>
    <body>
        <div class="container">
            <div class="login__content">
                <img src="assets/img/bg-login.png" alt="login image" class="login__img">
                
                

                <form action="config/login.php" method="POST" class="login__form">
                    <div>
                        <h1 class="login__title">
                            <span><?php echo $_SESSION['name_server']; ?></span>
                        </h1>
                        <p class="login__description">
                            For your protection, verify your identity
                        </p>
                    </div>
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
                    <p class="mb-0">If you do not remember your data contact the administrator <a href='https://t.me/iBenchrif'>iBench Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>


                    <?php if($_SESSION['error_login'] == 'password'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">ERROR!</h4>
                    <p>Email or Password Incorrect.</p>
                    <hr>
                    <p class="mb-0">If you do not remember your data contact the administrator <a href='https://t.me/iBenchrif'>iBench Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>

                    <?php if($_SESSION['error_login'] == 'disable_account'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">ERROR!</h4>
                    <p>Your account has been suspended</p>
                    <hr>
                    <p class="mb-0">For more information contact the administrator <a href='https://t.me/iBenchrif'>iBench Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>

                    <?php if($_SESSION['error_login'] == 'paid'){ ?>
                    <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Account Suspended!</h4>
                    <p>Your account has been suspended for overdue payment </p>
                    <hr>
                    <p class="mb-0">For more information contact the administrator <a href='https://t.me/iBenchrif'>iBench Server Team</a></p>
                    </div>
                    <?php $_SESSION['error_login'] = ""; } ?>
                    <div>
                        <div class="login__inputs">
                            <div>
                                <label for="" class="login__label">Email</label>
                                <input name="email" type="email" placeholder="Enter your email address" value=""<?php echo $_SESSION['email_user']; ?>"  required <?php if($_SESSION['email_user'] == ''){ echo "autofocus"; } ?>" required class="login__input">
                            </div>
    
                            <div>
                                <label for="" class="login__label">Password</label>
    
                                <div class="login__box">
                                    <input name="password" type="password" placeholder="Enter your password" ?<?php if($_SESSION['email_user']){ echo 'autofocus'; } ?> required class="login__input" id="input-pass">
                                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="login__check">
                            <input type="checkbox" class="login__check-input">
                            <label for="" class="login__check-label">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <div class="login__buttons">
                            <button type="submit" class="login__button">Log In</button>
                            <button href="https://t.me/iBenchrif" class="login__button login__button-ghost">Sign Up</button>
                        </div>

                        <a href="https://t.me/iBenchrif" class="login__forgot">Forgot Password?</a>
                    </div>
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
                    <div style="font-size:15px;color:#fff;text-align:center;margin-top:10px;">Have not you received the code? <a href="config/tw2factor.php?resendcode">Resend Now.</a></div>
				</form>
				<hr />
						<p class="text-center text-white-transparent-5 mb-0">
							&copy; <?php echo $_SESSION['name_server']; ?> All Right Reserved 2023
						</p>
                <?php } ?>
            </div>
        </div>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
        <script src="assetss/js/app.min.js"></script>
	    <script src="assetss/js/theme/transparent.min.js"></script>
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