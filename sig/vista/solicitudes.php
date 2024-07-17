<?php
session_start();

if (isset($_SESSION['nomUsuario'])) {
  $nombreUsuario = $_SESSION['nomUsuario'];
} else {
  // Manejar el caso en el que la sesión no esté iniciada
  echo "No existe este usuario";
}
?>



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
                    <h2>SOLICITUDES</h2>
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
                                <!--<th>ID</th>-->
                                <th>EMPLEADO</th>
                                <th>EQUIPO</th>
                                <th>SERVICIO</th>
                                <th>FECHA</th>
                                <th>ESTADO</th>          
                            </tr>
                        </thead>
                        <tbody class="table_body" id="tabla_body">
                            <?php
                                if (isset($m)) {
                                    foreach ($m as $f) {
                            ?>
                            <tr>
                                <!--<td><?php echo $f['id']; ?></td>-->
                                <td><?php echo 'V-'."".$f['cedEmpleado']."  ".$f['nombre']."  ".$f['apellido']; ?></td>
                                <td><?php echo $f['idEquipo']; ?></td>
                                <td><?php echo $f['idServicio']; ?></td>
                                <td><?php echo $f['fechaSolicitud']; ?></td>
                                <td><?php echo $f['statusSolicitud']; ?></td>
                                <!--<td class="option">
                                    <button type="button" class="update optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="delete optiones btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#modal-del-<?php echo $f['id'];?>" data-username="<?php echo $f['id'];?>">
                                    <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </td>--> 
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
                            <h2 class="modal-title" id="exampleModalLabel">REGISTRAR SOLICITUD</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">CEDULA</label>
                                <input type="text" id="cedEmpleado" name="cedEmpleado" required  onkeypress="numeros(event);">
                            </div> 
                            <div class="cont-input">
                                <label class="form-label">EQUIPO</label>
                                <!--<input type="text" id="idEquipo" name="idEquipo" required  onkeypress="letras(event);">-->
                                <select name="idEquipo" required>
                                    <option selected> SELECCIONE UN EQUIPO... </option>
                                    <?php
                                        if(isset($equipo)){
                                            foreach ( $equipo as $f) {
                                ?>
                                    <option value="<?php echo $f['id'];?>">
                                        <?php echo $f['id']." ".$f['nomEquipo'];?> 
                                    </option> 
                                    <?php
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">SERVICIO</label>
                                <select name="idServicio" required>
                                    <option required selected> SELECCIONE UN SERVICIO... </option>
                                    <?php
                                        if(isset($servicio)){
                                            foreach ( $servicio as $f) {
                                ?>
                                    <option value="<?php echo $f['id'];?>">
                                        <?php echo $f['id']." ".$f['nomServicio'];?> 
                                    </option> 
                                    <?php
                                            }
                                        }
                                ?>
                                </select>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">FECHA</label>
                                <input type="date" id="fechaSolicitud" name="fechaSolicitud">
                            </div>
                            <!--<div class="cont-input">
                                <label class="form-label">FECHA</label>
                                <input type="email" id="correo" name="correo" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">CARGO</label>
                                <input type="text" name="cargo" required onkeypress="letras(event);">
                            </div>-->
                            <!--<div class="cont-input">
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
                            </div>-->
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
        <!--<?php
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
        ?>-->
        <footer class="contenedor_footer">
            <h5>2024</h5>
        </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>