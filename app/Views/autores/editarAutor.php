<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nueva categoria</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
<body>

<?php if(session() -> getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session() -> getFlashdata('error'); ?>
        </div>
    <?php }; ?>
        
    <form action="<?= base_url('autores/'.$autores['au_id']); ?>" class="row g-3" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="categoria_id" value="<?= $autores['au_id']; ?>">
        
        <div class="container-fluid" style="margin-bottom: 10%;">
            <div class="card mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; ">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">Agregar nueva categoria</h4>
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="au_nombre" placeholder="Nombre" value="<?= $autores['au_nombre']; ?>">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="au_apaterno" placeholder="apaterno" value="<?= $autores['au_apaterno']; ?>">
                        <label for="floatingInput">Apellido paterno</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="au_amaterno" placeholder="amaterno" value="<?= $autores['au_amaterno']; ?>">
                        <label for="floatingInput">Apellido materno</label>
                    </div>
                    <!-- Botones -->
                    <a href="<?= base_url('autores') ?>" class="btn btn-danger" style="width: 6rem;">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="width: 6rem;">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>