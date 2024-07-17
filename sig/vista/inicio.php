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
            <div>
                <div>
                    <h2>INICIO</h2>
                </div>
            </div>
        </header>
        <main class="contenedor_main"> 
            <div class="contenido">
                <div class="overflow">
                    
                </div>
            </div>
        </main>
        <footer class="contenedor_footer">
            <h5>2024</h5>
        </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>