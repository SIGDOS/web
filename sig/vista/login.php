<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="refresh" content="30">-->

    <link rel="shortcut icon" href="img/sigdos.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>SIGDOS</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="contenedor">
        <main class="login-container">
            <form method="POST" class="form-login" id="form-login">
                <div class="form-header">
                    <img src="img/sigdos.ico" alt="LOGO SIGDOS">
                    <h1>SIGDOS</h1>
                </div>
                <div class="form-body">
                    <div class="return-login">
                        <?php
                            if(isset($error)){
                                echo $error;
                            }
                        ?>
                    </div>
                    <div class="cont-input">
                        <input type="text" name="nomUsuario" placeholder=" " required>
                        <label>NOMBRE  DE USUARIO</label>
                    </div>
                    <div class="cont-input">
                        <input type="password" id="password" name="claveUsuario" placeholder=" " required>
                        <label>CONTRASEÑA</label>
                        <i class="bi bi-eye-fill" id="ver"></i>
                        <i class="bi bi-eye-slash-fill" id="noVer"></i>
                    </div>
                    <div class="cont-input captcha">
                        <div class="g-recaptcha" data-sitekey="6LdgkfcpAAAAAKNI9CPwh9khLAS7qZX54xxNB305"></div>
                    </div>
                    <div class="cont-input boton">
                        <button type="submit" name="iniciar"> INICIAR SESION </button>
                        <a href="">¿Olvido su contraseña?</a>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js/password.js" ></script>
</body>
</html>