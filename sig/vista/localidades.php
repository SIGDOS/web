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
                    <h2>LOCALIDADES</h2>
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
                                <th>NOMBRE</th>
                                <th>TIPO</th>
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
                                <td><?php echo $f['nomLocalidad']; ?></td>
                                <td><?php echo $f['nomTipoLocalidad']; ?></td>
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
        <section class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">REGISTRAR LOCALIDAD</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="cont-input">
                                <label class="form-label">NOMBRE</label>
                                <input type="text" id="nomLocalidad" name="nomLocalidad" required  onkeypress="letras(event);">
                            </div> 
                            <div class="cont-input">
                                <label class="form-label">DIRECCION</label>
                                <input type="text" id="dirLocalidad" name="dirLocalidad" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">TELEFONO</label>
                                <input type="text" id="telefLocalidad" name="telefLocalidad" required  onkeypress="numeros(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">PARROQUIA</label>
                                <input type="text" id="parroquia" name="parroquia" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">MUNICIPIO</label>
                                <input type="text" name="municipio" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">ESTADO</label>
                                <input type="text" name="estado" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">TIPO</label>
                                <select name="idTipoLocalidad" required>
                                    <option disabled required selected> SELECCIONE... </option>
                                    <?php
                                        if(isset($tpL)){
                                            foreach ( $tpL as $f) {
                                ?>
                                    <option value="<?php echo $f['id'];?>">
                                        <?php echo $f['nomTipoLocalidad'];?>	
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
        <section class="modal fade" id="modal-edit-<?php echo $f['id'];?>" tabindex="-1" >
            <div class="modal-dialog modal-regit">
                <div class="modal-content">
                    <form method="post" class="form">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">ACTUALIZAR LOCALIDAD</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                            <div class="cont-input">
                                <label class="form-label">NOMBRE</label>
                                <input type="text"name="nomLocalidad" value="<?php echo $f['nomLocalidad']; ?>" required  onkeypress="letras(event);">
                            </div> 
                            <div class="cont-input">
                                <label class="form-label">DIRECCION</label>
                                <input type="text" name="dirLocalidad" value="<?php echo $f['dirLocalidad']; ?>" required>
                            </div>
                            <div class="cont-input">
                                <label class="form-label">TELEFONO</label>
                                <input type="text" name="telefLocalidad" value="<?php echo $f['telefLocalidad']; ?>" required  onkeypress="numeros(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">PARROQUIA</label>
                                <input type="text" name="parroquia" value="<?php echo $f['parroquia']; ?>" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">MUNICIPIO</label>
                                <input type="text" name="municipio" value="<?php echo $f['municipio']; ?>" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label class="form-label">ESTADO</label>
                                <input type="text" name="estado" value="<?php echo $f['estado']; ?>" required onkeypress="letras(event);">
                            </div>
                            <div class="cont-input">
                                <label for="idTipoLocalidad" class="form-label">TIPO</label>
                                <select id="idTipoLocalidad" name="idTipoLocalidad" required>
                                <option value="<?php echo $f['idTipoLocalidad']; ?>"  selected disabled><?php echo $f['nomTipoLocalidad']; ?></option>
                                <?php
                                    if(isset($tpL)){
                                        foreach ( $tpL as $f) {
                                            if($f['id'] == $f['idTipoLocalidad']){
                                                echo '<option value="'.$f['id'].'" selected>'.$f['nomTipoLocalidad'].'</option>';
                                            } else {
                                                echo '<option value="'.$f['id'].'">'.$f['nomTipoLocalidad'].'</option>';
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
                            <h2 class="modal-title" id="exampleModalLabel">ELIMINAR LOCALIDAD</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="cont-input cont-delete">
                            <p>Desea eliminar</p>
                            <h3><?php echo $f['nomLocalidad']; ?></h3>
                            <input type="hidden" name="nomLocalidad" value="<?php echo $f['nomLocalidad']; ?>" disnabled>
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