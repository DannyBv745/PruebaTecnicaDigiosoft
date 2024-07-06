<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar editorial</title>
        <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
<body>

<?php if(session() -> getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session() -> getFlashdata('error'); ?>
        </div>
    <?php }; ?>
        
    <form action="<?= base_url('editorial/'.$editorial['ed_id']); ?>" class="row g-3" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="editorial_id" value="<?= $editorial['ed_id']; ?>">
        
        <div class="container-fluid" style="margin-bottom: 10%;">
            <div class="card mb-3" style="max-width: 50rem; margin:auto; margin-top:30px; ">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-white">Editar editorial</h4>
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="ed_nombre" placeholder="Nombre" value="<?= $editorial['ed_nombre']; ?>">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input class="form-control" type="text" name="ed_ubicacion" placeholder="Ubicacion" value="<?= $editorial['ed_ubicacion']; ?>">
                        <label for="floatingInput">Ubicacion</label>
                    </div>
                    <!-- Botones -->
                    <a href="<?= base_url('editorial') ?>" class="btn btn-danger" style="width: 6rem;">Regresar</a>
                    <button type="submit" class="btn btn-primary" style="width: 6rem;">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Scripts necesarios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>