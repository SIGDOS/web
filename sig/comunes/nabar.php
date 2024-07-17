        <header class="contenedor-header">
            <div class="header-tittle">
                <h1>SIGDOS</h1>
            </div>
            <div class="header-opcion">
                <button type="button" class="list" data-bs-toggle="modal" data-bs-target="#modal-menu">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <div class="btn-group">
                        <button class="list opcion btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu perfil-menu">
                            <li><h3><?php echo $_SESSION['nomUsuario']; ?></h3></li>

                            <li>
                                <button type="button" class="option-pass" data-bs-toggle="modal" data-bs-target="#modal-pass">
                                    CAMBIAR CONTRASEÑA
                                </button>
                            </li>
                            <li>
                                <button type="button" class="option-pass" data-bs-toggle="modal" data-bs-target="#modal-out">
                                    SALIR
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header> 
        <nav class="modal fade" id="modal-menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog menu-cont">
                <div class="modal-content cont-menu">
                    <ul class="nav_menu-content">
                        <li class="nav_menu-item"><a href="?p=inicio">INICIO</a></li>
                        <li class="nav_menu-item"><a href="?p=empleados">EMPLEADOS</a></li>
                        <li class="nav_menu-item"><a href="?p=usuarios">USUARIOS</a></li>
                        <li class="nav_menu-item"><a href="?p=localidades">LOCALIDADES</a></li>
                        <li class="nav_menu-item"><a href="?p=solicitudes">SOLICITUDES</a></li>
                        <li class="nav_menu-item"><a href="">ORDENES</a></li>
                        <li class="nav_menu-item"><a href="">INVENTARIO</a></li>
                        <li class="nav_menu-item"><a href="">EQUIPOS</a></li>
                        <li class="nav_menu-item"><a href="">REPORTES</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="modal fade" id="modal-pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form" id="form_pass">
                        <div class="modal-header">
                            <h2>CAMBIAR CONTRASEÑA</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <h3><input type="hidden" value="<?php echo $_SESSION['nombreUsuario']; ?>" name="username"></h3>
                            </div>
                            <div class="cont-input">
                                <input type="password" name="claveUsuario" class="pass2" id="pass2" placeholder="">
                                <label>DIGITE LA NUEVA CONTRASEÑA</label>
                                    <i class="bi bi-eye-fill" id="ver_pass"></i>
                                    <i class="bi bi-eye-slash-fill" id="noVer_pass"></i>
                            </div>
                            <div class="cont-input">
                                <input type="password" name="claveUsuario2" class="pass" id="pass" placeholder="">
                                <label>REPITA LA CONTRASEÑA</label>
                                    <i class="bi bi-eye-fill" id="ver_pass2"></i>
                                    <i class="bi bi-eye-slash-fill" id="noVer_pass2"></i>
                                <span id="error"></span>
                            </div>
                            <div class="cont-input botones">
                                <button type="submit" name="editar_pass" class="update">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="modal fade" id="modal-out" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <div class="cont-input cont-delete">
                        <h2>DESEA SALIR</h2>
                    </div>
                    <div class="cont-input botones">
                        <a class="cerrar" href="logout.php">
                            <button type="submit" name="cerrar" class="delete">
                                SI
                            </button>
                        </a>
                        <button type="submit" name="cerrar" class="update" id="alert_no_salir">
                            NO
                        </button>
                    </div>
                </div>
            </div>
        </section>