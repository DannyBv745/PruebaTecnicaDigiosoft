<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo usuario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
<body>

<?php if(session() -> getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session() -> getFlashdata('error'); ?>
        </div>
    <?php }; ?>
        
    <form action="<?= base_url('usuarios') ?>" class="row g-3" method="post" autocomplete="off">
        
    <div class="container-fluid" style="margin-bottom: 10%;">
            <div class="card mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; ">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">Agregar nuevo usuario</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <input class="form-control" type="text" name="us_nombre" placeholder="Nombre">
                            <label for="floatingInput" style="margin-left: 1rem;">Nombre</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col" style="height: 4rem;">
                            <input class="form-control" type="text" name="us_user" placeholder="Usuario">
                            <label class="form_label" style="margin-left: 1rem;">Usuario</label>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <input class="form-control" type="text" name="us_apaterno" placeholder="Apellido paterno">
                            <label for="floatingInput" style="margin-left: 1rem;">Apellido paterno</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col">
                            <input class="form-control" type="text" name="us_password" placeholder="Contraseña">
                            <label for="floatingInput" style="margin-left: 1rem;">Contraseña</label>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-floating mb-3 mt-4 col">
                            <input class="form-control" type="text" name="us_amaterno" placeholder="Apellido materno">
                            <label for="floatingInput" style="margin-left: 1rem;">Apellido materno</label>
                        </div>
                        <div class="form-floating mb-3 mt-4 col">
                        <input class="form-control" type="text" name="us_telefono" placeholder="telefono">
                            <label for="floatingInput" style="margin-left: 1rem;">Telefono</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="email" name="us_email" placeholder="Email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="us_direccion" placeholder="Direccion">
                        <label for="floatingInput">Dirección</label>
                    </div>
                    
                    <!-- Botones -->
                    <a href="<?= base_url('idiomas') ?>" class="btn btn-danger" style="width: 6rem;">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="width: 6rem;">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>