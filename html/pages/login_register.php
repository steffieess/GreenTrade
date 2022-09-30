<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<body>

    <div id='login-form' class='login-page'>

        <div class="form-box">

            <div class='button-box'>
                <div id='btn'></div>
                <button type='button' onclick='login()' class='toggle-btn'><b>Log In</b></button>
                <button type='button' onclick='register()' class='toggle-btn'><b>Register</b></button>
            </div>
            <!--Inicio Formulario LOGIN-->
            <form action="../func/ingresar.php" id='login' class='input-group-login' method="POST">
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
                    <input class="submit-btn" type="submit" value="Ingresar" name="Ingresar">
                </div>
            </form>
            <!--Cierre Formulario LOGIN-->
            <!--Inicio Formulario REGISTER-->
            <form action="../func/registrarse.php" id='register' class='input-group-register' method="POST">
                <div id="global">
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
                    <h3>Representante de la Empresa</h3>
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
                    <div class="content">
                            <label for="clave_user"><b>Crear contraseña representante</b></label>
                            <input name="clave_user" type="text" class='input-field' placeholder="••••••••••••" required>
                        </div>
                        <div class="content">
                            <label for="clave_user_valid"><b>Repita contraseña creada</b></label>
                            <input name="clave_user_valid" type="text" class='input-field' placeholder="••••••••••••" required>
                        </div>
                    <div>
                        <input class="submit-btn" type="submit" value="Registrar" name="Registrar">
                    </div>
                </div>
            </action=>
            <!--Cierre Formulario REGISTER-->
        </div>
    </div>

    <!--INICIO SCRIPT BUTTON SCROLL DE LOGIN - REGISTER-->
    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');

        function register() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';
        }

        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0px';
        }
    </script>
    <!--CIERRE SCRIPT BUTTON SCROLL DE LOGIN - REGISTER-->

    <!-- footer section starts  -->
    <?php include("../../includes/footer.php"); ?>
    <!-- footer section ends -->