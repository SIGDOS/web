<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('comunes/head.php') ?>
</head>
<body>
    <div class="return">
        <?php
            if (isset($error)) {
                ?>
                <script>
                    alert("<?php echo $error; ?>");
                </script>
                <?php
            }
        ?>
    </div>
    <div class="contenedor">
        <?php include_once('comunes/nabar.php') ?>
        <header class="seg_header" class="win-modal">
            <div id="boton_add">
                <div>
                    <h2>EMPLEADOS</h2>
                    <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#modal-add" id="abrir-modal-add">
                        <i class="bi bi-plus-circle"></i>
                        AGREGAR
                    </button>
                </div>
                <div>
                    <input type="search" id="search-input" class="busqueda" name="busqueda" placeholder="Buscar...">
                </div>
            </div>
        </header>
        <main class="contenedor_main"> 
            <div class="contenido">
                <div class="overflow">
                    <table class="container_table" cellspasing id="tabla">
                        <thead class="table_header">
                            <tr>
                                <th>ID</th>
                                <th>CEDULA</th>
                                <th>NOMBRE Y APELLIDO</th>
                                <th>DEPARTAMENTO</th>
                                <th>OPCIONES</th>          
                            </tr>
                        </thead>
                        <tbody class="table_body" id="tabla_body">
                            <?php
                                if (isset($m)) {
                                    foreach ($m as $f) {
                            ?>
                            <tr>
                                <td><?php echo $f['id']; ?></td>
                                <td><?php echo $f['cedula']; ?></td>
                                <td><?php echo $f['nombre']."  ".$f['apellido']; ?></td>
                                <td><?php echo $f['nomDepartamento']; ?></td>
                                <td class="option">
                                    <button type="button" class="update optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="delete optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-del-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                    <i class="bi bi-trash3-fill"></i>
                                    </button>
                                    <button type="button" class="into optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-add-user-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                        <i class="bi bi-person-fill-add"></i>
                                    </button>
                                    <button type="button" class="ver optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-ver-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                    <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td> 
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <section class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">REGISTRAR EMPLEADO</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">CEDULA</label>
                                <input type="text" id="cedula" name="cedula" required  onkeypress="numeros(event);">
                            </div> 
                            <div class="cont-input">
                                <label class="form-label">NOMBRE</label>
                                <input type="text" id="nombre" name="nombre" required  onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">APELLIDO</label>
                                <input type="text" id="apellido" name="apellido" required  onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CORREO</label>
                                <input type="email" id="correo" name="correo" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CARGO</label>
                                <input type="text" name="cargo" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">DEPARTAMENTO</label>
                                <select name="idDepartamento" required>
                                    <option disabled required selected> SELECCIONE... </option>
                                    <?php
                                        if(isset($dpt)){
                                            foreach ( $dpt as $f) {
                                ?>
                                    <option value="<?php echo $f['id'];?>">
                                        <?php echo $f['nomDepartamento'];?>	
                                    </option> 
                                    <?php
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input botones">
                                <button type="submit" class="delete close-modal" data-bs-dismiss="modal" aria-label="Close">
                                    CANCELAR
                                </button>
                                <button type="submit" name="agregar" class="update close-modal">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
            if (isset($m)) {
                foreach ($m as $f) {
        ?>
        <section class="modal fade" id="modal-edit-<?php echo $f['id'];?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">ACTUALIZAR EMPLEADO</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                            <div class="cont-input">
                                <label class="form-label">CEDULA</label>
                                <input type="text"name="cedula" value="<?php echo $f['cedula']; ?>" required  onkeypress="numeros(event);">
                            </div> 
                            <div class="cont-input">
                                <label class="form-label">NOMBRE</label>
                                <input type="text"name="nombre" value="<?php echo $f['nombre']; ?>" required  onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">APELLIDO</label>
                                <input type="text" name="apellido" value="<?php echo $f['apellido']; ?>" required  onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CORREO</label>
                                <input type="email" name="correo" value="<?php echo $f['correo']; ?>" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CARGO</label>
                                <input type="text" name="cargo" value="<?php echo $f['cargo']; ?>" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">DEPARTAMENTO</label>
                                <select name="idDepartamento" required>
                                    <option value="<?php echo $f['idDepartamento']; ?>" selected disabled><?php echo $f['nomDepartamento']; ?></option>
                                <?php
                                    if(isset($dpt)){
                                        foreach ( $dpt as $f) {
                                            if($f['id'] == $f['idDepartamento']){
                                                echo '<option value="'.$f['id'].'" selected>'.$f['nomDepartamento'].'</option>';
                                            } else {
                                                echo '<option value="'.$f['id'].'">'.$f['nomDepartamento'].'</option>';
                                            }
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input botones">
                                <button type="submit" class="delete close-modal" data-bs-dismiss="modal" aria-label="Close">
                                    CANCELAR
                                </button>
                                <button type="submit" name="editar" class="update close-modal">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
                }
            }
            if (isset($m)) {
                foreach ($m as $f) {
        ?>
        <section class="modal fade" id="modal-del-<?php echo $f['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">ELIMINAR EMPLEADO</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="cont-input cont-delete">
                            <p>Desea eliminar al Usuario</p>
                            <h3><?php echo $f['nombre']."  ".$f['apellido']; ?></h3>
                            <input type="hidden" name="cedula" value="<?php echo $f['cedula']; ?>" disnabled>
                        </div>
                        <div class="cont-input botones">
                            <button type="submit" class="delete close-modal">
                                NO
                            </button>
                            <button type="submit" name="eliminar" class="update close-modal">
                                SI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
                }
            }
            if (isset($m)) {
                foreach ($m as $f) {
        ?>
        <section class="modal fade" id="modal-add-user-<?php echo $f['id'];?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="modal">REGISTRAR USUARIO</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">NOMBRE DE USUARIO</label>
                                <input type="text" name="nomUsuario" value="<?php echo $f['cedula']; ?>">
                                <input type="hidden" name="idEmpleado" value="<?php echo $f['id']; ?>">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CONTRASEÑA</label>
                                <input type="password" name="claveUsuario" value="IVSS.2024" disabled>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">ROL</label>
                                <select name="idRol" required>
                                    <?php
                                        if(isset($rol)){
                                            foreach ( $rol as $f) {
                                ?>
                                    <option value="<?php echo $f['id'];?>">
                                        <?php echo $f['rol'];?>	
                                    </option> 
                                    <?php
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input botones">
                                <button type="submit" class="delete close-modal" data-bs-dismiss="modal" aria-label="Close">
                                    CANCELAR
                                </button>
                                <button type="submit" name="agregar_user" class="update close-modal">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
                }
            }
            if (isset($m)) {
                foreach ($m as $f) {
        ?>
        <section class="modal fade" id="modal-ver-<?php echo $f['id'];?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="modal"><?php echo $f['nombre']." ".$f['apellido']; ?></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">NOMBRE DE USUARIO</label>
                                <input type="text" name="nomUsuario" value="<?php echo $f['cedula']; ?>">
                                <input type="text" name="idEmpleado" value="<?php echo $f['id']; ?>">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CONTRASEÑA</label>
                                <input type="password" name="claveUsuario" value="123" disabled>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">ROL</label>
                                <select name="idRol" required>
                                    <?php
                                        if(isset($rol)){
                                            foreach ( $rol as $f) {
                                ?>
                                    <option value="<?php echo $f['id'];?>">
                                        <?php echo $f['rol'];?>	
                                    </option> 
                                    <?php
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">STATUS</label>
                                <input type="text" name="status" value="true" disabled>
                            </div>
                            <div class="cont-input botones">
                                <button type="submit" class="delete close-modal" data-bs-dismiss="modal" aria-label="Close">
                                    CANCELAR
                                </button>
                                <button type="submit" name="agregar_user" class="update close-modal">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
                }
            }
        ?>
        <footer class="contenedor_footer">
            <h5>2024</h5>
        </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>