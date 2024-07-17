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
                    <h2>USUARIOS</h2>
                    <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#modal-add" id="abrir-modal-add">
                        <i class="bi bi-plus-circle"></i>
                        AGREAGAR
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
                                <th>NOMBRE DE USUARIO</th>
                                <th>NOMBRE Y APELLIDO</th>
                                <th>ROL</th>
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
                                <td><?php echo $f['nomUsuario']; ?></td>
                                <td><?php echo $f['nombre']."  ".$f['apellido']; ?></td>
                                <td><?php echo $f['rol']; ?></td>
                                <td class="option">
                                    <button type="button" class="update optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="delete optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-del-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                    <i class="bi bi-trash3-fill"></i>
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
        <section class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="modal">REGISTRAR USUARIO</h2>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">Cédula</label>
                                <input type="text" id="cedula" required onkeyup="llenarCampos(this.value)">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">Empleado</label>
                                <input type="text" name="nombre" id="nombre" required disabled>
                                <input type="hidden" name="idEmpleado" id="idEmpleado">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">Nombre de usuario</label>
                                <input type="text" name="nomUsuario" id="nomUsuario" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CLAVE</label>
                                <input type="text" name="claveUsuario" id="claveUsuario" value="123" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">ROL</label>
                                <select name="idRol" >
                                    <option disabled selected> SELECCIONE... </option>
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
                                <input type="text" name="idStatus" value="1" disabled>
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
            if (isset($m)) {
                foreach ($m as $f) {
        ?>
        <section class="modal fade" id="modal-edit-<?php echo $f['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">ACTUALIZAR USUARIO</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">EMPLEADO</label>
                                <input type="text" name="nombre" value="<?php echo $f['nombre']." ".$f['apellido']; ?>" required  disabled">
                                <input type="hidden" name="idEmpleado" value="<?php echo $f['id']; ?>">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">NOMBRE DE USUARIO</label>
                                <input type="text" name="nomUsuario" value="<?php echo $f['cedula']; ?>" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CLAVE</label>
                                <input type="text" name="claveUsuario" value="<?php echo $f['claveUsuario']; ?>" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">ROL</label>
                                <select name="idRol" required>
                                    <option value="<?php echo $f['idRol']; ?>"  selected disabled><?php echo $f['rol']; ?></option>
                                <?php
                                    if(isset($rol)){
                                        foreach ( $rol as $f) {
                                            if($f['id'] == $f['idRol']){
                                                echo '<option value="'.$f['id'].'" selected>'.$f['rol'].'</option>';
                                            } else {
                                                echo '<option value="'.$f['id'].'">'.$f['rol'].'</option>';
                                            }
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">DEPARTAMENTO</label>
                                <select name="idDepartamento" required>
                                    <option value="<?php echo $f['idDepartamento']; ?>"  selected disabled><?php echo $f['nomDepartamento']; ?></option>
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
                            <h2 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="cont-input cont-delete">
                            <p>Desea eliminar al Usuario</p>
                            <h3><?php echo $f['nombre']."  ".$f['apellido']; ?></h3>
                            <input type="hidden" name="nomUsuario" value="<?php echo $f['nomUsuario']; ?>" disnabled>
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
        ?>
        <footer class="contenedor_footer">
            <h5>2024</h5>
        </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>