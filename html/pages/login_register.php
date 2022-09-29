<!-- header section starts  -->
<?php include("../../includes/header.php"); ?>
<!-- header section ends -->

<div class="text-center">
    <div class="row">
        <div class="box">
            <div class="content">
                <h1>Iniciar Sesion</h1>

                <form action="../func/loguear.php" method="POST">

                    <div class="content">
                        <label for="nombre"><b>Nombre de usuario:</b></label>
                        <input name="nombre" type="text" placeholder="vi.rosendo" required>
                    </div>

                    <div class="content">
                        <label for="psw"><b>Contraseña:</b></label>
                        <input name="rut" type="text" placeholder="********" required>
                    </div>

                    <div>
                        <button class="btn" type="submit" value="submit"> <span>Ingresar</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <div class="row">
        <div class="box">
            <div class="content">


                <form action="../func/registrarse.php" method="POST">

                    <h1>Registrarse / Datos empresa</h1>

                    <div class="content">
                        <label for="razon"><b>Razón social:</b></label>
                        <input name="razon" type="text" placeholder="vi.rosendo" required>
                    </div>

                    <div class="content">
                        <label for="direc_empresa"><b>Dirección empresa:</b></label>
                        <input name="direc_empresa" type="text" placeholder="vi.rosendo" required>
                    </div>

                    <div class="content">
                        <label for="tel_empresa"><b>Teléfono empresa:</b></label>
                        <input name="tel_empresa" type="text" placeholder="vi.rosendo" required>
                    </div>

                    <div class="content">
                        <label for="mail_empresa"><b>Mail empresa:</b></label>
                        <input name="mail_empresa" type="text" placeholder="vi.rosendo" required>
                    </div>

                    <div class="content">
                        <label for="usu_empresa"><b>Usuario empresa:</b></label>
                        <input name="usu_empresa" type="text" placeholder="vi.rosendo" required>
                    </div>

                    <h1>Registrarse / Datos personales</h1>

                    <div class="content">
                        <label for="psw"><b>Contraseña :</b></label>
                        <input name="rut" type="text" placeholder="********" required>
                    </div>

                    <div>
                        <button class="btn" type="submit" value="submit"> <span>Ingresar</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- footer section starts  -->
<?php include("../../includes/footer.php"); ?>
<!-- footer section ends -->