<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<div id='login-form' class='login-page'>
    <div class="form-box">
        <div class='button-box'>
            <div id='btn'></div>
            <button type='button' onclick='login()' class="toggle-btn">Ingresar </button>
            <button type='button' onclick='register()' class="toggle-btn">Registrar </button>
        </div>
        <form id='ingresar' class='input-group-login' action="../func/loguear.php" method="POST">
            <h1>Iniciar Sesión</h1>
            <div class="content">
                <label for="nombre"><b>Correo</b></label>
                <input name="nombre" type="text" class='input-field' placeholder="greentrade@greentrade.com" required>
            </div>
            <div class="content">
                <label for="psw"><b>Contraseña</b></label>
                <input name="clave" type="text" class='input-field' placeholder="••••••••••••" required>
            </div>
            <div>
                <button class="submit-btn" type="submit" value="submit"> <span>Ingresar</span></button>
            </div>
        </form>

        <form id='registrar' class='input-group-register' action="../func/registrarse.php" method="POST">
            <h1>Registrar Empresa</h1>
            <div class="content">
                <label for="razon"><b>Razón social</b></label>
                <input name="razon" type="text" class='input-field' placeholder="Razón social" required>
            </div>
            <div class="content">
                <label for="direc_empresa"><b>Dirección Empresa</b></label>
                <input name="direc_empresa" type="text" class='input-field' placeholder="Dirección Empresa" required>
            </div>
            <div class="content">
                <label for="tel_empresa"><b>Teléfono Empresa</b></label>
                <input name="tel_empresa" type="text" class='input-field' placeholder="Teléfono Empresa" required>
            </div>
            <div class="content">
                <label for="mail_empresa"><b>Correo Empresa</b></label>
                <input name="mail_empresa" type="text" class='input-field' placeholder="greentrade@greentrade.com" required>
            </div>
            <h1>Registrar Representante de la Empresa</h1>
            <div class="content">
                <label for="rut_user"><b>Rut representante</b></label>
                <input name="rut_user" type="text" class='input-field' placeholder="11111111-1" required>
            </div>
            <div class="content">
                <label for="nom_user"><b>Nombre representante</b></label>
                <input name="nom_user" type="text" class='input-field' placeholder="Nombre representante" required>
            </div>
            <div class="content">
                <label for="appat_user"><b>Apellido paterno representante</b></label>
                <input name="appat_user" type="text" class='input-field' placeholder="Apellido Paterno" required>
            </div>
            <div class="content">
                <label for="apmat_user"><b>Apellido materno representante</b></label>
                <input name="apmat_user" type="text" class='input-field' placeholder="Apellido Materno" required>
            </div>
            <div class="content">
                <label for="mail_user"><b>Correo representante</b></label>
                <input name="mail_user" type="text" class='input-field' placeholder="greentrade@greentrade.com" required>
            </div>
            <div class="content">
                <label for="tel_user"><b>Teléfono representante</b></label>
                <input name="tel_user" type="text" class='input-field' placeholder="Teléfono" required>
            </div>
            <div>
                <button class="submit-btn" type="submit" value="submit"> <span>Ingresar</span></button>
            </div>
        </form>
    </div>
</div>
</div>
<script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>

<!-- footer section starts  -->
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->